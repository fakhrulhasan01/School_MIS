<div class="row no-gutter">
<?php
$cl = new Classs();
$msg="";
$err=0;
$eclass="";
if(isset($_POST['sub'])){
	if($_POST['class']==""){
		$err++;
		$eclass.="Please insert a class name.";
	   }
	   else if(strlen($_POST['class'])<3){
	   $err++;
	   $eclass.="class name must be three character.";
	   }
	   if($err==0){
		$cl->Id=$_POST['id'];
		$cl->Name=$_POST['class'];
		if($cl->Update()){
		$msg.="Update successful.";
		}
		else{
		$msg.=$cl->Err;
		}
		Redirect("?a=class&msg={$msg}");
	   }
	}
	$cl->Id=$_GET['id'];
	$cl->SelectById();

?>
<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
<table width="619" border="0" align="center">
<h1><center>Class Edit</center></h1>
  <tr>
    <td width="111">Class Name</td>
    <td width="210"><input type="text" name="class" value="<?php echo $cl->Name;?>" /></td>
    <td width="284"><?php mer($eclass);?></td>

  </tr>
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Update" /></td>
  </tr>
</table>
</form>

</div>