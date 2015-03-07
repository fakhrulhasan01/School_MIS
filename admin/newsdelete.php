<?php
$msg="";
$n = new News();
$n->Id=$_GET['id'];
if($n->Delete()){
	$msg ="Delete successful.";
	}
	else{
	$msg =$n->Err;	
	}
	Redirect("?a=news&msg={$msg}");
?>