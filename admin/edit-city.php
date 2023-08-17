<?php
include './header.php';


require_once '../src/Database.php';

$db = Database::getInstance();

if (isset($_GET['edit'])) {
    $id = $db->real_escape_string($_GET['edit']);
    $sql = "SELECT * FROM city WHERE id = '$id'";
    $res = $db->query($sql);
    if ($res->num_rows < 1) {
        header('Location: ./city-index');exit;
    } else {
        $city = $res->fetch_object();
    }
 
}

if (isset($_POST['submit'])) {
    $city = $db->real_escape_string($_POST['city']);
    $id = $db->real_escape_string($_POST['id']);
  
        $sql = "UPDATE city SET name = '$city' WHERE id = '$id'";
        if ( $db->query($sql) === true ) {
            $msg = 'City updated successfully';
        } else {
            $error = 'Failed to upate city';
        }
    }



?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/users/">City</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit City</li>
    </ol>
       <?php if (isset($error) && strlen($error) > 1) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error; ?>
        </div>
    <?php endif ?>

    <?php if (isset($msg) && strlen($msg) > 1) : ?>
        <div class="alert alert-success" role="alert">
            <?php echo $msg; ?>
        </div>
    <?php endif ?>
</nav>

<div class="container-fluid">

    <div class="card ">
        <div class="card-body">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                <div class="form-group row text-dark">
                    <div class="form-group col-md-6">
                        <label class="col-form-label font-weight-bold">City</label>
                        <input type="hidden" id="id" name="id" placeholder="" value="<?php echo $city->id ?>" />
                        <input type="text" id="city" name="city" value="<?php echo $city->name ?>"
                            class="form-control  form-control-sm w-50" contenteditable="true">
                        <small id="categoryError" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group col-md-12 ">
                        <button type="submit" name="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Edit City
                        </button>
                    </div>
                </div>

            </form>
            <div id="msg"></div>
        </div>
    </div>
</div>

<?php include './footer.php';?>

