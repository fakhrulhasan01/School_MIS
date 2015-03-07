<style type="text/css">
	#view th{
		border:1px #CCC solid;
		background-color:#3C9;
		color:white;
		text-align:center;
		height:34px;
	}
	#view td{
		border:1px #CCC solid;
	}
	#view{
		background-color:#;
		margin:10px auto 0px auto;
	}
	#btn{
		background-color:#0C6;
		color:white;
		font-weight:bold;
		float:right;
		margin-right:4px;
	}
	#inp{
		width:220px;
		height:28px;
	}
	
</style>

<div class="main_body">
<?php
$s = new Student();
$c = new Classs();
$msg="";
$err=0;
$ename="";
$epicture="";
$eclassid="";
$eyear="";
$efname="";
$emname="";
$edob="";
$egender="";
$enationality="";
$ereligion="";
$emobile="";
$ephone="";
$eemail="";
$eaemail="";
$enationalid="";
$epaddress="";
$eperaddress="";

if(isset($_POST['sub'])){

    
	if($_POST['name']==""){
      $err++;
      $ename.="Please enter student name.";
      }
    
	/*
	if($_POST['pic']==""){
      $err++;
      $epicture .="Please enter student picture.";
      }*/
    
	
	if($_POST['classid']==0){
      $err++;
      $eclassid .="Please select a class.";
      }
   if($_POST['year']==""){
      $err++;
      $eyear .="Please select a class.";
      }
   
   
	if($_POST['fname']==""){
      $err++;
      $efname .="Please insert father name.";
      }
    
	if($_POST['mname']==""){
      $err++;
      $emname .="Please insert mother name.";
      }
   
   if($_POST['dob']==""){
      $err++;
      $edob .="Please insert date of bitrh.";
      }
    
    
	if($_POST['gen']==""){
      $err++;
      $egender .="Please select one .";
      }
    
	if($_POST['nationality']==""){
      $err++;
      $enationality .="Please insert nationality name.";
      }
   
   if($_POST['religion']==""){
      $err++;
      $ereligion .="Please insert religion name.";
      }
   
   
   
   if($_POST['mobile']==""){
      $err++;
      $emobile .="Please insert a mobile number.";
      }
    
    if($_POST['phone']==""){
      $err++;
      $ephone .="Please insert a phone number.";
      }
   
   
	
	if($_POST['paddr']==""){
      $err++;
      $epaddress.="Please enter student address.";
      }
    
	
	if($_POST['peraddr']==""){
      $err++;
      $eperaddress.="Please enter student  permanent address.";
      }
      	
	
  
 echo $err;
 
  if($err == 0){
	$s->Id = $_POST['id'];
	$s->SelectById();
	
	if(($_FILES['pic']['name'] != "") &&  
								     (($_FILES['pic']['type'] == "image/jpg") ||
									 ($_FILES['pic']['type'] == "image/jpeg") ||
									 ($_FILES['pic']['type'] == "image/png") ||
									 ($_FILES['pic']['type'] == "image/gif"))) {
					if($s->Picture != "")
					{
						$bpp = "images/" . $s->Picture;
						unlink($bpp);
					}
					$s->Picture = UploadPicture($_FILES['pic']);
				}
				
				
	$s->Name = $_POST['name'];
	//$s->Picture = UploadPicture($_FILES['pic']);
	$s->ClassId = $_POST['classid'];
	$s->Year = $_POST['year'];
	$s->FName = $_POST['fname'];
	$s->MName = $_POST['mname'];
	$s->DateOfBirth = $_POST['dob'];
	$s->Gender = $_POST['gen'];
	$s->Nationality = $_POST['nationality'];
	$s->Religion = $_POST['religion'];
	$s->BloodGroup = $_POST['bloodgroup'];
	$s->Mobile = $_POST['mobile'];
	$s->Phone = $_POST['phone'];
	$s->Email = $_POST['email'];
	$s->AlterNativeEmail = $_POST['aemail'];
    $s->NationalId = $_POST['nationalid'];
	$s->AboutStudent = $_POST['aboutstudent'];
    $s->PAddress = CreateFile($_POST['paddr']);
	$s->PerAddress = CreateFile($_POST['peraddr']);
	
	if($s->Update()){
	$msg .="Update successful.";
	}
	else{
		$msg .=$s->Err;
	}
	Redirect("?a=student&msg={$msg}");
  }
}
 $s->Id = $_GET['id'];
 $s->SelectById();
?>

<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
<table width="70%" border="1" align="center">
<h1><center>Student Registration</center></h1>
  <tr>
    <td>Name</td>
    <td><input type="text" name="name" value="<?php echo $s->Name;?>" /></td>
    <td><?php mer($ename);?></td>
  </tr>
  <tr>
    <td>Picture</td>
    <td>
    <img src="images/<?php echo $s->Picture;?>" height="100" width="100" />
    <input type="file" name="pic" />
    </td>
    <td><?php mer($epicture);?></td>
  </tr>
  <tr>
    <td>Class</td>
    <td>
    <select name="classid">
    <option value="0">Select One Class Name</option>
    <?php
    $r = $c->Select();
	SelectedFunction($r,$s->ClassId);
	?>
    </select>
    
    </td>
    <td><?php mer($eclassid);?></td>
  </tr>
  
  <tr>
    <td>Year</td>
    <td><input type="text" name="year" value="<?php echo $s->Year;?>" /></td>
    <td><?php mer($eyear);?></td>
  </tr>
  
  <tr>
    <td>Father's Name</td>
    <td><input type="text" name="fname" value="<?php echo $s->FName;?>" /></td>
    <td><?php mer($efname);?></td>
  </tr>
  <tr>
    <td>Mother's Name</td>
    <td><input type="text" name="mname" value="<?php echo $s->MName;?>" /></td>
    <td><?php mer($emname);?></td>
  </tr>
  <tr>
    <td>Date Of Birth</td>
    <td><input type="text" name="dob" value="<?php echo $s->DateOfBirth;?>" /></td>
    <td><?php mer($edob);?></td>
  </tr>
  
  <tr>
    <td>Gender</td>
    <td>
    <?php 
	if($s->Gender=="m"){
	?>
    <input type="radio" name="gen" value="m" checked="checked" />Male
    <input type="radio" name="gen" value="f" />Female
    <?php }
	else{
?>
    <input type="radio" name="gen" value="m" />Male
    <input type="radio" name="gen" value="f" checked="checked" />Female
    <?php }?>
    </td>
    <td><?php mer($egender);?></td>
  </tr>
  <tr>
    <td>Nationality</td>
    <td><input type="text" name="nationality" value="<?php echo $s->Nationality;?>" /></td>
    <td><?php mer($enationality);?></td>
  </tr>
  <tr>
    <td>Religion</td>
    <td><input type="text" name="religion" value="<?php echo $s->Religion;?>" /></td>
    <td><?php mer($ereligion);?></td>
  </tr>
  <tr>
    <td>BloodGroup</td>
    <td><input type="text" name="bloodgroup" value="<?php echo $s->BloodGroup;?>" /></td>
    <td></td>
  </tr>
  <tr>
    <td>Mobile</td>
    <td><input type="text" name="mobile" value="<?php echo $s->Mobile;?>" /></td>
    <td><?php mer($emobile);?></td>
  </tr>
  
  <tr>
    <td>Phone</td>
    <td><input type="text" name="phone" value="<?php echo $s->Phone;?>" /></td>
    <td><?php mer($ephone);?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input type="text" name="email" value="<?php echo $s->Email;?>" /></td>
    <td></td>
  </tr>
  <tr>
    <td>Alternative Email</td>
    <td><input type="text" name="aemail" value="<?php echo $s->AlterNativeEmail;?>" /></td>
    <td><?php mer($epass);?></td>
  </tr>
  <tr>
    <td>National Id</td>
    <td><input type="text" name="nationalid" value="<?php echo $s->NationalId;?>" /></td>
    <td></td>
  </tr>
  
  <tr>
    <td>About Student</td>
    <td><input type="text" name="aboutstudent" value="<?php echo $s->AboutStudent;?>" /></td>
    <td></td>
  </tr>
  
  <tr>
    <td>Present Address</td>
    <td><textarea name="paddr"><?php FileRead("files/" .$s->PAddress);?></textarea></td>
    <td><?php mer($epaddress);?></td>
  </tr>
    <tr>
    <td>Permanent Address</td>
    <td><textarea name="peraddr"><?php FileRead("files/" .$s->PerAddress);?></textarea></td>
    <td><?php mer($eperaddress);?></td>
  </tr>
  
  <tr>
    <td><input type="reset" name="reset" value="Reset" /></td>
    <td><input type="submit" name="sub" value="Update" /></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>








</div>