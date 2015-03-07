<?php 
$msg="";
$sq = new SubjectQuestion();
$sq->Id = $_GET['id'];
if($sq->Delete()){
	$msg.="Delete successful.";
	}
	else{
	$msg.=$sq->Err;	
	}
	Redirect("?t=subjectquestion&msg={$msg}");
?>