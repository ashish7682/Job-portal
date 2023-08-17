<?php
include './header.php';
require "./check-session.php";
require './src/Database.php';
$db = database::getinstance();
$user = $_SESSION['user'];

$jobs = [];
$usertype =  $_SESSION['type'];
if ($usertype == 'recruiter') {
	$sql = "select * from jobs where recruiter = '$user->id'";
	$res = $db->query($sql);
	while ($row = $res->fetch_object()) {
		$jobs[] = $row;
	}
} else {
	$sql = "select * from applied_jobs where candidate_id = '$user->id'";
	$res = $db->query($sql);
	while ($row = $res->fetch_object()) {
		$query = "select * from jobs where id = '$row->job_id'";
		$resjob = $db->query($query);
		while ($rowjob = $resjob->fetch_object()) {
			$jobs[] = $rowjob;
		}
	}
}
if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$sql = "delete from jobs where id = '$id'";
	$db->query($sql);
}

?>
<!-- content -->
<div class="page-content bg-white">
	<!-- contact area -->
	<div class="section-full content-inner shop-account">
		<!-- product -->
		<div class="container">
			<div class="row">
				<div class="col-md-12 m-b30">
					<h3>my jobs</h3>
					<div class="tab-content border">
						<table class="table">
							<?php foreach ($jobs as $job) : ?>
								<tr>
									<td width="75%"><strong><?php echo $job->title ?></strong></td>
									<td>
										<?php if ($usertype == 'recruiter') : ?>
											<a class="btn btn-primary" href="./applied-candidates.php?jobId=<?php echo $job->id ?>">view candidates</a>
											<a class="btn btn-danger" href="<?php echo $_server['php_self'] ?>?delete=<?php echo $job->id ?>" onclick="return confirm('are you sure?')">delete</a>
										<?php else : ?>
											<a class="btn btn-primary" href="./job-detail.php?id=<?php echo $job->id ?>">view job details</a>
										<?php endif ?>
									</td>
								</tr>
							<?php endforeach ?>
						</table>
					</div>
				</div>
				<!-- product end -->
			</div>
			<!-- contact area  end -->
		</div>
		<!-- content end-->
		<?php include './footer.php' ?>
