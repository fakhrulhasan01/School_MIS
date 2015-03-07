<div class="row no-gutter">
<?php
$cl = new Classs();
$msg="";
$err=0;
$eclass="";
if(isset($_POST['sub'])){
	if($_POST['class']==""){
		$err++;
		$eclass.="Please insert a class name.";
	   }
	   else if(strlen($_POST['class'])<3){
	   $err++;
	   $eclass.="class name must be three character.";
	   }
	   if($err==0){
		$cl->Name=$_POST['class'];
		if($cl->Insert()){
		$msg.="Insert successful.";
		}
		else{
		$msg.=$cl->Err;
		}
		Redirect("?a=class&msg={$msg}");
	   }
	}

?>
<form action="" method="post">
<table width="619" border="0" align="center">

<h1><center>Class &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  <tr>
    <td width="111">Class Name</td>
    <td width="210"><input type="text" name="class" /></td>
    <td width="284"><?php mer($eclass);?></td>

  </tr>
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Insert" /></td>
  </tr>
</table>
</form>

<table width="254" border="1">
  <tr>
    <td width="95">Class name</td>
    <td width="81">Edit</td>
    <td width="56">Delete</td>
  </tr>
 
  <tr>
 <?php 
 $r=$cl->Select();
 Table($r,"classs");
 ?>
  </tr>
  
</table>


</div>