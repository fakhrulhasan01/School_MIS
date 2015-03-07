<?php
$msg="";
$ps = new PhotoSlider();
$ps->Id=$_GET['id'];
if($ps->Delete()){
	$msg ="Delete successful.";
	}
	else{
	$msg =$ps->Err;	
	}
	Redirect("?a=photoslider&msg={$msg}");
?>