<?php
$msg="";
$pty = new PhotoType();
$pty->Id=$_GET['id'];
if($pty->Delete()){
	$msg ="Delete successful.";
	}
	else{
	$msg =$pty->Err;	
	}
	Redirect("?a=phototype&msg={$msg}");
?>