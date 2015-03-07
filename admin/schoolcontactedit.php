<div class="row no-gutter">
<?php
$sc = new SchoolContact();
$msg="";
$err=0;
$ename="";

if(isset($_POST['sub'])){
	
	if($_POST['name']==""){
		$err++;
		$ename.="Please insert a school name.";
	   }
	   else if(strlen($_POST['name'])<3){
	   $err++;
	   $ename.="Name must be three character.";
	   }
	   
	   
	  
	  echo $err;
	  
	  if($err==0){
		
		$sc->Id = $_POST['id'];   
		$des = "files/" . $sc->Description;
				unlink($des);
		$sc->Name = $_POST['name'];
		$sc->Description = CreateFile($_POST['des']);
		$sc->Telephone = $_POST['tel'];
		$sc->Mobile = $_POST['mob'];
		$sc->Fax = $_POST['fax'];
		
		if($sc->Update()){
		$msg.="Update successful.";
		}
		else{
		$msg.=$sc->Err;
		}
		Redirect("?a=schoolcontact&msg={$msg}");
	   }
	}

$sc->Id = $_GET['id'];
$sc->SelectById();
?>
<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
<table width="619" border="0" align="center">

<h1><center>School Contact &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  
  <tr>
    <td width="111">Name</td>
    <td width="210"><input type="text" name="name" value="<?php echo $sc->Name;?>" /></td>
    <td width="284"><?php mer($ename);?></td>
  </tr>
  <tr>
    <td width="111">Address</td>
    <td width="210"><textarea name="des">
	<?php FileRead("files/".$sc->Description);?></textarea></td>
    <td width="284"></td>
  </tr>
    <tr>
    <td width="111">Telephone</td>
    <td width="210"><input type="text" name="tel" value="<?php echo $sc->Telephone;?>" /></td>
    <td width="284"></td>
  </tr>
    <tr>
    <td width="111">Mobile</td>
    <td width="210"><input type="text" name="mob" value="<?php echo $sc->Mobile;?>" /></td>
    <td width="284"></td>
  </tr>
    <tr>
    <td width="111">Fax</td>
    <td width="210"><input type="text" name="fax" value="<?php echo $sc->Fax;?>" /></td>
    <td width="284"></td>
  </tr>
  
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Update" /></td>
  </tr>
</table>
</form>



</div>