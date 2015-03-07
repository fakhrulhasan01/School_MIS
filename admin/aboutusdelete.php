<?php 
$msg="";
$ab = new AboutUs();
$ab->Id = $_GET['id'];
if($ab->Delete()){
	$msg.="Delete successful.";
	}
	else{
	$msg.=$ab->Err;
	}
	Redirect("?a=aboutus&msg={$msg}");
?>