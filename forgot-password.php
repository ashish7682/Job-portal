<?php
include './header.php';
require './src/Database.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/phpmailer/phpmailer/src/Exception.php';
require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';

require './src/mailer.php';

$db = Database::getInstance();

$err = '';
$msg = '';

$mail = new PHPMailer;

if (isset($_POST['login'])) {
	$email = $_POST['email'];

	if (strlen($email) < 1) {

		$err = "Please enter email";
	} else {
		$sql = "SELECT * FROM recruiter WHERE email = '$email'";
		//echo $sql;die;
		$res = $db->query($sql);

		if ($res->num_rows > 0) {
			$recruiter = $res->fetch_object();
			$rand = mt_rand(00000000, 99999999);
			$msg = "Your new password for online job portal : " . $rand;
			if (mailer($mail, $email, $msg)) {
				$msg = "We have sent a new password to your email, Please check";
				$new_pass = password_hash($rand, PASSWORD_DEFAULT);
				$sql = "UPDATE recruiter set password = '$new_pass', last_password = '$recruiter->password'";

				$db->query($sql);
			} else {
				$err = "Unable to sent password, Please try again later";
			}
		} else {
			//$err = "User not found";
			$sql = "SELECT * FROM users WHERE email = '$email'";
			//echo $sq;die;
			$res = $db->query($sql);
			if ($res->num_rows == 0) {
				$err = "No user found";
			} else {
				$user = $res->fetch_object();
				$rand = mt_rand(00000000, 99999999);
				$msg = "Your new password for online job portal : " . $rand;
				if (mailer($mail, $email, $msg)) {
					$msg = "We have sent a new password to your email, Please check";
					$new_pass = password_hash($rand, PASSWORD_DEFAULT);
					$sql = "UPDATE users set password = '$new_pass', last_password = '$user->password'";
					//echo $sql;die;
					$db->query($sql);
				} else {
					$err = "Unable to sent password, Please try again later";
				}
			}
		}
	}
}


?>
<!-- Content -->
<div class="page-content bg-white">
	<!-- contact area -->
	<div class="section-full content-inner-2 shop-account">
		<!-- Product -->
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h3 class="font-weight-700 m-t0 m-b20">Login Your Account</h3>
				</div>
			</div>
			<div id="msg">
				<?php if (strlen($msg) > 1) : ?>
					<div class="alert alert-success mt-3 text-center"><strong>Success! </strong><?php echo $msg ?>
					</div>
				<?php endif ?>
				<?php if (strlen($err) > 1) : ?>
					<div class="alert alert-danger mt-3 text-center"><strong>Failed! </strong><?php echo $err ?>
					</div>
				<?php endif ?>
			</div>
			<div>
				<div class="max-w700 m-auto m-b30">
					<div class="p-a30 border-1 seth">
						<div class="tab-content nav">
							<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="tab-pane active col-12 p-a0 ">
								<h4 class="font-weight-700">FORGET PASSWORD ?</h4>
								<p class="font-weight-600">We will send you a password in your email. </p>
								<div class="form-group">
									<label class="font-weight-700">E-MAIL *</label>
									<input type="text" name="email" class="form-control" placeholder="please enter your email">
								</div>
								<div class="text-left">
									<button name="login" type="submit" class="site-button pull-right button-lg">Submit</button>
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