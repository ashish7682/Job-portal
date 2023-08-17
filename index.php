<?php
ini_set('display_errors', '1');
include './header.php';
require './src/Database.php';

$db = Database::getInstance();


if (isset($_POST['search'])) {
	$keywords = $db->real_escape_string($_POST['keyword']);
	$city = $db->real_escape_string($_POST['city']);
	$sector = $db->real_escape_string($_POST['sector']);

	$sql = "SELECT * FROM jobs WHERE title LIKE '%$keywords%' || sector = '$sector' || city = '$city'";
	$res = $db->query($sql);

	$jobs = [];

	while ($row = $res->fetch_object()) {
		$jobs[] = $row;
	}


	foreach ($jobs as $key => $job) {
		$sql = "SELECT name from city WHERE id = '$job->city'";
		$res = $db->query($sql);
		$city = $res->fetch_object()->name;

		$sql = "SELECT name FROM sector WHERE id = '$job->sector'";
		$res = $db->query($sql);
		$sector = $res->fetch_object()->name;

		$sql = "SELECT * from recruiter WHERE id = '$job->recruiter'";
		$res = $db->query($sql);
		$recruiter = $res->fetch_object();

		$jobs[$key]->city = $city;
		$jobs[$key]->sector = $sector;
		$jobs[$key]->recruiter = $recruiter;
	}
} else {
	$sql = "SELECT * FROM jobs ORDER BY id DESC LIMIT 0,10";
	$res = $db->query($sql);

	$jobs = [];

	while ($row = $res->fetch_object()) {
		$jobs[] = $row;
	}


	foreach ($jobs as $key => $job) {
		$sql = "SELECT name from city WHERE id = '$job->city'";
		$res = $db->query($sql);
		$city = $res->fetch_object()->name;

		$sql = "SELECT name FROM sector WHERE id = '$job->sector'";
		$res = $db->query($sql);
		$sector = $res->fetch_object()->name;
		
		$sql = "SELECT * from recruiter WHERE id = '$job->recruiter'";
		$res = $db->query($sql);
		$recruiter = $res->fetch_object();

		$jobs[$key]->city = $city;
		$jobs[$key]->sector = $sector;
		$jobs[$key]->recruiter = $recruiter;
	}
}


# Get all sectors
$sql = "SELECT id, name FROM sector";
$res = $db->query($sql);
$sectors = [];

while ($row = $res->fetch_object()) {
	$sectors[] = $row;
}

# Get all cities
$sql = "SELECT id, name FROM city";
$res = $db->query($sql);
$cities = [];

while ($row = $res->fetch_object()) {
	$cities[] = $row;
}



?>
<!-- Content -->
<div class="page-content">
	<!-- Section Banner -->
	<div class="dez-bnr-inr dez-bnr-inr-md" style="background-image:url(images/main-slider/slide2.jpg);">
		<div class="container">
			<div class="dez-bnr-inr-entry align-m ">
				<div class="find-job-bx">
					<p class="site-button button-sm">Find Jobs, Employment & Career Opportunities</p>
					<h2>Search Between More Them <br /> <span class="text-primary">50,000</span> Open Jobs.</h2>
					<form class="dezPlaceAni" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
						<div class="row">

							<div class="col-lg-4 col-md-6">
								<div class="form-group">
									<label>Job Title, Keywords, or Phrase</label>
									<div class="input-group">
										<input type="text" name="keyword" class="form-control" placeholder="">
										<div class="input-group-append">
											<span class="input-group-text"><i class="fa fa-search"></i></span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-6">
								<div class="form-group">
									<select name="city">
										<option>Select City</option>
										<?php foreach ($cities as $city) : ?>
											<option value="<?php echo $city->id ?>"> <?php echo $city->name ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="col-lg-3 col-md-6">
								<div class="form-group">
									<select name="sector">
										<option>Select Sector</option>
										<?php foreach ($sectors as $sector) : ?>
											<option value="<?php echo $sector->id ?>"> <?php echo $sector->name ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="col-lg-2 col-md-6">
								<button type="submit" name="search" class="site-button btn-block">Find Job</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Section Banner END -->
	<!-- Our Job -->
	<div class="section-full bg-white content-inner-2">
		<div class="container">
			<div class="d-flex job-title-bx section-head">
				<div class="mr-auto">
					<h2 class="m-b5">Recent Jobs</h2>
					<h6 class="fw4 m-b0">20+ Recently Added Jobs</h5>
				</div>
				<div class="align-self-end">
					<a href="./browse-job.php" class="site-button button-sm">Browse All Jobs <i class="fa fa-long-arrow-right"></i></a>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-9">
					<ul class="post-job-bx">
						<?php foreach ($jobs as $job) : ?>
							<li>
								<a href="./job-detail.php?id=<?php echo $job->id ?>">
									<div class="d-flex m-b30">
										<div class="job-post-company">
											<span><img src="images/logo/icon1.png" /></span>
										</div>
										<div class="job-post-info">
											<h4><?php echo $job->title ?></h4>
											<ul>
												<li><i class="fa fa-map-marker"></i> <?php echo $job->city ?></li>
												<li><i class="fa fa-bookmark-o"></i> <?php echo $job->type ?></li>
												<li><i class="fa fa-clock-o"></i> <?php $d = new DateTime($job->created_at);
																					echo $d->format('d-m-Y') ?></li>
											</ul>
										</div>
									</div>
									<div class="d-flex">
										<div class="job-time mr-auto">
											<span><?php echo $job->type ?></span>
										</div>
										<div class="salary-bx">
											<span>Rs-<?php echo number_format($job->ctc, 2, '.', ',') ?>/-</span>
										</div>
									</div>
								</a>
							</li>
						<?php endforeach ?>
					</ul>
				</div>
				<div class="col-lg-3">
					<div class="sticky-top">
						
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Our Job END -->

	<?php include './footer.php' ?>
