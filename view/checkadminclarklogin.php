<?php
include_once("DAL/DbConnect.php");
$sql = "select * from adminclarklogin
					where userid = '".$_POST['userid']."'
					and password = '".$_POST['password']."'";
					
					echo $sql;


$sql = mysql_query($sql);

if(mysql_num_rows($sql) !=""){
	while($a = mysql_fetch_row($sql)){
		$_SESSION['adcid'] = $a[0];
		Redirect("?ad=adminclark&msg=Loging Successful#adlog");
	}
}else{
	Redirect("?ad=adminclark&msg=User name or password error&tc#adlog");
}


?>