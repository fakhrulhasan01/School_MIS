<div class="row no-gutter">

<?php 
$ps = new PhotoSlider();
$msg="";
$err=0;
$eheadline="";
$edescription="";
$epicture="";


if(isset($_POST['sub'])){
	
	if($_POST['hl']==""){
		$err++;
		$eheadline.="Please insert a picture name.";
	   }
	   else if(strlen($_POST['hl'])<3){
	   $err++;
	   $eheadline.="Picture name must be three character.";
	   }
	   
	   if($_POST['des']==""){
		$err++;
		$edescription.="Please enter description.";
	   }
	   else if(strlen($_POST['des'])<3){
	   $err++;
	   $edescription.="description name must be three character.";
	   }
	
	 /*if($_POST['pic']==""){
		$err++;
		$epicture.="Please insert a picture name.";
	   }
	 */  
	   
	   if($err==0){
		$ps->Id = $_POST['id']; 
		$ps->SelectById();
		 if(($_FILES['pic']['name'] != "") &&  
								     (($_FILES['pic']['type'] == "image/jpg") ||
									 ($_FILES['pic']['type'] == "image/jpeg") ||
									 ($_FILES['pic']['type'] == "image/png") ||
									 ($_FILES['pic']['type'] == "image/gif"))) {
					if($ps->Picture != "")
					{
						$bpp = "images/" . $ps->Picture;
						unlink($bpp);
					}
					$ps->Picture = UploadPicture($_FILES['pic']);
				}
				
				$des = "files/" . $ps->Description;
				unlink($des);
		   
		   
		$ps->HeadLine = $_POST['hl'];
		$ps->Description = CreateFile($_POST['des']);
		//$ps->Picture = UploadPicture($_FILES['pic']);
		
		if($ps->Update()){
		$msg.="Update successful.";
		}
		else{
		$msg.=$ps->Err;
		}
		Redirect("?a=photoslider&msg={$msg}");
	   }
	}


$ps->Id = $_GET['id'];
$ps->SelectById();
?>



<center><h1>
Photo Slider
<?php 
  if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</h1></center>

<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
<table width="850" border="1" align="center">

  <tr>
    <td width="132">Head Line</td>
    <td width="375"><input type="text" name="hl" value="<?php echo $ps->HeadLine;?>" /></td>
    <td width="321"><?php mer($eheadline);?></td>
  </tr>
  <tr>
    <td>Description</td>
    <td>
    <textarea name="des" rows="10" cols="40">
	<?php FileRead("files/" . $ps->Description);?></textarea></td>
    <td><?php mer($edescription);?></td>
  </tr>
  <tr>
    <td>Picture</td>
    <td>
    <img src="images/<?php echo $ps->Picture;?>" height="150" width="200" />
    <input type="file" name="pic" /></td>
    <td><?php mer($epicture);?></td>
  </tr>
  <tr>
    <td><input type="reset" name="reset" value="Reset" /></td>
    <td><input type="submit" name="sub" value="Update" /></td>
    <td>&nbsp;</td>
  </tr>
  
</table>
</form>

</div>



