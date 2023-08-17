<?php
include './header.php';

if (!isset($_GET['view']) || !ctype_digit($_GET['view'])) {
    http_response_code(400);
    echo 'Bad request';
    return;
}

require_once '../src/Database.php';
$db = Database::getInstance();



$id = $db->real_escape_string($_GET['view']);

$sql = "SELECT * FROM professional_details WHERE id = '$id'";
    
$res = $db->query($sql);
$data = $res->fetch_object();


$resume = explode("/", $data->resume)[3];


?>
<div class="container-fluid">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><a href="">Dashboard</a> / Use Details</li>
    </ol>
    <div class="card">
        <div class="card-header">
           User details
        </div>
        <div class="card-body">
            <table class="table tabled-bordered">
                <tr>
                    <td><strong>Name: </strong><?php echo htmlspecialchars($data->name) ?></td>
                    <?php
                     $sql = "SELECT email FROM users WHERE id = '$data->user'";
                                $res = $db->query($sql);
                                $row = $res->fetch_array(); 

                     ?>
                    <td width="20%"><strong>Email: </strong><?php echo $row['email'] ?></td>
                  <td width="20%"><strong>Pho:ne </strong><?php echo htmlspecialchars($data->phone) ?></td>
                   
                </tr>
                <tr>
             
                      <td width="20%"><strong>Address: </strong><?php echo htmlspecialchars($data->address) ?></td>
                  
                </tr>
              
               
                <tr> 
                 <td style="padding-top:10px"><strong>Resume :</strong></td>
                                        <td ><a href="./uploaded-files/<?php echo $resume ?>" target="blank">view </td>

                </tr>
            </table>
        </div>
    </div>
</div>


<?php
include './footer.php';
?>