<?php 
$msg="";
$cm = new ClassMaterial();
$cm->Id = $_GET['id'];
if($cm->Delete()){
	$msg.="Delete successful.";
	}
	else{
	$msg.=$cm->Err;	
	}
	Redirect("?t=classmaterial&msg={$msg}");
?>