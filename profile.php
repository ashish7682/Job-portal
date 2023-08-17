
<?php 

session_start();
include './header.php';


//$id = $_SESSION['user'];
//print_r($id);die;
require './src/Database.php';
$db = Database::getInstance();

$recruiter = $_SESSION['user'];
 
if (isset($_POST['submit'])) {
	$title = $db->real_escape_string($_POST['title']);
	$desc = $db->real_escape_string($_POST['desc']);
	$type = $db->real_escape_string($_POST['type']);
	$ctc = $db->real_escape_string($_POST['ctc']);

	$qualific = $db->real_escape_string($_POST['qualific']);
	$exp = $db->real_escape_string($_POST['exp']);
	$howto = $db->real_escape_string($_POST['howto']);
	$sector = $db->real_escape_string($_POST['sector']);
	$city = $db->real_escape_string($_POST['city']);
	$recruit_id = $recruiter->id;
 


	$is_error = false;


	# TODO: Same should be checked for user tabel also

	if(!$is_error && empty($title)){
		$is_error = true;
		$error = "Please enter job title";
	}

	if(!$is_error && empty($desc)){
		$is_error = true;
		$error = "Please enter job description";
	}

	if(!$is_error && empty($type)){
		$is_error = true;
		$error = "Please select type";
	}

	if(!$is_error && empty($ctc)){
		$is_error = true;
		$error = "Please enter ctc";
	}

	if(!$is_error && empty($qualific)){
		$is_error = true;
		$error = "Please enter Qualification";
	}

	if(!$is_error && empty($exp)){
		$is_error = true;
		$error = "Please enter experience";
	}

	if(!$is_error && empty($howto)){
		$is_error = true;
		$error = "Please enter how to Apply";
	}

	
	

	$sql = "INSERT INTO jobs (title, description, type, ctc, qualification, exp, how_to_apply, sector, city, recruiter)
			VALUES ('$title', '$desc', '$type', '$ctc', '$qualific', '$exp', '$howto', '$sector', '$city', '$recruit_id')";

			//echo($sql);die;

	if(!$is_error)
		if ($db->query($sql) === true) {
			$msg = "Job upload successfull";
		} else {
			$error = "Failed to upload, Please try again later";
		}
}

# Get all cities
$sql = "SELECT * FROM city";
$res = $db->query($sql);
$cities = [];

while ($row = $res->fetch_object()) {
	$cities[] = $row;
}


# Get all sectors
$sql = "SELECT * FROM sector";
$res = $db->query($sql);
$sectors = [];

while ($row = $res->fetch_object()) {
	$sectors[] = $row;
}


 ?>
	<!-- Content -->
    <div class="page-content bg-white">
        <!-- contact area -->
        <div class="section-full content-inner shop-account">
            <!-- Product -->
            <div class="container">
            		<?php if (isset($error)) : ?>
							<div class="alert alert-danger mt-3"><?php echo $error ?></div>
						<?php endif ?>
						<?php if (isset($msg)) : ?>
							<div class="alert alert-success mt-3"><?php echo $msg ?></div>
						<?php endif ?>
                <div class="row">
					<div class="col-md-12 text-center">
						<h3 class="font-weight-700 m-t0 m-b20">Upload your job</h3>
					</div>
				</div>
                <div class="row">
					<div class="col-md-12 m-b30">
						<div class="p-a30 border-1  max-w700 m-auto">
							<div class="tab-content">
								<form id="login" class="tab-pane active" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
									<h4 class="font-weight-700">Job INFORMATION</h4>
								
									<div class="form-group">
										<label class="font-weight-700">Job Title*</label>
								
										<input name="title"  class="form-control" placeholder="job title" type="text">
									</div>
									<div class="form-group">
										<label class="font-weight-700">Job Description *</label>
										<input name="desc"  class="form-control" placeholder="Job Description" type="text">
									</div>
									<div >
										<label class="font-weight-700">Type *</label>
										<select class="form-group" name="type"> 
									   <option value="none">--select--</option>
                                         <option value="part-time">Part-time</option>
                                          <option value="full-time">Full-time</option>
										</select>
										
										
									</div>
									<div class="form-group">
										<label class="font-weight-700">CTC </label>
										<input name="ctc"  class="form-control " placeholder="ctc" type="text">
									</div>
										<div class="form-group">
										<label class="font-weight-700">Qualification </label>
										<input name="qualific" class="form-control "  type="text">
									</div>
									<div>
										<div class="form-group">
										<label class="font-weight-700">Experience </label>
										<input name="exp"  class="form-control "  type="text">
									</div>
									<div>		
										<div class="form-group">
										<label class="font-weight-700">How to Apply</label>
										<input name="howto"  class="form-control "  type="text">
									</div>
									<div >
										<label class="font-weight-700">Sector *</label>

										<select class="form-group" name="sector"> 

									   <option value="none">--select--</option>
                                   			 <?php foreach($sectors as $sector): ?>
                                         <option value="<?php echo $sector->id ?>"><?php echo $sector->name ?></option>
                                    	   <?php endforeach ?>	
										</select>
										
									</div>
										<div >
										<label class="font-weight-700">City *</label>

										<select class="form-group" name="city"> 

									   <option value="none">--select--</option>
                                   			 <?php foreach($cities as $city): ?>
                                         <option value="<?php echo $city->id ?>"><?php echo $city->name ?></option>
                                    	   <?php endforeach ?>	
										</select>
										
									</div>
									<div class="text-right">
										<button type="submit" name="submit" class="site-button outline outline-2">Post Job</button>
									</div>
								</form>
							</div>
						
						</div>
					</div>
				</div>
			</div>
            <!-- Product END -->
		</div>
		<!-- contact area  END -->
    </div>
	<!-- Content END-->
<?php include './footer.php' ?>
