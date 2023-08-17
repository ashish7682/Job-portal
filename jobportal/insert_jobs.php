<?php session_start(); ?>
<?php
	include("dbconnection.php");
	$result=mysql_query("select * from jobs_category");
	while($data=mysql_fetch_array($result))
	{
		$job_c[]=$data;
	}
?>
<html>
	<head>
		<style type="text/css">
		h4
		{
			text-align:center;
			color:red;
		}

		</style>
	</head>
<?php
	$butn= $skills = $city = $description = $experience = $experience = $job_category = $salary_expect = "";
	global $msg;
	$skills=$_POST['skills'];
	$city=$_POST['city'];
	$description=$_POST['description'];
	$experience=$_POST['experience'];
	$job_category=$_POST['job_category'];
	$salary_expect=$_POST['salary_expect'];
	$length=strlen($experience);
	//echo"Length=$length";

	//echo"$skills<br />";
	//echo"$city<br />";
	//echo"$description<br />";
	//echo"$experience<br />";
	//echo"$job_category<br>";
	//echo"$salary_expect<br />";
	//$len=strlen($city);

			if(isset($_POST['b1']))
			{
				if(empty($city) || empty($skills) || empty($description) || empty($experience) || empty($job_category) || empty($salary_expect))
				{
						//header("location:insert_jobs_info.php?x=1");
					$msg="error";
				}
				else
				{
					include("dbconnection.php");
									$query="insert into jobs values('','$skills','$city','$description','$experience','$job_category','$salary_expect')";
									$res=mysql_query("$query");
									if($res==1)
									{
									//	echo"Data Saved";
											//header("location:insert_jobs_info.php?x=2");
											$msg="Saved";
				}
				}

			}




?>
<!--action="insert_jobs_info_dbc.php"-->
	<body>
<form  name="insert_jobs_info" method="POST">
	<div id="bannr-lft" align='center'><br /><br /><br /><br /><br /><br /><br />
		<div class="heading">
					Insert Data
			</div>
				<table align=center>
				<!-- SKILLS-->
					<tr><td colspan="4"><input type="text" Placeholder="Type Your Skills, Designation etc." value="" name="skills" size="40"></td></tr>
				<!-- SKILL CLOSE-->
				<!-- CITY -->
				<tr><td colspan="4"><input type="text" placeholder="Type City Where You Want To Work" value="" name="city" size="40"></td></tr>
				<!-- CITY CLOSE -->
				<tr><td>Job Category </td><td>Experience</td><td colspan="2">Salary Expectation</td></tr>
					<tr><td>
				<!-- JOB_CATEGORY-->
						<select id="faid" name="job_category" >
							<option value="">- Select -</option>
								<?php foreach($job_c as $j) echo"<option value=$j[0]>$j[1]</option>"; ?>
				</select></td><td>
			<!--JOB_CATEGORY CLOSE -->
			<!--EXPERIENCE -->
				<select name="experience">
					<option value="">Experience</option>
										<option value='Fresher'>Fresher</option>
										<option value="1">1 yr</option>
										<option value="2">2 yr</option>
										<option value="3">3 yr</option>
										<option value="4">4 yr</option>
										<option value="5">5 yr</option>
										<option value="6">6 yr</option>
										<option value="7">7 yr</option>
										<option value="8">8 yr</option>
										<option value="9">9 yr</option>
										<option value="10">10 yr</option>
										<option value="11">11 yr</option>
										<option value="12">12 yr</option>
										<option value="13">13 yr</option>
										<option value="14">14 yr</option>
										<option value="15">15 yr</option>
										<option value="16">16 yr</option>
										<option value="17">17 yr</option>
										<option value="18">18 yr</option>
										<option value="19">19 yr</option>
										<option value="20">20 yr</option>
										<option value="21">21 yr</option>
										<option value="22">22 yr</option>
										<option value="23">23 yr</option>
										<option value="24">24 yr</option>
										<option value="25">25 yr</option>
										<option value="26">26 yr</option>
										<option value="27">27 yr</option>
										<option value="28">28 yr</option>
										<option value="29">29 yr</option>
										<option value="30">30 yr</option>
									</select>

						<!-- EXPERIENCE CLOSE-->
						<!-- SALARY-->
				</td><td>
				<select id="min_salary" name="salary_expect">
					<option value="">Salary</option>
											<option value=".5"><.5 Lakhs</option>
											<option value="1">1 Lakhs</option>
										<option value="2">2 Lakhs</option>
										<option value="3">3 Lakhs</option>
										<option value="4">4 Lakhs</option>
										<option value="5">5 Lakhs</option>
										<option value="6">6 Lakhs</option>
										<option value="7">7 Lakhs</option>
										<option value="8">8 Lakhs</option>
										<option value="9">9 Lakhs</option>
										<option value="10">10 Lakhs</option>
										<option value="11">11 Lakhs</option>
										<option value="12">12 Lakhs</option>
										<option value="13">13 Lakhs</option>
										<option value="14">14 Lakhs</option>
										<option value="15">15 Lakhs</option>
										<option value="16">16 Lakhs</option>
										<option value="17">17 Lakhs</option>
										<option value="18">18 Lakhs</option>
										<option value="19">19 Lakhs</option>
										<option value="20">20 Lakhs</option>
										<option value="21">21 Lakhs</option>
										<option value="22">22 Lakhs</option>
										<option value="23">23 Lakhs</option>
										<option value="24">24 Lakhs</option>
										<option value="25">25 Lakhs</option>
										<option value="26">26 Lakhs</option>
										<option value="27">27 Lakhs</option>
										<option value="28">28 Lakhs</option>
										<option value="29">29 Lakhs</option>
										<option value="30">30 Lakhs</option>
										<option value="31">31 Lakhs</option>
										<option value="32">32 Lakhs</option>
										<option value="33">33 Lakhs</option>
										<option value="34">34 Lakhs</option>
										<option value="35">35 Lakhs</option>
										<option value="36">36 Lakhs</option>
										<option value="37">37 Lakhs</option>
										<option value="38">38 Lakhs</option>
										<option value="39">39 Lakhs</option>
										<option value="40">40 Lakhs</option>
										<option value="41">41 Lakhs</option>
										<option value="42">42 Lakhs</option>
										<option value="43">43 Lakhs</option>
										<option value="44">44 Lakhs</option>
										<option value="45">45 Lakhs</option>
										<option value="46">46 Lakhs</option>
										<option value="47">47 Lakhs</option>
										<option value="48">48 Lakhs</option>
										<option value="49">49 Lakhs</option>
										<option value="50">>50 Lakhs</option>
				</select>
				<!-- SALARY CLOSE-->
</td>
</tr>
<tr><td>Description:</td></tr>
		<!--DESCRIPTION -->
<tr><td><textarea name='description'></textarea></td></tr>
		<!-- DESCRIPTION CLOSE-->
		<tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
		<tr><td>
		<?php

			echo"<h4>$msg</h4>";
		?></td></tr>

<tr><td colspan="4"><input type="submit" value="Insert" name="b1" /></td></tr>

	</table>
	</form>
</html>
