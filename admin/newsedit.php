<div class="row no-gutter">

<?php 
$n = new News();
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
		$n->Id = $_POST['id']; 
		$n->SelectById();
		 if(($_FILES['pic']['name'] != "") &&  
								     (($_FILES['pic']['type'] == "image/jpg") ||
									 ($_FILES['pic']['type'] == "image/jpeg") ||
									 ($_FILES['pic']['type'] == "image/png") ||
									 ($_FILES['pic']['type'] == "image/gif"))) {
					if($n->Picture != "")
					{
						$bpp = "images/" . $n->Picture;
						unlink($bpp);
					}
					$n->Picture = UploadPicture($_FILES['pic']);
				}
				
				$des = "files/" . $n->Description;
				unlink($des);
		   
		   
		$n->HeadLine = $_POST['hl'];
		$n->Description = CreateFile($_POST['des']);
		//$ps->Picture = UploadPicture($_FILES['pic']);
		
		if($n->Update()){
		$msg.="Update successful.";
		}
		else{
		$msg.=$n->Err;
		}
		Redirect("?a=news&msg={$msg}");
	   }
	}


$n->Id = $_GET['id'];
$n->SelectById();
?>



<center><h1>
News
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
    <td width="375"><input type="text" name="hl" value="<?php echo $n->HeadLine;?>" /></td>
    <td width="321"><?php mer($eheadline);?></td>
  </tr>
  <tr>
    <td>Description</td>
    <td>
    <textarea name="des" rows="10" cols="40">
	<?php FileRead("files/" . $n->Description);?></textarea></td>
    <td><?php mer($edescription);?></td>
  </tr>
  <tr>
    <td>Picture</td>
    <td>
    <img src="images/<?php echo $n->Picture;?>" height="150" width="200" />
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



