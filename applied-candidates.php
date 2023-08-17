<?php
include './header.php';
require "./check-session.php";
require './src/Database.php';
$db = database::getinstance();
$user = $_SESSION['user'];
$jobId = $_GET['jobId'];
$candidates = [];

$sql = "select * from applied_jobs where job_id = '$jobId'";
$res = $db->query($sql);
while ($row = $res->fetch_object()) {
	$sql = "SELECT * FROM users WHERE id = '$row->candidate_id'";
	$resUser = $db->query($sql);
	while($rowUser = $resUser->fetch_object()){
		$candidates[] = $rowUser;
	}
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
							<?php foreach ($candidates as $c) : ?>
								<tr>
									<td width="80%"><strong><?php echo $c->name ?></strong></td>
									<td>
										<a class="btn btn-primary" href="./resume/<?php echo $c->resume?>">View Resume</a>
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
