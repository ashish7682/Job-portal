<?php
session_start();
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- FAVICONS ICON -->
    <link rel="icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
    <!-- PAGE TITLE HERE -->
    <title>Job-Portal</title>
    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- STYLESHEETS -->
    <link rel="stylesheet" type="text/css" href="css/plugins.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/templete.css">
    <link class="skin" rel="stylesheet" type="text/css" href="css/skin/skin-1.css">
    <link rel="stylesheet" href="plugins/datepicker/css/bootstrap-datetimepicker.min.css" />
    <!-- Revolution Slider Css -->
    <link rel="stylesheet" type="text/css" href="plugins/revolution/revolution/css/layers.css">
    <link rel="stylesheet" type="text/css" href="plugins/revolution/revolution/css/settings.css">
    <link rel="stylesheet" type="text/css" href="plugins/revolution/revolution/css/navigation.css">
    <!-- Revolution Navigation Style -->
</head>

<body id="bg">
    <div id="loading-area"></div>
    <div class="page-wraper">
        <!-- header -->
        <header class="site-header mo-left header fullwidth">
            <!-- main header -->
            <div class="sticky-header main-bar-wraper navbar-expand-lg">
                <div class="main-bar clearfix">
                    <div class="container clearfix">
                        <!-- website logo -->
                        <div class="logo-header mostion">
                            <a href="./index.php" style="font-size:30px">Jobportal</a>
                        </div>
                        <!-- nav toggle button -->
                        <!-- nav toggle button -->
                        <button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                        <!-- extra nav -->
                        <div class="extra-nav">
                            <?php if (isset($_SESSION['user'])) : ?>
                                <div class="extra-cell">
                                    <?php echo $_SESSION['user']->name ?>
                                    <a href="logout.php" class="site-button"><i class="fa fa-lock"></i> logout</a>
                                </div>
                            <?php else : ?>
                                <div class="extra-cell">
                                    <a href="./register-choice.php" class="site-button"><i class="fa fa-user"></i> Sign Up</a>
                                    <a href="login.php" class="site-button"><i class="fa fa-lock"></i> login</a>
                                </div>
                            <?php endif ?>
                        </div>
                        <!-- Quik search -->
                        <div class="dez-quik-search bg-primary">
                            <form action="#">
                                <input name="search" value="" type="text" class="form-control" placeholder="Type to search">
                                <span id="quik-search-remove"><i class="flaticon-close"></i></span>
                            </form>
                        </div>
                        <!-- main nav -->
                        <div class="header-nav navbar-collapse collapse justify-content-start" id="navbarNavDropdown">
                            <ul class="nav navbar-nav">
                                <li>
                                    <a href="./index.php">Home</a>
                                </li>
                                <?php if (isset($_SESSION['user'])) : ?>
                                    <li>
                                        <a href="./my-jobs.php">My Jobs</a>
                                    </li>
                                <?php endif ?>
                                <?php if (isset($_SESSION['type']) && $_SESSION['type']  == 'recruiter') : ?>
                                    <li>
                                        <a href="./profile.php">Post Job</a>
                                    </li>
                                <?php endif ?>
                                <li>
                                    <a href="./browse-job.php">Browse Job</a>
                                </li>
                                <li>
                                    <a href="./contact.php">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main header END -->
        </header>
        <!-- header END -->