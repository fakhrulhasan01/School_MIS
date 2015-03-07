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
		$ex->Name=$_POST['exam'];
		if($ex->Insert()){
		$msg.="Insert successful.";
		}
		else{
		$msg.=$ex->Err;
		}
		Redirect("?a=examname&msg={$msg}");
	   }
	}

?>
<form action="" method="post">
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
    <td width="210"><input type="text" name="exam" /></td>
    <td width="284"><?php mer($eexamname);?></td>

  </tr>
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Insert" /></td>
  </tr>
</table>
</form>

<table width="547" border="1">
  <tr>
    <td width="359">Exam Name</td>
    <td width="77">Edit</td>
    <td width="89">Delete</td>
  </tr>
 
  <tr>
 <?php 
 $r=$ex->Select();
 Table($r,"examname");
 ?>
  </tr>
  
</table>


</div>