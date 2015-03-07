<?php
$msg="";
$expence = new ExpenceForGardiantArrangement();
$expence->Id = $_GET['id'];
if($expence->Delete()){
	$msg.="Delete successful.";
	}
	else{
	$msg.=$expence->Err;	
	}
	Redirect("?ad=expenceforgardiantarrangement&msg={$msg}");
?>