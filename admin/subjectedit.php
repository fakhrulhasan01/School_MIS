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
		$s->Id = $_POST['id'];   
		$s->Name=$_POST['subject'];
		if($s->Update()){
		$msg.="Update successful.";
		}
		else{
		$msg.=$s->Err;
		}
		Redirect("?a=Subject&msg={$msg}");
	   }
	}
$s->Id = $_GET['id'];
$s->SelectById();

?>
<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
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
    <td width="210"><input type="text" name="subject" value="<?php echo $s->Name;?>" /></td>
    <td width="284"><?php mer($esubject);?></td>

  </tr>
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Update" /></td>
  </tr>
</table>
</form>


</div>