<?php
$msg="";
$earn = new Earn();
$earn->Id = $_GET['id'];
if($earn->Delete()){
	$msg.="Delete successful.";
	}
	else{
	$msg.=$earn->Err;	
	}
	Redirect("?ad=earn&msg={$msg}");
?>