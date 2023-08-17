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
    $sql = "SELECT * from recruiter WHERE id = '$id'";
    $res = $db->query($sql);

    if ($res->num_rows < 1) {
        header('Location:' . $_SERVER['PHP_SELF']);
        exit();
    }

    $sql = "DELETE FROM recruiter WHERE id = '$id'";
    if ($db->query($sql) === true) {
        $msg = "Recruiter data deleted";
    } else {
        $error = "Can not delete Recruiter data";
    }
}


$sql = "SELECT * FROM recruiter";
$res = $db->query($sql);
$recruiters = [];
while ($row = $res->fetch_object()) {
    $recruiters[] = $row;
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
                             <th width="20%">email</th>
                           <th width="20%">phone</th>
                            <th width="35%">Action</th>
                        </tr>
                    </thead>
      
                    <tbody>
                   <?php $i = 1; foreach($recruiters as $r): ?>       
                        <tr>
                            <td><?php echo $i ?></td>
                           
                            <td><?php echo $r->name ?></td>
                            <td><?php echo $r->email ?></td>
                            <td><?php echo $r->phone ?></td>

                           
                            <td>
                                <a href="./view-recruiter.php?view=<?php echo $r->id ?>"
                                    class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                <a onclick="return confirm('Are you sure to delete booking data?')"
                                    href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>?delete=<?php echo htmlspecialchars($r->id) ?>"
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