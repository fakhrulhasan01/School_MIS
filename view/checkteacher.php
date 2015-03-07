<?php
$msg = "";
$tc = new Teacher();
$tc->TeacherId = $_POST['teacherid'];
$tc->Password = $_POST['password'];
if($tc->Login()){
	$_SESSION['tcid'] = $tc->TeacherId;
	
   	Redirect("?v=home&msg=Loging Successful");
    }
	else{		
	Redirect("?v=home&msg=User name or password error");
}
?>