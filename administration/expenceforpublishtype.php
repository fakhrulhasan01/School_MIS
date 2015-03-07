<div class="row no-gutter">
<?php
$efpt = new ExpenceForPublishType();
$msg="";
$err=0;
$ename="";
if(isset($_POST['sub'])){
	if($_POST['name']==""){
		$err++;
		$ename.="Please insert a  name.";
	   }
	   else if(strlen($_POST['name'])<3){
	   $err++;
	   $ename.="Name must be three character.";
	   }
	   
	   if($err==0){
		$efpt->Name=$_POST['name'];
		if($efpt->Insert()){
		$msg.="Insert successful.";
		}
		else{
		$msg.=$efpt->Err;
		}
		Redirect("?ad=expenceforpublishtype&msg={$msg}");
	   }
	}

?>
<form action="" method="post">
<table width="80%" border="0" align="center">

<h1><center>Expence For Publish Type &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  <tr>
    <td width="111">Expence For Publish Type</td>
    <td width="210"><input type="text" name="name" /></td>
    <td width="284"><?php mer($ename);?></td>

  </tr>
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Insert" /></td>
  </tr>
</table>
</form>

<table width="80%" border="1" align="center">
  <tr>
    <td width="95">Expence For Publish Type</td>
    <td width="81">Edit</td>
    <td width="56">Delete</td>
  </tr>
 
  <tr>
 <?php 
 $r=$efpt->Select();
 Table($r,"expenceforpublishtype");
 ?>
  </tr>
  
</table>


</div>