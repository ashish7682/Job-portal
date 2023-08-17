<?php
include './header.php';
require './src/Database.php';
$db = Database::getInstance();

if (isset($_POST['register'])) {
    $name = $db->real_escape_string($_POST['name']);
    $email = $db->real_escape_string($_POST['email']);
    $city = $db->real_escape_string($_POST['city']);
    $state = $db->real_escape_string($_POST['state']);
    $address = $db->real_escape_string($_POST['address']);

    $phone = $db->real_escape_string($_POST['phone']);
    $pin = $db->real_escape_string($_POST['pin']);
    $password = $db->real_escape_string($_POST['password']);


    $is_error = false;

    $sql = "SELECT * FROM recruiter WHERE email = '$email'";
    $res = $db->query($sql);
    if ($res->num_rows > 0) {
        $is_error = true;
        $error = "Email already exits";
    }

    # TODO: Same should be checked for user tabel also

    if (!$is_error && empty($name)) {
        $is_error = true;
        $error = "Please enter name";
    }

    if (!$is_error && empty($email)) {
        $is_error = true;
        $error = "Please enter email";
    }

    if (!$is_error && empty($city)) {
        $is_error = true;
        $error = "Please select city";
    }

    if (!$is_error && empty($state)) {
        $is_error = true;
        $error = "Please enter state";
    }

    if (!$is_error && empty($address)) {
        $is_error = true;
        $error = "Please enter address";
    }

    if (!$is_error && empty($pin)) {
        $is_error = true;
        $error = "Please enter pin";
    }
    if (!$is_error && !preg_match('/^[0-9]{6}+$/', $pin)) {
        $is_error = true;
        $error = "Pin should be 6 digit";
    }
    if (!$is_error && empty($phone)) {
        $is_error = true;
        $error = "Please enter phone number";
    }
    if (!$is_error && !preg_match('/^[0-9]{10}+$/', $phone)) {
        $is_error = true;
        $error = "Phone number must be 10 digit";
    }

    if (!$is_error && empty($password)) {
        $is_error = true;
        $error = "Please enter password";
    }

    $h_pass = password_hash($password, PASSWORD_DEFAULT);
    $maxFileSize = 2000 * 1024; // 2MB
    $minFileSize = 10 * 1024; // 20KB


    $allwoedExts = ['jpg', 'jpeg', 'png'];
    if ($_FILES['photo']['error'] == 4) {
        $error = 'Plaese select  image file';
    } else if (!in_array(strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION)), $allwoedExts)) {
        $error = 'Inavlid file format, (jpg, jpeg, png  are allowed only ';
    } else if ($_FILES['photo']['size'] > $maxFileSize) {
        $error = 'Image size is too large';
    } else if ($_FILES['photo']['size'] < $minFileSize) {
        $error = 'Image size is too small';
    }

    $photo = $_FILES['photo']['name'];

    move_uploaded_file($_FILES['photo']['tmp_name'], './images/uploaded/' . $_FILES['photo']['name']);

    $sql = "INSERT INTO recruiter (email, password, name, phone, city, state, pin, address, photo)
            VALUES ('$email', '$h_pass', '$name', '$phone', '$city', '$state', '$pin', '$address', '$photo')";

    if (!$is_error)
        if ($db->query($sql) === true) {
            $msg = "Registration successfull, Please login";
        } else {
            $error = "Failed to register, Please try again later";
        }
}

# Get all cities
$sql = "SELECT id, name FROM city";
$res = $db->query($sql);
$cities = [];

while ($row = $res->fetch_object()) {
    $cities[] = $row;
}

?>
<!-- Content -->
<div class="page-content bg-white">
    <!-- contact area -->
    <div class="section-full content-inner shop-account">
        <!-- Product -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3 class="font-weight-700 m-t0 m-b20">Create An Account</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 m-b30">
                    <div class="p-a30 border-1  max-w700 m-auto">
                        <div class="tab-content">
                            <form id="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="tab-pane active" enctype="multipart/form-data">
                                <h4 class="font-weight-700">PERSONAL INFORMATION</h4>
                                <p class="font-weight-600">If you have an account with us, please log in.</p>
                                <div class="form-group">
                                    <label class="font-weight-700">NAME *</label>
                                    <input name="name" class="form-control" placeholder="Your Name" type="text">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-700">E-MAIL *</label>
                                    <input name="email" class="form-control" placeholder="Your Email Id" type="email">
                                </div>


                                <div class="form-group">
                                    <label class="font-weight-700">CITY *</label>
                                    <input name="city" class="form-control" placeholder="Your City" type="text">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-700">STATE *</label>
                                    <input name="state" class="form-control" placeholder="Your State" type="text">
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-700">ADDRESS *</label>
                                    <input name="address" class="form-control" placeholder="Your Address" type="text">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-700">PIN *</label>
                                    <input name="pin" class="form-control" placeholder="Your Pin" type="text">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-700">PHONE *</label>
                                    <input name="phone" class="form-control" placeholder="Your Phone" type="text">
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-700">PROFILE PHOTO *</label>
                                    <input name="photo" class="form-control" type="file">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-700">PASSWORD *</label>
                                    <input name="password" class="form-control " placeholder="Type Password" type="password">
                                </div>
                                <div class="text-right">
                                    <button name="register" type="submit" class="site-button outline outline-2">CREATE</button>
                                </div>
                            </form>
                        </div>
                        <?php if (isset($error)) : ?>
                            <div class="alert alert-danger mt-3"><?php echo $error ?></div>
                        <?php endif ?>
                        <?php if (isset($msg)) : ?>
                            <div class="alert alert-success mt-3"><?php echo $msg ?></div>
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