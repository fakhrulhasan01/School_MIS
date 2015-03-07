<div class="row no-gutter">
<?php
$ab = new AboutUs();
$msg="";
$err=0;
$epicture="";
$edescription="";
$ename="";
if(isset($_POST['sub'])){
	    if($_POST['des']==""){
			$err++;
			$edescription.="Please enter descriotion.";
			}
			else if(strlen($_POST['des'])<5){
				$err++;
				$edescription.="description must be five character.";
				}
		if($_POST['name']==""){
			$err++;
			$ename.="Please enter name.";
			}
			else if(strlen($_POST['name'])<5){
				$err++;
				$ename.="Name must be five character.";
				}
		
		
		echo $err;
	   
	   if($err==0){
		$ab->Id = $_POST['id']; 
		$ab->SelectById();
		 if(($_FILES['pic']['name'] != "") &&  
								     (($_FILES['pic']['type'] == "image/jpg") ||
									 ($_FILES['pic']['type'] == "image/jpeg") ||
									 ($_FILES['pic']['type'] == "image/png") ||
									 ($_FILES['pic']['type'] == "image/gif"))) {
					if($ab->Picture != "")
					{
						$bpp = "images/" . $ab->Picture;
						unlink($bpp);
					}
					$ab->Picture = UploadPicture($_FILES['pic']);
				}
				
				$des = "files/" . $ab->Description;
				unlink($des);
		
		   
		//$ab->Picture = UploadPicture($_FILES['pic']);
		$ab->Description = CreateFile($_POST['des']);
		$ab->Name = $_POST['name'];
		if($ab->Update()){
		$msg.="Update successful.";
		Redirect("?a=aboutus&msg={$msg}");
		}
		else{
		$msg.=$ab->Err;
		}
		
	   }
	}

$ab->Id = $_GET['id'];
$ab->SelectById();
?>
<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
<table width="619" border="1" align="center">

<h1><center>About Us &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  <tr>
    <td width="111">Picture</td>
    <td width="210">
    <img src="images/<?php echo $ab->Picture;?>" width="200" height="200" />
    <input type="file" name="pic" /></td>
    <td width="284"><?php mer($epicture);?></td>

  </tr>
  <tr>
    <td width="111">Name</td>
    <td width="210"><input type="text" name="name" value="<?php echo $ab->Name;?>" /></td>
    <td width="284"><?php mer($epicture);?></td>

  </tr>
  
  <tr>
    <td width="111">Description</td>
    <td width="210"><textarea name="des" rows="10" cols="30">
	<?php FileRead("files/" .$ab->Description);?></textarea></td>
    <td width="284"></td>

  </tr>
  
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Update" /></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>



</div>