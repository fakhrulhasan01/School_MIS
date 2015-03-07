<div class="row no-gutter">

<?php 
$pg = new PhotoGallary();
$p = new PhotoType();
$msg="";
$err=0;
$ename="";
$epicture="";
$ephototypeid="";

if(isset($_POST['sub'])){
	if($_POST['name']==""){
		$err++;
		$ename.="Please insert a picture name.";
	   }
	   else if(strlen($_POST['name'])<3){
	   $err++;
	   $eclass.="Picture name must be three character.";
	   }
	   
	 /*if($_POST['pic']==""){
		$err++;
		$ename.="Please insert a picture name.";
	   }
	 */  
	   
	   if($_POST['phototypeid']==0){
		$err++;
		$ephototypeid.="Please select a picture type.";
	   }
	   
	   
	   if($err==0){
		$pg->Id = $_POST['id']; 
		$pg->SelectById();
		 if(($_FILES['pic']['name'] != "") &&  
								     (($_FILES['pic']['type'] == "image/jpg") ||
									 ($_FILES['pic']['type'] == "image/jpeg") ||
									 ($_FILES['pic']['type'] == "image/png") ||
									 ($_FILES['pic']['type'] == "image/gif"))) {
					if($pg->Picture != "")
					{
						$bpp = "images/" . $pg->Picture;
						unlink($bpp);
					}
					$pg->Picture = UploadPicture($_FILES['pic']);
				}
				
				$des = "files/" . $pg->Description;
				unlink($des);
		 
		
		
		$pg->Name = $_POST['name'];
		//$pg->Picture = UploadPicture($_FILES['pic']);
		$pg->PhotoTypeId = $_POST['phototypeid'];
		
		if($pg->Update()){
		$msg.="Update successful.";
		}
		else{
		$msg.=$pg->Err;
		}
		Redirect("?a=photogallary&msg={$msg}");
	   }
	}
  
  
  $pg->Id = $_GET['id'];
  $pg->SelectById();

?>



<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" /> 
<table width="678" border="1">

  <tr>
    <td width="111">Name of picture</td>
    <td width="248"><input type="text" name="name" value="<?php echo $pg->Name;?>" /></td>
    <td width="297"><?php mer($ename);?></td>
  </tr>
  <tr>
    <td>Picture</td>
    <td>
    <input type="file" name="pic" />
    <img src="images/<?php echo $pg->Picture;?>" width="200" height="200" />
    </td>
    <td><?php mer($epicture);?></td>
  </tr>
  <tr>
    <td>Phototyre</td>
    <td>
    <select name="phototypeid">
    <option value="0">Select One Photo Type</option>
    <?php 
	$r = $p->Select();
	SelectedFunction($r, $pg->PhotoTypeId);
	?>
    </select>
    </td>
    <td><?php mer($epictype);?></td>
  </tr>
  <tr>
    <td><input type="reset" name="reset" value="Reset" /></td>
    <td><input type="submit" name="sub" value="Update" /></td>
    <td>&nbsp;</td>
  </tr>
  
</table>
</form>






</div>



