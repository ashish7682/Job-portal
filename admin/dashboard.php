<?php
include './header.php';
require_once '../src/Database.php';
$db = Database::getInstance();

$sql = "SELECT count(id) as total_jobs FROM jobs";
$res = $db->query($sql);
$total_jobs = $res->fetch_object()->total_jobs;

$sql = "SELECT count(id) as total_recruiter FROM recruiter";
$res = $db->query($sql);
$total_recruiter = $res->fetch_object()->total_recruiter;

$sql = "SELECT count(id) as applied_jobs FROM applied_jobs";
$res = $db->query($sql);
$total_applied = $res->fetch_object()->applied_jobs;



?>
<!-- Breadcrumbs-->

<div class="container-fluid">
	<ol class="breadcrumb mb-4">
		<li class="breadcrumb-item active"><a href="">Dashboard</a> / overview</li>
	</ol>
	<div class="row">
		<div class="col-xl-3 col-md-6">
			<div class="card bg-primary text-white mb-4">
				<div class="card-body">Total Post Jobs</div>
				<span style="margin-left:40px"><?php echo $total_jobs ?></span><br>
				<div class="card-footer d-flex align-items-center justify-content-between">
					<a class="small text-white stretched-link" href="">View Details</a>
					<div class="small text-white"><i class="fas fa-angle-right"></i></div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6">
			<div class="card bg-warning text-white mb-4">
				<div class="card-body">Total Recruiters</div>
				<span style="margin-left:40px"><?php echo $total_recruiter ?></span><br>
				<div class="card-footer d-flex align-items-center justify-content-between">
					<a class="small text-white stretched-link" href="">View Details</a>
					<div class="small text-white"><i class="fas fa-angle-right"></i></div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6">
			<div class="card bg-success text-white mb-4">
				<div class="card-body">Total Applied Jobs</div>
				<span style="margin-left:40px"><?php echo $total_applied ?></span><br>
				<div class="card-footer d-flex align-items-center justify-content-between">
					<a class="small text-white stretched-link" href="">View Details</a>
					<div class="small text-white"><i class="fas fa-angle-right"></i></div>
				</div>
			</div>
		</div>


	</div>
</div>
<!-- /.container-fluid -->

<?php
include './footer.php';
?>