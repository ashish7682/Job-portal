<?php session_start(); ?>
<?php
	mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('naukri2jobs');
	$result = mysql_query('select * from experience');
	$states = array();
	while($data = mysql_fetch_array($result))
	{
	    $exp[] = $data;
	}
?>
<html>
<head>
<script src="jquery-1.10.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#state').change(function()
    {
    		$("#city").slideDown("slow");
    	   var id=$(this).val();
    	   $('#city').load('a2.php',{id:id},function(){});
    });
});
</script>
<script type="text/javascript">
function reval()
{
	var ih = document.getElementById("tot_amount").innerHTML;
	ih=ih.replace("Rs. ","");
	ih=parseInt(ih);
	var cover=document.getElementById("cover_amt").innerHTML;
	cover=cover.replace("Rs. ","");
 	cover=parseInt(cover);
	var x=document.getElementById("check1").checked;
	if(x == true)
	{
			ih=ih+cover;
			document.getElementById("tot_amount").innerHTML = "Rs. "+ih;
			document.getElementById("tot_amount1").innerHTML = "Rs. "+ih;
	}
	if(x == false)
 	{
 			ih=ih-cover;
 			document.getElementById("tot_amount").innerHTML = "Rs. "+ih;
 			document.getElementById("tot_amount1").innerHTML = "Rs. "+ih;
	}
}
</script>
<script type="text/javascript">
function reval3()
{
	var ih = document.getElementById("tot_amount").innerHTML;
	ih=ih.replace("Rs. ","");
	ih=parseInt(ih);
	var pr=document.getElementById("print").innerHTML;
	pr=pr.replace("Rs. ","");
	pr=parseInt(pr);
	var x=document.getElementById("check2").checked;
	if(x == true)
	{
		ih=ih+pr;
		document.getElementById("tot_amount").innerHTML = "Rs. "+ih;
		document.getElementById("tot_amount1").innerHTML = "Rs. "+ih;

	}
	if(x == false)
	{
		ih=ih-pr;
		document.getElementById("tot_amount").innerHTML = "Rs. "+ih;
		document.getElementById("tot_amount1").innerHTML = "Rs. "+ih;
	}
}

</script>

<style type="text/css">
#city
{
padding:10px;
display:none;
}
</style>
</head>
<body>
<form name='frm2' method='post' action='data.php'>
		<center><select id="state" name="v1">
		<option value="-1">Select Experience</option>
		<?php foreach($exp as $e){
		    echo '<option value="'.$e[0].'">'.$e[1].'</option>';
		}?>
		</select>
		<center>
		<div id="city">
		</center>
		</div>
		</center>
		</form>
</body>
</html>
<?php
?>
