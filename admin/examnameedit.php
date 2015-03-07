<div class="row no-gutter">
<?php
$ex = new ExamName();
$msg="";
$err=0;
$eexamname="";
if(isset($_POST['sub'])){
	if($_POST['exam']==""){
		$err++;
		$eexamname.="Please insert a exam name.";
	   }
	   else if(strlen($_POST['exam'])<3){
	   $err++;
	   $eexamname.="Exam name must be three character.";
	   }
	   
	   if($err==0){
		$ex->Id = $_POST['id'];   
		$ex->Name=$_POST['exam'];
		if($ex->Update()){
		$msg.="Update successful.";
		}
		else{
		$msg.=$ex->Err;
		}
		Redirect("?a=examname&msg={$msg}");
	   }
	}
	
	$ex->Id = $_GET['id'];
	$ex->SelectById();

?>
<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
<table width="619" border="0" align="center">

<h1><center>Exan Name &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  <tr>
    <td width="111">Exam Name</td>
    <td width="210"><input type="text" name="exam" value="<?php echo $ex->Name;?>" /></td>
    <td width="284"><?php mer($eexamname);?></td>

  </tr>
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Update" /></td>
  </tr>
</table>
</form>


</div>