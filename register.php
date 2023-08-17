<?php
include './header.php';
require './src/Database.php';

$db = Database::getInstance();

if (isset($_POST['register'])) {
	$email = $db->real_escape_string($_POST['email']);
	$password = $db->real_escape_string($_POST['password']);
	$name = $db->real_escape_string($_POST['name']);


	$sql = "SELECT * FROM users WHERE email = '$email'";
	$res = $db->query($sql);

	if (!empty($email) && !empty($password)) {

		if ($res->num_rows > 0) {
			$error = "Email already exits";
		} else {
			$h_pass = password_hash($password, PASSWORD_DEFAULT);
			$fileExt = pathinfo($_FILES['resume']['name'], PATHINFO_EXTENSION);
			if ($fileExt !== 'pdf') {
				$error = "Resume must be a pdf file";
			} else {
				$fileName = md5(time()) . '.' . $fileExt;
				move_uploaded_file($_FILES['resume']['tmp_name'], './resume/' . $fileName);
				$sql = "INSERT INTO users (name, email, password, resume) VALUES ('$name', '$email', '$h_pass', '$fileName')";
				if ($db->query($sql) === true) {
					$msg = "Registration successfull, Please login";
				} else {
					$error = "Registration failed, Please try again later";
				}
			}
		}
	} else {
		$error = "Enter emil and password";
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
					<h3 class="font-weight-700 m-t0 m-b20">Create An Account</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 m-b30">
					<div class="p-a30 border-1  max-w700 m-auto">
						<div class="tab-content">
							<form id="login" class="tab-pane active" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
								<h4 class="font-weight-700">PERSONAL INFORMATION</h4>
								<p class="font-weight-600">If you have an account with us, please log in.</p>
								<div class="form-group">
									<label class="font-weight-700">NAME *</label>
									<input name="name" class="form-control" placeholder="Your name" type="text">
								</div>
								<div class="form-group">
									<label class="font-weight-700">E-MAIL *</label>
									<input name="email" class="form-control" placeholder="Your Email Id" type="email">
								</div>
								<div class="form-group">
									<label class="font-weight-700">PASSWORD *</label>
									<input name="password" class="form-control " placeholder="Type Password" type="password">
								</div>
								<div class="form-group">
									<label class="font-weight-700">RESUME *</label>
									<input name="resume" class="form-control" type="file">
								</div>
								<div class="text-right">
									<button name="register" type="submit" class="site-button outline outline-2">CREATE</button>
								</div>
							</form>
						</div>
						<?php if (isset($error)) : ?>
							<div class="alert alert-danger my-2"><?php echo $error ?></div>
						<?php endif ?>
						<?php if (isset($msg)) : ?>
							<div class="alert alert-success my-2"><?php echo $msg ?></div>
						<?php endif ?>

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
