<?php
$msg="";
$earntype = new EarnType();
$earntype->Id = $_GET['id'];
if($earntype->Delete()){
	$msg.="Delete successful.";
	}
	else{
	$msg.=$earntype->Err;	
	}
	Redirect("?ad=earntype&msg={$msg}");
?>