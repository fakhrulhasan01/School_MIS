<div class="row no-gutter">
<?php
$cmt = new ClassMaterialType();
$msg="";
$err=0;
$eclass="";
if(isset($_POST['sub'])){
	if($_POST['class']==""){
		$err++;
		$eclass.="Please insert a type name.";
	   }
	   else if(strlen($_POST['class'])<3){
	   $err++;
	   $eclass.="Type name must be three character.";
	   }
	   if($err==0){
		$cmt->Id = $_POST['id'];   
		$cmt->Name=$_POST['class'];
		if($cmt->Update()){
		$msg.="Update successful.";
		}
		else{
		$msg.=$cmt->Err;
		}
		Redirect("?a=classmaterialtype&msg={$msg}");
	   }
	}
	
	$cmt->Id = $_GET['id'];
	$cmt->SelectById();

?>
<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
<table width="619" border="0" align="center">

<h1><center>Class Material Type &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  <tr>
    <td width="217">Class Material Type Name</td>
    <td width="201"><input type="text" name="class" value="<?php echo $cmt->Name;?>" /></td>
    <td width="187"><?php mer($eclass);?></td>

  </tr>
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Update" /></td>
  </tr>
</table>
</form>


</div>