<?php
include './header.php';

if (!isset($_GET['view']) || strlen($_GET['view']) < 1 || !ctype_digit($_GET['view'])) {
    header('Location:./index.php');
    exit();
}
require_once '../src/Database.php';
$db = Database::getInstance();

$id = filter_var($_GET['view'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$id = $db->real_escape_string($id);


$sql = "SELECT * FROM recruiter";
// print_r($query);die();
$result = $db->query($sql);
$recruiter_details = $result->fetch_object();
// print_r($booking_details->admitCard);die();

?>


<div class="container-fluid">
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active"><a href="">Dashboard</a>  / View Recruiter</li>
  </ol>
  <div class="card">
  <div class="table-responsive" style="height: 600px; overflow-y:auto">
            <div  class="col-lg-12">

                    <table  cellspacing="0" width="100%" class="my-5" style="margin-top:60px">

                        <tr>
                            <td colspan="2" style="padding: 10px">
                                <table width="100%">
                                    <tr>
                                        <td width="130px"><strong>Name:</strong></td>
                                        <td> <?php echo $recruiter_details->name ?></td>
                                        <td width="110px"><strong>Email:</strong></td>
                                        <td><?php echo $recruiter_details->email ?></td>
                                        <td width="130px"><strong>Phone:</strong></td>
                                        <td><?php echo $recruiter_details->phone ?></td>
                                        <td width="130px"><strong>City:</strong></td>
                                        <td><?php echo $recruiter_details->city ?></td>
                                    </tr>
                                    <tr >
                                        <td width="110px" style="padding-top:80px"><strong>State:</strong></td>
                                        <td width="110px" style="padding-top:80px" ><?php echo $recruiter_details->state ?></td>
                                        <td style="padding-top:80px"><strong>Pin:</strong></td>
                                        <td style="padding-top:80px"><?php echo $recruiter_details->pin ?></td>
                                        <td style="padding-top:80px"><strong>Address:</strong></td>
                                        <td style="padding-top:80px"><?php echo $recruiter_details->address ?></td>
                                       
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2" style="padding-top:70px">
                                <table  width="100%" >
                                    <tbody>
                                   
                                    <tr >
                                        <td style="padding-top:10px"><strong>Attachment :</strong></td>
                                        <td ><a href="../upload/age-proof/<?php echo $recruiter_details->photo ?>" target="blank">view photo</a></td>

                                    </tr>
                                   
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>


                        <div class="page-break" style="position:relative; height:75px"></div>

            </div>
        </div>
 </div>

<?php
include './footer.php';
?>