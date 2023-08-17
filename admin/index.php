<?php
session_start();
require_once '../src/Database.php';

$db = Database::getInstance();

if (isset($_POST['submit'])) {
    $error = '';
    if (strlen($_POST['username']) < 1) {
        $error = 'Please enter username';
    } else if (strlen($_POST['password']) < 1) {
        $error = 'Please enter password';
    } else {
        $username = $db->real_escape_string($_POST['username']);
        $password = $db->real_escape_string($_POST['password']);

	$sql = "SELECT username, password, name,role FROM admin WHERE username = '$username'";
        $res = $db->query($sql);
        if ($res->num_rows < 1) {
            $error = 'No user found';
        } else {
            $user = $res->fetch_object();
            if (password_verify($password, $user->password)) {
                $_SESSION['user'] = $user->username;
                $_SESSION['name'] = $user->name;
                $_SESSION['role'] = $user->role;
                //header('Location: ./dashboard.php');
                //exit();
                echo("<script>location.href = './dashboard.php';</script>");
            } else {
                $error = 'Wrong username or password';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Admin - Login</title>

    <!-- Custom fonts for this template-->
    <link href="./resources/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="./resources/css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">
    <div class="container">
        <div class="card card-login mx-auto" style="margin-top: 25vh">
            <div class="card-header text-center font-weight-bold">Admin Panel Login</div>
            <div class="card-body">
                <form id="formLogin" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                    <div class="form-group">
                        <label for="inputUsername">Username</label>
                        <div class="form-label-group">

                            <input type="text" name="username" id="username" class="form-control"
                                placeholder="Enter username">
                            <small id="usernameError" class="form-text text-danger"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <div class="form-label-group">

                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Password">
                            <small id="passwordError" class="form-text text-danger"></small>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                    <div id="msg" style="margin-top: 15px;"></div>
                </form>
                <?php if (isset($error) && strlen($error) > 1): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
                <?php endif?>

                <?php if (isset($_SESSION['error']) && strlen($_SESSION['error']) > 1): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['error'];
unset($_SESSION['error']) ?>
                </div>
                <?php endif?>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="./resources/vendor/jquery/jquery.min.js"></script>
    <script src="./resources/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="./resources/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!--<script src="./main.js"></script>-->



</body>

</html>
