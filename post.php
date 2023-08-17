<?php
include './header.php';
require './src/Database.php';

$db = Database::getInstance();

if (isset($_POST['post'])) {
	$title = $db->real_escape_string($_POST['title']);
	$city = $db->real_escape_string($_POST['city']);

	$sector = $db->real_escape_string($_POST['sector']);
	$desc = $db->real_escape_string($_POST['desc']);
	$type = $db->real_escape_string($_POST['type']);
	$salary = $db->real_escape_string($_POST['salary']);
	$how_to_apply = $db->real_escape_string($_POST['how_to_apply']);
	$requirements = $db->real_escape_string($_POST['requirements']);
	$deadline = $db->real_escape_string($_POST['deadline']);
	$qualification = $db->real_escape_string($_POST['qualification']);
	$experinece = $db->real_escape_string($_POST['experinece']);

	# TODO: validation

	$image = $_FILES['image']['name'];

	try {
		if($_FILES['image']['error'] != 4)
			move_uploaded_file($_FILES['image']['tmp_name'], './images/uploaded/' . $image);

		$sql = "INSERT INTO jobs (title, sector, city, description, type, ctc, how_to_apply, requirement, deadline, qualification, exp, image, recruiter)
	VALUES ('$title', '$sector', '$city', '$desc', '$type', '$salary', '$how_to_apply', '$requirements', '$deadline', '$qualification', '$exp','$image', $userId)";

	

		if ($db->query($sql) === true) {
			$msg = "Job posted successfully";
		}
	} catch (Exception $e) {
		$error = "Failed to post your job, Please try again later";
	}
}
?>
<!-- Content -->
<div class="page-content bg-white">
	<!-- contact area -->
	<div class="section-full content-inner shop-account">
		<!-- Product -->
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h3 class="font-weight-700 m-t0 m-b20">Post A Job</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 m-b30">
					<div class="p-a30 border-1  max-w700 m-auto">
						<div class="tab-content">
							<form id="login" class="tab-pane active" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
								<h4 class="font-weight-700">JOB INFORMATION</h4>
								<div class="form-group">
									<label class="font-weight-700">Title *</label>
									<input name="title" class="form-control" placeholder="Job Title" type="text">
								</div>
								<div class="form-group">
									<label class="font-weight-700">City *</label>
									<select id="" name="city">
										<option value=""></option>
									</select>
								</div>
								<div class="form-group">
									<label class="font-weight-700">Sector *</label>
									<select id="" name="sector">
										<option value=""></option>
									</select>
								</div>
								<div class="form-group">
									<label class="font-weight-700">Description *</label>
									<input name="desc" class="form-control " placeholder="Description" type="password">
								</div>
								<div class="form-group">
									<label class="font-weight-700">Type *</label>
									<select id="" name="type">
										<option value="Full Time"></option>
										<option value="Part Time"></option>
									</select>
								</div>
								<div class="form-group">
									<label class="font-weight-700">Salary *</label>
									<input name="salary" class="form-control " placeholder="Salary" type="text">
								</div>
								<div class="form-group">
									<label class="font-weight-700">How to apply *</label>
									<input name="how_to_apply" class="form-control " placeholder="How to apply" type="text">
								</div>
								<div class="form-group">
									<label class="font-weight-700">Requirements *</label>
									<input name="requirements" class="form-control " placeholder="Requirements" type="text">
								</div>
								<div class="form-group">
									<label class="font-weight-700">Deadline *</label>
									<input name="deadline" class="form-control " placeholder="Deadline" type="text">
								</div>
								<div class="form-group">
									<label class="font-weight-700">Qualification *</label>
									<input name="qualification" class="form-control " placeholder="Qualification" type="text">
								</div>
								<div class="form-group">
									<label class="font-weight-700">Experience *</label>
									<input name="experinece" class="form-control " placeholder="Experience" type="text">
								</div>
								<div class="form-group">
									<label class="font-weight-700">Image *</label>
									<input name="image" class="form-control " type="file">
								</div>
								<div class="text-right">
									<button class="site-button outline outline-2" type="submit" name="post">CREATE</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Product END -->
	</div>
	<!-- contact area  END -->
</div>
<!-- Content END-->
<?php include './footer.php' ?>
