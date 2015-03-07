<?php 
$msg="";
$g = new GardianMember();
$g->Id = $_GET['id'];
if($g->Delete()){
	$msg.="Delete successful.";
	}
	else{
	$msg.=$g->Err;
	}
	Redirect("?a=gardianmember&msg={$msg}");
?>