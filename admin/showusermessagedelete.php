<?php 
$msg="";
$cuu = new ContactUsUser();
$cuu->Id = $_GET['id'];
if($cuu->Delete()){
	$msg.="Delete successful.";
	}
	else{
	$msg.=$cuu->Err;
	}
	Redirect("?a=showusermessage&msg={$msg}");
?>