<?php
$msg="";
$sc = new SchoolContact();
$sc->Id=$_GET['id'];
if($sc->Delete()){
	$msg ="Delete successful.";
	}
	else{
	$msg =$sc->Err;	
	}
	Redirect("?a=schoolcontact&msg={$msg}");
?>