<?php
include './header.php';


require_once '../src/Database.php';

$db = Database::getInstance();



if (isset($_POST['submit'])) {
    $sector = $db->real_escape_string($_POST['sector']);
  
        $sql = "INSERT INTO sector (name) VALUES ('$sector')";
        if ( $db->query($sql) === true ) {
            $msg = 'Sector added successfully';
        } else {
            $error = 'Failed to add sector';
        }
    }



?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="./sector-index.php">Sector</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Sector</li>
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
                        <label class="col-form-label font-weight-bold">Sector</label>
                        <input type="text"  name="sector" 
                            class="form-control  form-control-sm w-50" contenteditable="true">
                        <small id="categoryError" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group col-md-12 ">
                        <button type="submit" name="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add Sector
                        </button>
                    </div>
                </div>

            </form>
            <div id="msg"></div>
        </div>
    </div>
</div>

<?php include './footer.php';?>

