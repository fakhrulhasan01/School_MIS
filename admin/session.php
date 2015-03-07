<div class="main_body">
<?php
$se = new Session();
$msg="";
$err=0;
$esession="";
if(isset($_POST['sub'])){
	if($_POST['session']==""){
		$err++;
		$esession.="Please insert a session name.";
	   }
	   else if(strlen($_POST['session'])<3){
	   $err++;
	   $esession.="session name must be three character.";
	   }
	   if($err==0){
		$se->Name=$_POST['session'];
		if($se->Insert()){
		$msg.="Insert successful.";
		}
		else{
		$msg.=$se->Err;
		}
		Redirect("?a=session&msg={$msg}");
	   }
	}

?>
<form action="" method="post">
<table width="619" border="0" align="center">

<h1><center>Session &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  <tr>
    <td width="111">Session Name</td>
    <td width="210"><input type="text" name="session" /></td>
    <td width="284"><?php mer($esession);?></td>

  </tr>
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Insert" /></td>
  </tr>
</table>
</form>

<table width="246" border="1">
  <tr>
    <td width="137">Session name</td>
    <td width="52">Edit</td>
    <td width="35">Delete</td>
  </tr>
 
  <tr>
 <?php 
 $r=$se->Select();
 Table($r,session);
 ?>
  </tr>
  
</table>


</div>