<div class="main_body">
<?php
$nty = new NoticType();
$msg="";
$err=0;
$etype="";

if(isset($_POST['sub'])){
	
	if($_POST['type']==""){
		$err++;
		$etype.="Please insert a notic name.";
	   }
	   else if(strlen($_POST['type'])<3){
	   $err++;
	   $etype.="Notic type name must be three character.";
	   }
	   if($err==0){
		   
		$nty->Name=$_POST['type'];
		if($nty->Insert()){
		$msg.="Insert successful.";
		}
		else{
		$msg.=$nty->Err;
		}
		Redirect("?a=notictype&msg={$msg}");
	   }
	}
	echo $err;

?>
<form action="" method="post">
<table width="619" border="0" align="center">

<h1><center>Notic Type &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  <tr>
    <td width="176">Notic Type Name</td>
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
    <td width="152">Notic Type Name</td>
    <td width="87">Edit</td>
    <td width="112">Delete</td>
  </tr>
 
  <tr>
 <?php 
 $r=$nty->Select();
 Table($r,"notictype");
 ?>
  </tr>
  
</table>


</div>