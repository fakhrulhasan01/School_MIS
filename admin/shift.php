<div class="row no-gutter">
<?php
$s = new Shift();
$msg="";
$err=0;
$eshift="";
if(isset($_POST['sub'])){
	if($_POST['shift']==""){
		$err++;
		$eshift.="Please insert a shift name.";
	   }
	   else if(strlen($_POST['shift'])<3){
	   $err++;
	   $eshift.="Shift name must be three character.";
	   }
	   
	   if($err==0){
		$s->Name=$_POST['shift'];
		if($s->Insert()){
		$msg.="Insert successful.";
		}
		else{
		$msg.=$s->Err;
		}
		Redirect("?a=shift&msg={$msg}");
	   }
	}

?>
<form action="" method="post">
<table width="619" border="0" align="center">

<h1><center>Shift &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  <tr>
    <td width="111">Shift Name</td>
    <td width="210"><input type="text" name="shift" /></td>
    <td width="284"><?php mer($eshift);?></td>

  </tr>
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Insert" /></td>
  </tr>
</table>
</form>

<table width="254" border="1">
  <tr>
    <td width="95">Shift Name</td>
    <td width="81">Edit</td>
    <td width="56">Delete</td>
  </tr>
 
  <tr>
 <?php 
 $r=$s->Select();
 Table($r,"shift");
 ?>
  </tr>
  
</table>


</div>