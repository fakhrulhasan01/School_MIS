<div class="main_body">
<?php
$pty = new PhotoType();
$msg="";
$err=0;
$etype="";

if(isset($_POST['sub'])){
	
	if($_POST['type']==""){
		$err++;
		$etype.="Please insert a class name.";
	   }
	   else if(strlen($_POST['type'])<3){
	   $err++;
	   $etype.="Type name must be three character.";
	   }
	   if($err==0){
		   
		$pty->Name=$_POST['type'];
		if($pty->Insert()){
		$msg.="Insert successful.";
		}
		else{
		$msg.=$pty->Err;
		}
		Redirect("?a=phototype&msg={$msg}");
	   }
	}
	echo $err;

?>
<form action="" method="post">
<table width="619" border="0" align="center">

<h1><center>PhotoType &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  <tr>
    <td width="176">PhotoType Name</td>
    <td width="188"><input type="text" name="type" /></td>
    <td width="241"><?php mer($etype);?></td>

  </tr>
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Insert" /></td>
  </tr>
</table>
</form>

<table width="373" border="1">
  <tr>
    <td width="152">PhotoType name</td>
    <td width="87">Edit</td>
    <td width="112">Delete</td>
  </tr>
 
  <tr>
 <?php 
 $r=$pty->Select();
 Table($r,"phototype");
 ?>
  </tr>
  
</table>


</div>