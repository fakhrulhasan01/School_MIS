<?php
$msg="";
$cu = new ContactUs();
$cu->Id=$_GET['id'];
if($cu->Delete()){
	$msg ="Delete successful.";
	}
	else{
	$msg =$cu->Err;	
	}
	Redirect("?a=contactus&msg={$msg}");
?>