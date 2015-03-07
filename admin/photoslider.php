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
		$ps->HeadLine = $_POST['hl'];
		$ps->Description = CreateFile($_POST['des']);
		$ps->Picture = UploadPicture($_FILES['pic']);
		
		if($ps->Insert()){
		$msg.="Insert successful.";
		}
		else{
		$msg.=$ps->Err;
		}
		Redirect("?a=photoslider&msg={$msg}");
	   }
	}


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
<table width="850" border="1" align="center">

  <tr>
    <td width="132">Head Line</td>
    <td width="375"><input type="text" name="hl" /></td>
    <td width="321"><?php mer($eheadline);?></td>
  </tr>
  <tr>
    <td>Description</td>
    <td><textarea name="des" rows="10" cols="40"></textarea></td>
    <td><?php mer($edescription);?></td>
  </tr>
  <tr>
    <td>Picture</td>
    <td><input type="file" name="pic" /></td>
    <td><?php mer($epicture);?></td>
  </tr>
  <tr>
    <td><input type="reset" name="reset" value="Reset" /></td>
    <td><input type="submit" name="sub" value="Insert" /></td>
    <td>&nbsp;</td>
  </tr>
  
</table>
</form>
<br />
<br />
<br />
<br />

<table width="853" border="1" align="center">
  <tr>
    <td width="159">Headline</td>
    <td width="455">Description</td>
    <td width="82">Picture</td>
    <td width="56">Edit</td>
    <td width="67">Delete</td>
  </tr>
  <tr>
  
  <?php 
  $r=$ps->Select();
  Table($r,"photoslider");
  ?>
  </tr>
</table>






</div>



