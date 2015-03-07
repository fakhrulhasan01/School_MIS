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
		$se->Id = $_POST['id']; 
		$se->Name = $_POST['session'];
		if($se->Update()){
		$msg.="Update successful.";
		}
		else{
		$msg.=$se->Err;
		}
		Redirect("?a=session&msg={$msg}");
	   }
	}
	$se->Id = $_GET['id'];
	$se->SelectById();

?>
<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
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
    <td width="210"><input type="text" name="session" value="<?php echo $se->Name;?>" /></td>
    <td width="284"><?php mer($esession);?></td>

  </tr>
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Insert" /></td>
  </tr>
</table>
</form>

</div>