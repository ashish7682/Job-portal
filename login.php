<?php
include './header.php';
require './src/Database.php';

$db = Database::getInstance();

if (isset($_POST['login'])) {
    $email = $db->real_escape_string($_POST['email']);
    $password = $db->real_escape_string($_POST['password']);

    $sql = "SELECT * FROM recruiter WHERE email = '$email'";
    $res = $db->query($sql);

    if ($res->num_rows > 0) {
        # LOGIN AS COMPANY
        $user = $res->fetch_object();
        if (password_verify($password, $user->password)) {
            $_SESSION['user'] = $user;
            $_SESSION['type'] = 'recruiter';
            //header('Location: ./my-jobs.php');
            echo ("<script>location.href = 'my-jobs.php';</script>");
        } else {
            $error = "Wrong email or password";
        }
    } else {
        # LOGIN AS USER
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $res = $db->query($sql);
        if ($res->num_rows == 0) {
            $error = "No user found";
        } else {
            $user = $res->fetch_object();
            if (password_verify($password, $user->password)) {
                $_SESSION['user'] = $user;
                $_SESSION['type'] = 'user';
                //header('Location: ./my-jobs.php');
                echo ("<script>location.href = 'my-jobs.php';</script>");
            } else {
                $error = "Wrong email or password";
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
            <div>
                <div class="max-w700 m-auto m-b30 border border-dark rounded">
                    <div class="p-a30 border-1 seth">
                        <div class="tab-content nav">
                            <form id="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="tab-pane active col-12 p-a0 ">
                                <h4 class="font-weight-700">LOGIN</h4>
                                <p class="font-weight-600">If you have an account with us, please log in.</p>
                                <div class="form-group">
                                    <label class="font-weight-700">E-MAIL *</label>
                                    <input name="email" class="form-control border border-dark rounded" placeholder="Your Email Id" type="email">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-700">PASSWORD *</label>
                                    <input name="password" class="form-control border border-dark rounded" placeholder="Type Password" type="password">
                                </div>
                                <div class="text-right">
                                    <a href="./forgot-password.php" class="m-l5"><i class="fa fa-unlock-alt"></i> Forgot Password</a>
                                    <button type="submit" name="login" class="site-button m-r5 ">login</button>
                                </div>
                                <?php if (isset($error)) : ?>
                                    <div class="alert alert-danger my-2"><?php echo  $error ?></div>
                                <?php endif ?>
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