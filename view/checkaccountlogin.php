<?php
include_once("DAL/DbConnect.php");
$sql = "select * from accountlogin
					where userid = '".$_POST['userid']."'
					and password = '".$_POST['password']."'";
					
					//echo $sql;


$sql = mysql_query($sql);

if(mysql_num_rows($sql) !=""){
	while($a = mysql_fetch_row($sql)){
		$_SESSION['acid'] = $a[0];
		Redirect("?v=home&msg=Loging Successful#adlog");
	}
}else{
	Redirect("?v=home&msg=User name or password error&tc#adlog");
}


?>