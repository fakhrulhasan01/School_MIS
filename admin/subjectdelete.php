<?php
$msg="";
$s = new Subject();
$s->Id=$_GET['id'];
if($s->Delete()){
	$msg ="Delete successful.";
	}
	else{
	$msg =$s->Err;	
	}
	Redirect("?a=subject&msg={$msg}");
?>