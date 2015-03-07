<?php
$msg="";
$se = new Section();
$se->Id=$_GET['id'];
if($se->Delete()){
	$msg ="Delete successful.";
	}
	else{
	$msg =$se->Err;	
	}
	Redirect("?a=section&msg={$msg}");
?>