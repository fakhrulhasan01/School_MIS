<?php 
$msg="";
$iq = new Iqtest();
$iq->Id = $_GET['id'];
if($iq->Delete()){
	$msg.="Delete successful.";
	}
	else{
	$msg.=$iq->Err;	
	}
	Redirect("?t=iqtest&msg={$msg}");
?>