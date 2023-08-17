<?php
include './header.php';
require './src/Database.php';

$db = Database::getInstance();

$jobs = [];


if (isset($_POST['search'])) {
	$keywords = $db->real_escape_string($_POST['keyword']);
	$city = $db->real_escape_string($_POST['location']);
	$type = $db->real_escape_string($_POST['example1']);

	$sql = "SELECT * FROM jobs WHERE title LIKE '%$keywords%' || type = '$type' || city = '$city'";
	//echo $sql;die;
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


	$sql = "SELECT * FROM jobs ORDER BY id DESC";
	$res = $db->query($sql);


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
# Get all cities
$sql = "SELECT id, name FROM city";
$res = $db->query($sql);
$cities = [];

while ($row = $res->fetch_object()) {
	$cities[] = $row;
}


?>
<!-- header END -->
<!-- Content -->
<div class="page-content bg-white">
	<!-- contact area -->
	<div class="content-block">
		<!-- Browse Jobs -->
		<div class="section-full bg-white browse-job content-inner-2">
			<div class="container">
				<div class="row">
					<div class="col-xl-9 col-lg-8">
						<h5 class="widget-title font-weight-700 text-uppercase">
							Recent Jobs
						</h5>
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
					<div class="col-xl-3 col-lg-4">
						<div class="sticky-top">
							<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

								<div class="clearfix m-b30">
									<h5 class="widget-title font-weight-700 text-uppercase">
										Keywords
									</h5>
									<div class="">
										<input type="text" name="keyword" class="form-control" placeholder="Search" />
									</div>
								</div>
								<div class="clearfix m-b10">
									<h5 class="widget-title font-weight-700 m-t0 text-uppercase">
										Location
									</h5>
									<select name="location">
										<?php foreach ($cities as $city) : ?>
											<option value="<?php echo $city->id ?>"> <?php echo $city->name ?></option>
										<?php endforeach ?>
									</select>

								</div>
								<div class="clearfix m-b30">
									<h5 class="widget-title font-weight-700 text-uppercase">
										Job type
									</h5>
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-12">
											<div class="product-brand">
												<div class="custom-control custom-radio">
													<input type="radio" value="Internship" class="custom-control-input" id="check8" name="example1" />
													<label class="custom-control-label" for="check8">Internship</label>
												</div>
												<div class="custom-control custom-radio">
													<input type="radio" value="Part Time" class="custom-control-input" id="check9" name="example1" />
													<label class="custom-control-label" for="check9">Part Time</label>
												</div>
												<div class="custom-control custom-radio">
													<input type="radio" value=Temporary"" class="custom-control-input" id="check10" name="example1" />
													<label class="custom-control-label" for="check10">Temporary</label>
												</div>
												<div class="custom-control custom-radio">
													<input type="radio" value="Freelance" class="custom-control-input" id="check6" name="example1" />
													<label class="custom-control-label" for="check6">Freelance</label>
												</div>
												<div class="custom-control custom-radio">
													<input type="radio" value="Full Time" class="custom-control-input" id="check7" name="example1" />
													<label class="custom-control-label" for="check7">Full Time</label>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="clearfix">
									<button type="submit" name="search" class="site-button btn-block">Search</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Browse Jobs END -->
	</div>
</div>
<!-- Content END-->
<?php include './footer.php' ?>