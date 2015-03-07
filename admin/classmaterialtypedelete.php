<?php
$msg="";
$cmt = new ClassMaterialType();
$cmt->Id = $_GET['id'];
if($cmt->Delete()){
	$msg.="Delete successfull.";
	}
	else{
		$msg.=$cmt->Err;
		}
		Redirect("?a=classmaterialtype&msg={$msg}");
?>