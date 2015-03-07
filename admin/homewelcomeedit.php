<div class="main_body">
<?php
$hw = new HomeWelcome();
$msg="";
$err=0;
$ename="";
if(isset($_POST['sub'])){
	if($_POST['name']==""){
		$err++;
		$ename.="Please insert a Description name.";
	   }
	   else if(strlen($_POST['name'])<3){
	   $err++;
	   $ename.="Description name must be three character.";
	   }
	   if($err==0){
		$hw->Id = $_POST['id'];
		$hw->Name = CreateFile($_POST['name']);
		$hw->Type = $_POST['type'];
		if($hw->Update()){
		$msg.="Update successful.";
		}
		else{
		$msg.=$hw->Err;
		}
		Redirect("?a=homewelcome&msg={$msg}");
	   }
	}
$hw->Id = $_GET['id'];
$hw->SelectById();

?>
<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
<table width="619" border="0" align="center">

<h1><center>Welcome &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  <tr>
    <td width="139">Welcome Message</td>
    <td width="266"><textarea name="name"><?php FileRead("files/" .$hw->Name);?></textarea></td>
    <td width="200"><?php mer($ename);?></td>
  </tr>
  
  <tr>
    <td width="139">Select Type</td>
    <td width="266">
    <?php 
	if($hw->Type=="hw"){
	?>
    <input type="radio" name="type" checked="checked" value="hw" />HomeWelcome
    <input type="radio" name="type" value="w" />Why Staudy In (BISC)
    <?php }else{?>
    <input type="radio" name="type" value="hw" />HomeWelcome
    <input type="radio" name="type" checked="checked" value="w" />Why Staudy In (BISC)
    <?php }?>
    </td>
    <td width="200"><?php mer($etype);?></td>
  </tr>
  
  <tr>
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Update" /></td>
  </tr>
</table>
</form>


</div>