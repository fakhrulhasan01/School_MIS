<div class="row no-gutter">
<?php
$cu = new ContactUs();
$msg="";
$err=0;
$edescription="";
if(isset($_POST['sub'])){
	if($_POST['des']==""){
		$err++;
		$edescription.="Please insert a description.";
	   }
	   else if(strlen($_POST['des'])<3){
	   $err++;
	   $edescription.="Description name must be three character.";
	   }
	   if($err==0){
		$cu->Description = CreateFile($_POST['des']);
		if($cu->Insert()){
		$msg.="Insert successful.";
		}
		else{
		$msg.=$cu->Err;
		}
		Redirect("?a=contactus&msg={$msg}");
	   }
	}

?>
<form action="" method="post" enctype="multipart/form-data">
<table width="619" border="0" align="center">

<h1><center>Contact Us &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  <tr>
    <td width="111">Description</td>
    <td width="210"><input type="text" name="des" /></td>
    <td width="284"><?php mer($edescription);?></td>

  </tr>
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Insert" /></td>
  </tr>
</table>
</form>
<br />
<br />
<br />
<br />

<table width="643" border="1" align="center">
  <tr>
    <td width="504">Description</td>
    <td width="55">Edit</td>
    <td width="62">Delete</td>
  </tr>
 
  <tr>
 <?php 
 $r=$cu->Select();
 Table($r,"contactus");
 ?>
  </tr>
  
</table>


</div>