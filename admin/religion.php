<div class="row no-gutter">
<?php
$r = new Religion();
$msg="";
$err=0;
$ereligion="";
if(isset($_POST['sub'])){
	if($_POST['religion']==""){
		$err++;
		$ereligion.="Please insert a religion name.";
	   }
	   else if(strlen($_POST['religion'])<3){
	   $err++;
	   $ereligion.="religion name must be three character.";
	   }
	   
	   if($err==0){
		$r->Name=$_POST['religion'];
		if($r->Insert()){
		$msg.="Insert successful.";
		}
		else{
		$msg.=$r->Err;
		}
		Redirect("?a=religion&msg={$msg}");
	   }
	}

?>
<form action="" method="post">
<table width="50%" border="0" align="center">

<h1><center>Religion &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  <tr>
    <td width="111">Religion Name</td>
    <td width="210"><input type="text" name="religion" /></td>
    <td width="284"><?php mer($ereligion);?></td>

  </tr>
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Insert" /></td>
  </tr>
</table>
</form>

<table width="50%" border="1" align="center">
  <tr>
    <td width="95">Religion name</td>
    <td width="81">Edit</td>
    <td width="56">Delete</td>
  </tr>
 
  <tr>
 <?php 
 $rr=$r->Select();
 Table($rr,"religion");
 ?>
  </tr>
  
</table>


</div>