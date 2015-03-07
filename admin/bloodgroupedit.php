<div class="row no-gutter">
<?php
$b = new BloodGroup();
$msg="";
$err=0;
$ebloodgroup="";
if(isset($_POST['sub'])){
	if($_POST['bloodgroup']==""){
		$err++;
		$ebloodgroup.="Please insert a bloodgroup name.";
	   }
	   else if(strlen($_POST['bloodgroup'])<2){
	   $err++;
	   $ebloodgroup.="Bloodgroup name must be three character.";
	   }
	   
	   if($err==0){
		$b->Id = $_POST['id'];
		$b->Name=$_POST['bloodgroup'];
		if($b->Update()){
		$msg.="Update successful.";
		}
		else{
		$msg.=$b->Err;
		}
		Redirect("?a=bloodgroup&msg={$msg}");
	   }
	}
$b->Id = $_GET['id'];
$b->SelectById();
?>
<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
<table width="50%" border="0" align="center">

<h1><center>Blood Group &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  <tr>
    <td width="111">Blood Group Name</td>
    <td width="210"><input type="text" name="bloodgroup" value="<?php echo $b->Name;?>" /></td>
    <td width="284"><?php mer($ebloodgroup);?></td>

  </tr>
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Update" /></td>
  </tr>
</table>
</form>



</div>