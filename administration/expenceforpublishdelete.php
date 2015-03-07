<?php
$msg="";
$efpt = new ExpenceForPublish();
$efpt->Id = $_GET['id'];
if($efpt->Delete()){
	$msg.="Delete successful.";
	}
	else{
	$msg.=$efpt->Err;	
	}
	Redirect("?ad=expenceforpublish&msg={$msg}");
?>