<?php
include './header.php';


require_once '../src/Database.php';

$db = Database::getInstance();


if (isset($_GET['delete'])) {
    $id = $db->real_escape_string($_GET['delete']);
    $sql = "SELECT * from city WHERE id = '$id'";
    $res = $db->query($sql);

    if ($res->num_rows < 1) {
        header('Location:' . $_SERVER['PHP_SELF']);
        exit();
    }

    $sql = "DELETE FROM city WHERE id = '$id'";
    if ($db->query($sql) === true) {
        $msg = "City data deleted";
    } else {
        $error = "Can not delete City data";
    }
}

$sql = "SELECT * FROM city";
$res = $db->query($sql);
$city = [];
while ($row = $res->fetch_object()) {
    $city[] = $row;
}


?>

<div class="container-fluid">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><a href="">Dashboard</a> /City</li>
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
            <a class="btn btn-primary font-weight-bold" href="./add-city.php"><i class="fas fa-plus"></i> Add new city</a>
        </div>
    </div>
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            City</div>
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
                   <?php $i = 1; foreach($city as $c): ?>       
                        <tr>
                            <td><?php echo $i ?></td>
                           
                            <td><?php echo $c->name ?></td>

                           
                            <td>
                                <a href="./edit-city.php?edit=<?php echo $c->id ?>"
                                    class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Are you sure to delete booking data?')"
                                    href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>?delete=<?php echo htmlspecialchars($c->id) ?>"
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