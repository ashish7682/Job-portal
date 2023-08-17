	<script >
		function validation()
		{
			{
				if(document.carform.name.value=="")
				{
					alert ("please enter the name");
					document.carform.name.focus();
					return false;
				}
			}
			{
							 if(document.carform.mob_no.value.length!=10)
							 {
								 alert("Please Enter The valid No.");
								 document.carform.mob_no.focus();
								 return false;
							 }
		}

	{
			    var email = document.getElementById('txtEmail');
			    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

			    if (!filter.test(email.value))
			    {
			    	alert('Please provide a valid email address');
			    	email.focus;
			    	return false;
			    }
		 	}
			{
				if(document.carform.msg.value=="")
				{
					alert("Please Enter Enquiry Here.");
					document.carform.msg.focus();
					return false;
				}
			}
		{
		if(document.carform.code1.value=="")
		{
			alert("Please Enter This Code");
			document.carform.code1.focus();
			return false;
		}
		if(document.carform.code1.value!=document.carform.code2.value)
		{
			alert("Please Enter Correct Code.");
			document.carform.code1.focus();
			return false;
		}
		}
		}
	</script>
<?php
	if(isset($_POST['Submit']))
	{
			$to = "amitkukyan@gmail.com";
				$subject = $_POST['name'];
				$msg1 = $_POST['msg'];
				$from = $_POST['email'];
				$phone= $_POST['mob_no'];
				$msg="$msg1" . "\n" . "With Best Regard   :   $subject" . "\n" . "My Contact No    :    $phone";
				//	echo"$to<br>";//		echo"$subject<br>";//		echo"$msg<br>";//		echo"$from<br>";

				$a=mail($to,$subject,$msg,$from);
				if($a==1)
				{
					echo"
					<script>
					alert('Message send sucessfully.');
					</script>
					";
				}
	}
?>

<!-------------------------->
<div style="border:solid 0px #ff0000;width:200px; height:auto; margin-top:10px;margin-left:0px;">

 	<!--#########################################################-->

	 <form name="carform" action="#" method="post" enctype="multipart/form-data" onSubmit="return validation()">


			<table align="left" border="0" cellpadding="2" cellspacing="2"  style=" margin-left:20px; width:200px;" >
			<tr><td>&nbsp;</td></tr>	<tr>
					<td colspan="2"><input name="name" placeholder='Name' type="text" value="" size="25"></td>
				</tr>
				<tr>
					<td colspan="2"><input name="mob_no" type="text" placeholder='Mobile No' value="" size="25"></td>
				</tr>
				<tr>
					<td colspan="2"><input id="txtEmail" name="email" type="text" placeholder='Email' value="" size="25"></td>
				</tr>
                 <tr>
                 	<td colspan="2" ><textarea name="msg" placeholder='Message' rows="2" cols="21"></textarea></td>
				</tr>
				<tr>

                      <td colspan='2'>
                       <input type="Submit" value="Submit" name="Submit" style="margin-left:60px;" ></td>


                              </tr>

<tr><td>&nbsp;</td></tr>
							</table></form>

				<!--######################################################### -->
</div>
	<!-------------------------->


