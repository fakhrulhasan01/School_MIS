<?php
$msg="";
$y = new Year();
$y->Id=$_GET['id'];
if($y->Delete()){
	$msg ="Delete successful.";
	}
	else{
	$msg =$y->Err;	
	}
	Redirect("?a=year&msg={$msg}");
?>