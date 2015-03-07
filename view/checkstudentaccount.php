<?php
$msg = "";
$st = new Student();
$st->StudentId = $_POST['studentid'];
$st->Password = $_POST['password'];
if($st->Login()){
	$_SESSION['stid'] = $st->StudentId;
   	Redirect("?s=studentdetails&msg=Loging Successful#log");
	echo $_SESSION['stid'];
    }
	else{		
	Redirect("?v=account&msg=User Id or password error&st#log");
}
?>