<?php
$msg="";
$pg = new PhotoGallary();
$pg->Id=$_GET['id'];
if($pg->Delete()){
	$msg ="Delete successful.";
	}
	else{
	$msg =$pg->Err;	
	}
	Redirect("?a=photogallary&msg={$msg}");
?>