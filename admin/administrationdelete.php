<?php
$msg="";
$ad = new Administration();
$ad->Id=$_GET['id'];
if($ad->Delete()){
	$msg ="Delete successful.";
	}
	else{
	$msg =$ad->Err;	
	}
	Redirect("?a=administration&msg={$msg}");
?>