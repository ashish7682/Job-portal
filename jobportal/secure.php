<?php
$hash = "71588074b7ca68dd02afe3f954fb2707"."|".$_POST['account_id']."|".$_POST['amount']."|".$_POST['reference_no']."|".$_POST['return_url']."|".$_POST['mode'];
//echo $hash;
$secure_hash = md5($hash);


?>
<form  method="post" action="https://secure.ebs.in/pg/ma/sale/pay" name="frmTransaction" id="frmTransaction" onSubmit="return validate()">
<input name="account_id" type="hidden" value="<?echo $_POST['account_id'] ?>">
     
 <input name="return_url" type="hidden" size="60" value="<? echo $_POST['return_url'] ?>" />
 <input name="mode" type="hidden" size="60" value="LIVE" />
  <input name="reference_no" type="hidden" value="<? echo  $_POST['reference_no'] ?>" />
  <input name="amount" type="hidden" value="<? echo $_POST['amount']?>"/>
  <input name="description" type="hidden" value="<? echo $_POST['description'] ?>" /> 
 <input name="name" type="hidden" maxlength="255" value="<? echo $_POST['name'] ?>" />
<input name="address" type="hidden" maxlength="255" value="<? echo $_POST['address'] ?>" />
<input name="city" type="hidden" maxlength="255" value="<? echo $_POST['city'] ?>" />
<input name="state" type="hidden" maxlength="255" value="<? echo $_POST['state'] ?>" />
<input name="postal_code" type="hidden" maxlength="255" value="<? echo $_POST['postal_code'] ?>" />
<input name="country" type="hidden" maxlength="255" value="<? echo $_POST['country'] ?>" />
 <input name="phone" type="hidden" maxlength="255" value="<? echo $_POST['phone'] ?>" />
   <input name="email" type="hidden" size="60" value="<? echo $_POST['email']?>" />
<input name="ship_name" type="hidden" maxlength="255" value="<? echo $_POST['ship_name'] ?>" />
<input name="ship_address" type="hidden" maxlength="255" value="<? echo $_POST['ship_address'] ?>" />
<input name="ship_city" type="hidden" maxlength="255" value="<? echo $_POST['ship_city'] ?>" />
<input name="ship_state" type="hidden" maxlength="255" value="<? echo $_POST['ship_state'] ?>" />
<input name="ship_postal_code" type="hidden" maxlength="255" value="<? echo $_POST['ship_postal_code'] ?>" />
<input name="ship_country" type="hidden" maxlength="255" value="<? echo $_POST['ship_country'] ?>" />
 <input name="ship_phone" type="hidden" maxlength="255" value="<? echo $_POST['ship_phone'] ?>" />
    <input name="secure_hash" type="hidden" size="60" value="<? echo $secure_hash;?>" />
 <input name="submitted" value="Submit" type="submit" />
 
</form>
