<?php
$msg="";
$ty = new AcademicCalenderType();
$ty->Id=$_GET['id'];
if($ty->Delete()){
	$msg ="Delete successful.";
	}
	else{
	$msg =$ty->Err;	
	}
	Redirect("?a=academiccalendertype&msg={$msg}");
?>