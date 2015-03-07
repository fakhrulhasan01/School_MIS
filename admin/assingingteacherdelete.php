<?php
$msg="";
$at = new assigningTeacher();
$at->Id=$_GET['id'];
if($at->Delete()){
	$msg ="Delete successful.";
	}
	else{
	$msg =$at->Err;	
	}
	Redirect("?a=assingingteacher&msg={$msg}");
?>