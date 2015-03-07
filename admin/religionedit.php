<div class="row no-gutter">
<?php
$r = new Religion();
$msg="";
$err=0;
$ereligion="";
if(isset($_POST['sub'])){
	if($_POST['religion']==""){
		$err++;
		$ereligion.="Please insert a religion name.";
	   }
	   else if(strlen($_POST['religion'])<3){
	   $err++;
	   $ereligion.="religion name must be three character.";
	   }
	   
	   if($err==0){
		$r->Id = $_POST['id'];   
		$r->Name=$_POST['religion'];
		if($r->Update()){
		$msg.="Update successful.";
		}
		else{
		$msg.=$r->Err;
		}
		Redirect("?a=religion&msg={$msg}");
	   }
	}
$r->Id = $_GET['id'];
$r->SelectById();
?>
<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
<table width="50%" border="0" align="center">

<h1><center>Religion &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  <tr>
    <td width="111">Religion Name</td>
    <td width="210"><input type="text" name="religion" value="<?php echo $r->Name;?>" /></td>
    <td width="284"><?php mer($ereligion);?></td>

  </tr>
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Update" /></td>
  </tr>
</table>
</form>




</div>