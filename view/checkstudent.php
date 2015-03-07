<?php
$msg = "";
$st = new Student();
$st->StudentId = $_POST['studentid'];
$st->Password = $_POST['password'];
if($st->Login()){
	$_SESSION['stid'] = $st->StudentId;
   	Redirect("?v=home&msg=Loging Successful");
    }
	else{		
	Redirect("?v=studentlogin&msg=User Id or password error");
}
?>