<?php 
$msg="";
$s = new Student();
$s->Id = $_GET['id'];
if($s->Delete()){
	$msg.="Delete successful.";
	}
	else{
	$msg.=$s->Err;
	}
	Redirect("?a=student&msg={$msg}");
?>