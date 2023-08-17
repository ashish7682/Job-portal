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
	<body>
<form action="find_jobs_dbc.php" name="find_jobs" method="POST">
	<div id="bannr-lft" align='center'><br /><br /><br /><br /><br /><br /><br />
		<div class="heading">
							Find Jobs
			</div>
				<table align=center>
				<!-- SKILLS-->
					<tr><td colspan="4"><input type="text" Placeholder="Type Your Skills, Designation etc." value="" name="skills" size="40"></td></tr>
				<!-- SKILL CLOSE-->
				<!-- CITY -->
				<tr><td colspan="4"><input type="text" placeholder="Type City Where You Want To Work" value="" name="city" size="40"></td></tr>
				<!-- CITY CLOSE -->
					<tr><td>
				<!-- JOB_CATEGORY-->
					<select id="faid" name="job_category" >
						<option value="">- Select -</option>
						<?php
							foreach($job_c as $j)
							echo"<option value=$j[0]>$j[1]</option>";
						?>
				</select></td><td>
			<!--JOB_CATEGORY CLOSE -->
			<!--EXPERIENCE -->
				<select name="experience">
					<option value="">Experience</option>
										<option value="-1">0 yr</option>
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
</td>
</tr>
	<tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
		<tr><td>
		<?php
			$a=$_GET['x'];
			if($a==2) echo"<h4>Data Saved Sucessfully.</h4>";


		?></td></tr>
		<tr><td>
		<?php
			$b=$_GET['x'];
			if($b==1) echo"<h4>Some entry missing.</h4>";

		?></td></tr>

<tr><td colspan="4"><input type="submit" value="Search" name="b1" /></td></tr>

	</table>
	</form>
</html>
