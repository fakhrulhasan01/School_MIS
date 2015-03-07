<div class="main_body">
<?php 
$g = new GardianMember();
$err=0;
$msg="";
$ename="";
$epicture="";
$edesignation="";
$edescription="";
if(isset($_POST['sub'])){

   if($_POST['name']==""){
	  $err++;
	  $ename.="Please enter name.";
	  }
	  else if(strlen($_POST['name'])<3){
	  $err++;
	  $ename.="Name must be three character.";
	  }
	  
   
   /*if($_POST['pic']==""){
	  $err++;
	  $epicture.="Please select a picture.";
	  }
	*/  
  
  if($_POST['desig']==""){
	  $err++;
	  $edesignation.="Please enter designation.";
	  }
	  else if(strlen($_POST['desig'])<3){
	  $err++;
	  $edesignation.="Designation name must be three character.";
	  }
	  
  if($_POST['des']==""){
	  $err++;
	  $edescription.="Please enter description.";
	  }
	  else if(strlen($_POST['des'])<3){
	  $err++;
	  $edescrption.="Descrption name must be three character.";
	  }
	  
	  echo $sql;
	  
	  if($err==0){
		  $g->Id = $_POST['id'];
		  $g->SelectById();
		  if(($_FILES['pic']['name'] != "") && (($_FILES['pic']['type'] == "image/jpg") ||
									 ($_FILES['pic']['type'] == "image/jpeg") ||
									 ($_FILES['pic']['type'] == "image/png") ||
									 ($_FILES['pic']['type'] == "image/gif"))) {
					if($g->Picture != "")
					{
						$tcpp = "images/" . $g->Picture;
						unlink($tcpp);
					}
					$g->Picture = UploadPicture($_FILES['pic']);
				}
				
				//echo $tc->Picture;
				
				$adr = "files/" . $g->Address;
				unlink($adr);

		 $g->Name = $_POST['name'];
		 //$g->Picture = UploadPicture($_FILES['pic']);
		 $g->Designation = $_POST['desig'];
		 $g->Description = CreateFile($_POST['des']);
		 if($g->Update()){
			$msg.="Update successful.";
			}else{
			$msg.=$g->Err;
			}
			Redirect("?a=gardianmember&msg={$msg}");
		 }
	}
	$g->Id = $_GET['id'];
	$g->SelectById();
?>
<form action="" method="post" enctype="multipart/form-data"> 
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
<table width="479" border="1">
  <h1><center>GardianMemmber</center></h1>
  <tr>
    <td width="92">Name</td>
    <td width="218"><input type="text" name="name" value="<?php echo $g->Name;?>" /></td>
    <td width="147"><?php mer($ename);?></td>
  </tr>
  <tr>
    <td>Picture</td>
    <td>
    <img src="images/<?php echo $g->Picture;?>" width="120" height="100" />
    <input type="file" name="pic"  /></td>
    <td><?php mer($epicture);?></td>
  </tr>
  <tr>
    <td>Designation</td>
    <td><input type="text" name="desig" value="<?php echo $g->Designation;?>" /></td>
    <td><?php mer($edesignation);?></td>
  </tr>
  <tr>
    <td>Description</td>
    <td><textarea name="des"><?php FileRead("files/" . $g->Description);?></textarea></td>
    <td><?php mer($edescription);?></td>
  </tr>
  <tr>
    <td><input type="reset" name="reset" value="Reset" /></td>
    <td><input type="submit" name="sub" value="Update" /></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</div>