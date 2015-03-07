<div class="main_body">
<?php
$ty = new AcademicCalenderType();
$msg="";
$err=0;
$etype="";

if(isset($_POST['sub'])){
	
	if($_POST['type']==""){
		$err++;
		$etype.="Please insert a class name.";
	   }
	   else if(strlen($_POST['type'])<3){
	   $err++;
	   $etype.="Type name must be three character.";
	   }
	   if($err==0){
		$ty->Id = $_POST['id'];   
		$ty->Name=$_POST['type'];
		if($ty->Update()){
		$msg.="Update successful.";
		}
		else{
		$msg.=$ty->Err;
		}
		Redirect("?a=academiccalendertype&msg={$msg}");
	   }
	}
	
	$ty->Id = $_GET['id'];
	$ty->SelectById();

?>
<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
<table width="619" border="0" align="center">

<h1><center>Academic Calender Type &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  <tr>
    <td width="111">Type Name</td>
    <td width="210"><input type="text" name="type" value="<?php echo $ty->Name;?>" /></td>
    <td width="284"><?php mer($etype);?></td>

  </tr>
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Update" /></td>
  </tr>
</table>
</form>



</div>