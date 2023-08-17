<?php
include './header.php';

require_once '../src/Database.php';

$db = Database::getInstance();

# Delete operation
if (isset($_GET['delete'])) {
    $id = $db->real_escape_string($_GET['delete']);
    $sql = "SELECT * from jobs WHERE id = '$id'";
    $res = $db->query($sql);

    if ($res->num_rows < 1) {
        header('Location:' . $_SERVER['PHP_SELF']);
        exit();
    }

    $sql = "DELETE FROM jobs WHERE id = '$id'";
    if ($db->query($sql) === true) {
        $msg = "Jobs data deleted";
    } else {
        $error = "Can not delete Jobs data";
    }
}

$sql = "SELECT * FROM jobs";
$res = $db->query($sql);
$jobs = [];
while ($row = $res->fetch_object()) {
    $jobs[] = $row;
}


?>

<div class="container-fluid">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><a href="">Dashboard</a> / Job Posts</li>
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
            Jobs Table</div>
        <div class="card-body">


            <div class="table-responsive">
                <table class="table table-bordered table-sm text-center dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                          
                           
                            <th >Job Id</th>
                            <th width="20%">Job Title</th>
                            <th width="20%">Description</th>
                           
                            <th width="35%">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                      <?php foreach ($jobs as $j): ?>
                        <tr>
                       
                            <td><?php echo $j->id ?></td>
                            <td><?php echo $j->title ?></td>
                        
                            <?php
                                $sql = "SELECT description, LEFT(description, 20) FROM jobs WHERE id = '$j->id'";
                                $res = $db->query($sql);
                                $row = $res->fetch_array();
                            ?>

                            <td><?php echo $row['LEFT(description, 20)']."..."?></td>
                            <td>
                                <a href="./view-job.php?view=<?php echo $j->id ?>"
                                    class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                <a onclick="return confirm('Are you sure to delete jobs data?')"
                                    href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>?delete=<?php echo htmlspecialchars($j->id) ?>"
                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                      <?php endforeach ?>
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