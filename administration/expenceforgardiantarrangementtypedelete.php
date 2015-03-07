<?php
$msg="";
$efgat = new ExpenceForGardiantArrangementType();
$efgat->Id = $_GET['id'];
if($efgat->Delete()){
	$msg.="Delete successful.";
	}
	else{
	$msg.=$efgat->Err;	
	}
	Redirect("?ad=expenceforgardiantarrangementtype&msg={$msg}");
?>