<?php
$msg="";
$s = new Shift();
$s->Id=$_GET['id'];
if($s->Delete()){
	$msg ="Delete successful.";
	}
	else{
	$msg =$s->Err;	
	}
	Redirect("?a=shift&msg={$msg}");
?>