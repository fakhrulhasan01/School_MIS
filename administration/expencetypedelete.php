<?php
$msg="";
$expencetype = new ExpenceType();
$expencetype->Id = $_GET['id'];
if($expencetype->Delete()){
	$msg.="Delete successful.";
	}
	else{
	$msg.=$expencetype->Err;	
	}
	Redirect("?ad=expencetype&msg={$msg}");
?>