<?php 
$msg="";
$b = new BloodGroup();
$b->Id = $_GET['id'];
if($b->Delete()){
	$msg.="Delete successful.";
	}
	else{
	$msg.=$b->Err;
	}
	Redirect("?a=bloodgroup&msg={$msg}");
?>