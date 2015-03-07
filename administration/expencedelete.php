<?php
$msg="";
$expence = new Expence();
$expence->Id = $_GET['id'];
if($expence->Delete()){
	$msg.="Delete successful.";
	}
	else{
	$msg.=$expence->Err;	
	}
	Redirect("?ad=expence&msg={$msg}");
?>