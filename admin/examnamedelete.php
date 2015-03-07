<?php
$msg="";
$ex = new ExamName();
$ex->Id=$_GET['id'];
if($ex->Delete()){
	$msg ="Delete successful.";
	}
	else{
	$msg =$ex->Err;	
	}
	Redirect("?a=examname&msg={$msg}");
?>