<?php
$msg="";
$pp = new PayOrPaidAmountType();
$pp->Id = $_GET['id'];
if($pp->Delete()){
	$msg.="Delete successful.";
	}
	else{
	$msg.=$tai->Err;	
	}
	Redirect("?ad=payorpaidamounttype&msg={$msg}");
?>