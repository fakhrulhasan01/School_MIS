<div class="row no-gutter">
<?php
$efgat = new ExpenceForGardiantArrangementType();
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
		$efgat->Id = $_POST['id'];   
		$efgat->Name=$_POST['name'];
		if($efgat->Update()){
		$msg.="Update successful.";
		}
		else{
		$msg.=$efgat->Err;
		}
		Redirect("?ad=expenceforgardiantarrangementtype&msg={$msg}");
	   }
	}
	$efgat->Id = $_GET['id'];
	$efgat->SelectById();

?>
<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
<table width="80%" border="0" align="center">

<h1><center>Expence For Gardiant Arrangement Type &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  <tr>
    <td width="111">Expence For Gardiant Arrangement Type</td>
    <td width="210"><input type="text" name="name" value="<?php echo $efgat->Name;?>" /></td>
    <td width="284"><?php mer($ename);?></td>

  </tr>
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Update" /></td>
  </tr>
</table>
</form>



</div>