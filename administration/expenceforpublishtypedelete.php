<?php
$msg="";
$efpt = new ExpenceForPublishType();
$efpt->Id = $_GET['id'];
if($efpt->Delete()){
	$msg.="Delete successful.";
	}
	else{
	$msg.=$efpt->Err;	
	}
	Redirect("?ad=expenceforpublishtype&msg={$msg}");
?>