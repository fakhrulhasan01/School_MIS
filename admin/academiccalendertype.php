<div class="main_body">
<?php
$ty = new AcademicCalenderType();
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
		$ty->Name=$_POST['type'];
		if($ty->Insert()){
		$msg.="Insert successful.";
		}
		else{
		$msg.=$ty->Err;
		}
		Redirect("?a=academiccalendertype&msg={$msg}");
	   }
	}
	echo $err;

?>
<form action="" method="post">
<table width="619" border="0" align="center">

<h1><center>Type &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  <tr>
    <td width="111">Type Name</td>
    <td width="210"><input type="text" name="type" /></td>
    <td width="284"><?php mer($etype);?></td>

  </tr>
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Insert" /></td>
  </tr>
</table>
</form>

<table width="254" border="1">
  <tr>
    <td width="95">Type name</td>
    <td width="81">Edit</td>
    <td width="56">Delete</td>
  </tr>
 
  <tr>
 <?php 
 $r=$ty->Select();
 Table($r,"academiccalendertype");
 ?>
  </tr>
  
</table>


</div>