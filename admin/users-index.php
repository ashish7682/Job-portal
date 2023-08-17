<?php
include './header.php';

require_once '../src/Database.php';

$db = Database::getInstance();

# Delete operation
if (isset($_GET['delete'])) {
    $id = $db->real_escape_string($_GET['delete']);
    $sql = "SELECT * from users WHERE id = '$id'";
    $res = $db->query($sql);

    if ($res->num_rows < 1) {
        header('Location:' . $_SERVER['PHP_SELF']);
        exit();
    }

    $sql = "DELETE FROM users WHERE id = '$id'";
    if ($db->query($sql) === true) {
        $msg = "Users data deleted";
    } else {
        $error = "Can not delete Users data";
    }
}

$sql = "SELECT * FROM users";
$res = $db->query($sql);
$details = [];
while ($row = $res->fetch_object()) {
    $details[] = $row;
}


?>

<div class="container-fluid">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><a href="">Dashboard</a> / Users</li>
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
            Users Table</div>
        <div class="card-body">


            <div class="table-responsive">
                <table class="table table-bordered table-sm text-center dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                          
                           
                            <th >Sl no</th>
                            <th width="20%">Name</th>
                             <th width="20%">email</th>
                             
                           
                            <th width="35%">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                      <?php $i=0; foreach ($details as $d): ?>
                        <tr>
                       
                             <td><?php echo $i+1 ?></td>
                            <td><?php echo $d->name ?></td>
                   
                        

                            <td><?php echo $d->email ?></td>
                            <td>
                               <!-- <a href="./view-user.php?view=<?php echo $d->id ?>"
                                    class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>-->
                                <a onclick="return confirm('Are you sure to delete users data?')"
                                    href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>?delete=<?php echo htmlspecialchars($d->id) ?>"
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