<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Contact Form</title>
<link type="text/css" href="mail.css" rel="stylesheet">
<style>
label {
    display:block;
    margin-top:20px;
    letter-spacing:2px;
}</style>
</head>

<?php

	if(isset($_POST['submit']))
	{
			$to = "amitkukyan@gmail.com";
			$subject = $_POST['name'];
			$msg = $_POST['msg'];
			$from = $_POST['from'];

	//		echo"$to<br>";
	//		echo"$subject<br>";
	//		echo"$msg<br>";
	//		echo"$from<br>";



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

<body>
<form name="frm1" action="#" method='post'>

    <label>Name</label>
    <input name="name" placeholder="Type Here">

    <label>Email</label>
    <input name="from" type="email" placeholder="Type Here">

    <label>Message</label>
    <textarea name="msg" placeholder="Type Here"></textarea><br />

    <input name="submit" type="submit" value="Submit">

</form>

    <header class="body">
    </header>

    <section class="body">
    </section>

    <footer class="body">
    </footer>

</body>

</html>