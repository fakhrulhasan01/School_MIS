<?php
$msg="";
$hw = new HomeWelcome();
$hw->Id=$_GET['id'];
if($hw->Delete()){
	$msg ="Delete successful.";
	}
	else{
	$msg =$hw->Err;	
	}
	Redirect("?a=homewelcome&msg={$msg}");
?>