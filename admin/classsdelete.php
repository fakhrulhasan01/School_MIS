<?php
$msg="";
$cl = new Classs();
$cl->Id=$_GET['id'];
if($cl->Delete()){
	$msg ="Delete successful.";
	}
	else{
	$msg =$cl->Err;	
	}
	Redirect("?a=class&msg={$msg}");
?>