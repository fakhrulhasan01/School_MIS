<?php
$msg="";
$uce = new UpComingEvent();
$uce->Id=$_GET['id'];
if($uce->Delete()){
	$msg ="Delete successful.";
	}
	else{
	$msg =$uce->Err;	
	}
	Redirect("?a=upcomingevent&msg={$msg}");
?>