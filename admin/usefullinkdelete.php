<?php
$msg="";
$ul = new Usefullink();
$ul->Id=$_GET['id'];
if($ul->Delete()){
	$msg ="Delete successful.";
	}
	else{
	$msg =$ul->Err;	
	}
	Redirect("?a=usefullink&msg={$msg}");
?>