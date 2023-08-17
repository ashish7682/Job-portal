<?php
include './header.php';
require './src/Database.php';

$db = Database::getInstance();
$id = $_GET['id'];
$sql = "SELECT * FROM jobs WHERE id = '$id'";
$res = $db->query($sql);

$jobs = [];

$job = $res->fetch_object();
$sql = "SELECT name from city WHERE id = '$job->city'";
$res = $db->query($sql);
$city = $res->fetch_object()->name;

$sql = "SELECT name FROM sector WHERE id = '$job->sector'";
$res = $db->query($sql);
$sector = $res->fetch_object()->name;

$sql = "SELECT * from recruiter WHERE id = '$job->recruiter'";
$res = $db->query($sql);
$recruiter = $res->fetch_object();

$job->city = $city;
$job->sector = $sector;
$job->recruiter = $recruiter;
?>
<!-- Content -->
<div class="page-content bg-white">
	<!-- contact area -->
	<div class="content-block">
		<!-- Job Detail -->
		<div class="section-full content-inner-1">
			<div class="container">
				<div class="row">
					<?php if (isset($_SESSION['msg'])) : ?>
						<div class="col-lg-12">
							<div class="alert alert-success"><?php echo $_SESSION['msg'];
																unset($_SESSION['msg']) ?></div>
						</div>
					<?php endif ?>
					<div class="col-lg-4">
						<div class="sticky-top">
							<div class="row">
								<div class="col-lg-12 col-md-6">
									<div class="m-b30">
										<img src="images/blog/grid/pic1.jpg" alt="">
									</div>
								</div>
								<div class="col-lg-12 col-md-6">
									<div class="widget bg-white p-lr20 p-t20  widget_getintuch radius-sm">
										<h4 class="text-black font-weight-700 p-t10 m-b15">Job Details</h4>
										<ul>
											<li><i class="ti-location-pin"></i><strong class="font-weight-700 text-black">Address</strong><span class="text-black-light"><?php echo $job->recruiter->address ?></span></li>
											<li><i class="ti-money"></i><strong class="font-weight-700 text-black">Salary</strong> <?php echo number_format($job->ctc, 2, '.', ',') ?></li>
											<li><i class="ti-shield"></i><strong class="font-weight-700 text-black">Experience</strong><?php echo $job->exp ?> Year Experience</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="job-info-box">
							<h3 class="m-t0 m-b10 font-weight-700 title-head">
								<a href="#" class="text-secondry m-r30"><?php echo $job->title ?></a>
							</h3>
							<ul class="job-info">
								<li><strong>Education</strong> <?php echo $job->qualification ?></li>
								<li><strong>Deadline:</strong> <?php $d = new DateTime($job->deadline);
																echo $d->format('d-M-Y') ?></li>
								<li><i class="ti-location-pin text-black m-r5"></i> <?php echo $job->city ?> </li>
							</ul>
							<h5 class="font-weight-600">Job Description</h5>
							<div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div>
							<p><?php echo $job->description ?></p>
							<h5 class="font-weight-600">How to Apply</h5>
							<div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div>
							<p><?php echo $job->how_to_apply ?></p>
							<h5 class="font-weight-600">Job Requirements</h5>
							<div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div>
							<div><?php echo $job->requirement ?></div>
	                   <?php if (isset($_SESSION['type']) && $_SESSION['type']  == 'user') : ?>

							<a href="./apply.php?apply=<?php echo $job->id ?>" class="site-button mb-5 mt-3">Apply This Job</a>
						<?php else: ?>
							<small></small>
					   <?php endif ?>	

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Job Detail -->
	</div>
</div>
<!-- Content END-->

<?php include './footer.php' ?>
