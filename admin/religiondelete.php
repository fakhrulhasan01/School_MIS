<?php 
$msg="";
$r = new Religion();
$r->Id = $_GET['id'];
if($r->Delete()){
	$msg.="Delete successful.";
	}
	else{
	$msg.=$r->Err;
	}
	Redirect("?a=religion&msg={$msg}");
?>