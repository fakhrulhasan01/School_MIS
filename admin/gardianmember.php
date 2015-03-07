<div class="row no-gutter">
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
	  $edescription.="Description name must be three character.";
	  }
	  
	  //echo $sql;
	  
	  if($err==0){
		 $g->Name = $_POST['name'];
		 $g->Picture = UploadPicture($_FILES['pic']);
		 $g->Designation = $_POST['desig'];
		 $g->Description = CreateFile($_POST['des']);
		 if($g->Insert()){
			$msg.="Insert successful.";
			}else{
			$msg.=$g->Err;
			}
			Redirect("?a=gardianmember&msg={$msg}");
		 }
	}
?>
<form action="" method="post" enctype="multipart/form-data"> 
<table width="700" border="1">
  <h1><center>GardianMemmber</center></h1>
  <tr>
    <td width="161">Name</td>
    <td width="218"><input type="text" name="name" /></td>
    <td width="299"><?php mer($ename);?></td>
  </tr>
  <tr>
    <td>Picture</td>
    <td><input type="file" name="pic" /></td>
    <td><?php mer($epicture);?></td>
  </tr>
  <tr>
    <td>Designation</td>
    <td><input type="text" name="desig" /></td>
    <td><?php mer($edesignation);?></td>
  </tr>
 <tr>
    <td>Description</td>
    <td><textarea name="des"></textarea></td>
    <td><?php mer($edescription);?></td>
  </tr>
 
  <tr>
    <td><input type="reset" name="reset" value="Reset" /></td>
    <td><input type="submit" name="sub" value="save" /></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<table width="1038" border="1">
  <tr>
    <td width="120">Name</td>
    <td width="91">Picture</td>
    <td width="136">Designation</td>
    <td width="525">Description</td>
    <td width="50">Edit</td>
    <td width="76">Delete</td>
  </tr>
 <?php 
 $r=$g->Select();
 Table($r,"gardianmember");
 ?>
  <tr>
  </tr>
</table>



</div>