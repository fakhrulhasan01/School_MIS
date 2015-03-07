<div class="row no-gutter">
<?php
$cmt = new ClassMaterialType();
$msg="";
$err=0;
$eclass="";
if(isset($_POST['sub'])){
	if($_POST['class']==""){
		$err++;
		$eclass.="Please insert a type name.";
	   }
	   else if(strlen($_POST['class'])<3){
	   $err++;
	   $eclass.="Type name must be three character.";
	   }
	   if($err==0){
		$cmt->Name=$_POST['class'];
		if($cmt->Insert()){
		$msg.="Insert successful.";
		}
		else{
		$msg.=$cmt->Err;
		}
		Redirect("?a=classmaterialtype&msg={$msg}");
	   }
	}

?>
<form action="" method="post">
<table width="619" border="0" align="center">

<h1><center>Class Material Type &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  <tr>
    <td width="217">Class Material Type Name</td>
    <td width="201"><input type="text" name="class" /></td>
    <td width="187"><?php mer($eclass);?></td>

  </tr>
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Insert" /></td>
  </tr>
</table>
</form>
<br>
<br>
<br>

<table width="499" border="1">
  <tr>
    <td width="314">Class Material Type name</td>
    <td width="73">Edit</td>
    <td width="90">Delete</td>
  </tr>
 
  <tr>
 <?php 
 $r=$cmt->Select();
 Table($r,"classmaterialtype");
 ?>
  </tr>
  
</table>


</div>