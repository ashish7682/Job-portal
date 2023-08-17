<?php
include './header.php';


require_once '../src/Database.php';

$db = Database::getInstance();

if (isset($_GET['edit'])) {
    $id = $db->real_escape_string($_GET['edit']);
    $sql = "SELECT * FROM sector WHERE id = '$id'";
    $res = $db->query($sql);
    if ($res->num_rows < 1) {
        header('Location: ./sector-index');exit;
    } else {
        $sector = $res->fetch_object();
    }
 
}

if (isset($_POST['submit'])) {
    $sector = $db->real_escape_string($_POST['sector']);
    $id = $db->real_escape_string($_POST['id']);
  
        $sql = "UPDATE sector SET name = '$sector' WHERE id = '$id'";
        if ( $db->query($sql) === true ) {
            $msg = 'Sector updated successfully';
        } else {
            $error = 'Failed to upate sector';
        }
    }



?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/users/">Sector</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Sector</li>
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
                        <input type="hidden" id="id" name="id" placeholder="" value="<?php echo $sector->id ?>" />
                        <input type="text"  name="sector" value="<?php echo $sector->name ?>"
                            class="form-control  form-control-sm w-50" contenteditable="true">
                        <small id="categoryError" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group col-md-12 ">
                        <button type="submit" name="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Edit Sector
                        </button>
                    </div>
                </div>

            </form>
            <div id="msg"></div>
        </div>
    </div>
</div>

<?php include './footer.php';?>

