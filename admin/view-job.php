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

$sql = "SELECT * FROM jobs WHERE id = '$id'";
    
$res = $db->query($sql);
$data = $res->fetch_object();

?>
<div class="container-fluid">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><a href="">Dashboard</a> / Job Details</li>
    </ol>
    <div class="card">
        <div class="card-header">
           Job details
        </div>
        <div class="card-body">
            <table class="table tabled-bordered">
                <tr>
                    <td><strong>Title: </strong><?php echo htmlspecialchars($data->title) ?></td>
                    <?php
                     $sql = "SELECT name FROM sector WHERE id = '$data->sector'";
                                $res = $db->query($sql);
                                $row = $res->fetch_array(); 

                     ?>
                    <td width="20%"><strong>Sector: </strong><?php echo $row['name'] ?></td>
                  <td width="20%"><strong>Type: </strong><?php echo htmlspecialchars($data->type) ?></td>
                   
                </tr>
                <tr>
                     <?php
                     $sql = "SELECT name FROM city WHERE id = '$data->city'";
                                $res = $db->query($sql);
                                $row = $res->fetch_array(); 

                     ?>
                    <td><strong>City.: </strong><?php echo $row['name'] ?></td>
                     <?php
                     $sql = "SELECT name FROM recruiter WHERE id = '$data->recruiter'";
                                $res = $db->query($sql);
                                $row = $res->fetch_array(); 

                     ?>

                    <td><strong>Recruiter: </strong><?php echo $row['name'] ?></td>
                      <td width="20%"><strong>CTC: </strong><?php echo htmlspecialchars($data->ctc) ?></td>
                  
                </tr>
              
                <tr>
                      <td width="20%"><strong>Deadline: </strong><?php echo htmlspecialchars($data->deadline) ?></td>
                        <td width="20%"><strong>Qualification: </strong><?php echo htmlspecialchars($data->qualification) ?></td>
                   <td><strong>Experiance: </strong><?php echo htmlspecialchars($data->exp) ?></td>
                </tr>
                <tr>
                    
                     <td width="20%"><strong>How to apply: </strong><?php echo htmlspecialchars($data->how_to_apply) ?></td>
                        <td width="20%"><strong>Requirement: </strong><?php echo htmlspecialchars($data->requirement) ?></td>
                   <td><strong>Description: </strong><?php echo htmlspecialchars($data->description) ?></td>
                </tr>
                <tr> 
                 <td style="padding-top:10px"><strong>Attachment :</strong></td>
                                        <td ><a href="../upload/age-proof/<?php echo $data->image?>" target="blank">view </td>

                </tr>
            </table>
        </div>
    </div>
</div>


<?php
include './footer.php';
?>