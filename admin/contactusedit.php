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
		$cu->Id = $_POST['id'];   
		$des = "files/" . $cu->Description;
				unlink($des);
		$cu->Description = CreateFile($_POST['des']);
		if($cu->Update()){
		$msg.="Update successful.";
		}
		else{
		$msg.=$cu->Err;
		}
		Redirect("?a=contactus&msg={$msg}");
	   }
	}
	
	$cu->Id = $_GET['id'];
	$cu->SelectById();

?>
<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $_GET['id']?>" />
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
    <td width="210">
    <textarea name="des" cols="50" rows="20">
	<?php FileRead("files/".$cu->Description);?></textarea></td>
    <td width="284"><?php mer($edescription);?></td>

  </tr>
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Update" /></td>
  </tr>
</table>
</form>


</div>