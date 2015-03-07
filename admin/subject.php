<div class="row no-gutter">
<?php
$s = new Subject();
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
		$s->Name=$_POST['subject'];
		if($s->Insert()){
		$msg.="Insert successful.";
		}
		else{
		$msg.=$s->Err;
		}
		Redirect("?a=Subject&msg={$msg}");
	   }
	}

?>
<form action="" method="post">
<table width="619" border="0" align="center">

<h1><center>Subject Name &nbsp; &nbsp;
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

<table width="547" border="1">
  <tr>
    <td width="359">subject Name</td>
    <td width="77">Edit</td>
    <td width="89">Delete</td>
  </tr>
 
  <tr>
 <?php 
 $r=$s->Select();
 Table($r,"subject");
 ?>
  </tr>
  
</table>


</div>