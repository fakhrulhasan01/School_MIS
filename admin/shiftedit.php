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
		$s->Id = $_POST['id'];   
		$s->Name=$_POST['shift'];
		if($s->Update()){
		$msg.="Update successful.";
		}
		else{
		$msg.=$s->Err;
		}
		Redirect("?a=shift&msg={$msg}");
	   }
	}
$s->Id = $_GET['id'];
$s->SelectById();

?>
<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
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
    <td width="210"><input type="text" name="shift" value="<?php echo $s->Name;?>" /></td>
    <td width="284"><?php mer($eshift);?></td>

  </tr>
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Update" /></td>
  </tr>
</table>
</form>


</div>