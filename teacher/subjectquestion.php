<div class="main_body">
<?php
$sq = new SubjectQuestion();
$msg="";
$err=0;
$esubject="";


if(isset($_POST['sub'])){
	if($_POST['subject']==""){
		$err++;
		$esubject.="Please insert a subject name.";
	   }
	   else if(strlen($_POST['subject'])<3){
	   $err++;
	   $esubject.="Subject name must be three character.";
	   }
	   if($err==0){
		$sq->SubjectName=$_POST['subject'];
		if($sq->Insert()){
		$msg.="Insert successful.";
		}
		else{
		$msg.=$sq->Err;
		}
		Redirect("?t=subjectquestion&msg={$msg}");
	   }
	}
echo $err;
?>
<form action="" method="post">
<table width="619" border="0" align="center">

<h1><center>subject &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  <tr>
    <td width="111">Subject Name</td>
    <td width="210"><input type="text" name="subject" /></td>
    <td width="284"><?php mer($esubject);?></td>

  </tr>
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Insert" /></td>
  </tr>
</table>
</form>

<table width="325" border="1">
  <tr>
    <td width="152">Subject Name</td>
    <td width="81">Edit</td>
    <td width="70">Delete</td>
  </tr>
 
  <tr>
 <?php 
 $r=$sq->Select();
 Table($r,subjectquestion);
 ?>
  </tr>
  
</table>


</div>