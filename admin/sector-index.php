<?php
include './header.php';

if ($_SESSION['role'] != 'admin') {
    header('Location: ./dashboard.php');
    exit();
}
require_once '../src/Database.php';

$db = Database::getInstance();

if (isset($_GET['delete'])) {
    $id = $db->real_escape_string($_GET['delete']);
    $sql = "SELECT * from sector WHERE id = '$id'";
    $res = $db->query($sql);

    if ($res->num_rows < 1) {
        header('Location:' . $_SERVER['PHP_SELF']);
        exit();
    }

    $sql = "DELETE FROM sector WHERE id = '$id'";
    if ($db->query($sql) === true) {
        $msg = "Sector data deleted";
    } else {
        $error = "Can not delete Sector data";
    }
}

$sql = "SELECT * FROM sector";
$res = $db->query($sql);
$sector = [];
while ($row = $res->fetch_object()) {
    $sector[] = $row;
}


?>

<div class="container-fluid">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><a href="">Dashboard</a> /Sector</li>
    </ol>
   <?php if (isset($msg)) : ?>
        <div class="alert alert-success">
            <strong><i class="fa fa-check">Success! </i></strong> <?php echo htmlspecialchars($msg) ?>
        </div>
    <?php endif ?>

    <?php if (isset($error)) : ?>
        <div class="alert alert-danger">Failed! </i></strong> <?php echo htmlspecialchars($error) ?>
        </div>
    <?php endif ?>

  <div class="row">
        <div class="col-lg-12 text-right mb-2">
            <a class="btn btn-primary font-weight-bold" href="./add-sector.php"><i class="fas fa-plus"></i> Add new sector</a>
        </div>
    </div>

    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Sector</div>
        <div class="card-body">


            <div class="table-responsive">
                <table class="table table-bordered table-sm text-center dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                           
                            <th width="20%">Sl No</th>
                            <th width="20%">name</th>
                            <th width="35%">Action</th>
                        </tr>
                    </thead>
      
                    <tbody>
                   <?php $i = 1; foreach($sector as $s): ?>       
                        <tr>
                            <td><?php echo $i ?></td>
                           
                            <td><?php echo $s->name ?></td>

                           
                            <td>
                                <a href="./edit-sector.php?edit=<?php echo $s->id ?>"
                                    class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Are you sure to delete booking data?')"
                                    href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>?delete=<?php echo htmlspecialchars($s->id) ?>"
                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                            <?php $i++; endforeach ?>    
                    </tbody> 
     
                </table>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->


<?php
include './footer.php';
?>