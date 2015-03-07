<?php
$msg="";
$se = new Session();
$se->Id=$_GET['id'];
if($se->Delete()){
	$msg ="Delete successful.";
	}
	else{
	$msg =$se->Err;	
	}
	Redirect("?a=session&msg={$msg}");
?>