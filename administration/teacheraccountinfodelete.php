<?php
$msg="";
$tai = new TeacherAccountInfo();
$tai->Id = $_GET['id'];
if($tai->Delete()){
	$msg.="Delete successful.";
	}
	else{
	$msg.=$tai->Err;	
	}
	Redirect("?ad=teacheraccountinfo&msg={$msg}");
?>