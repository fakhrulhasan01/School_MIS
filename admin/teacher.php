<div class="main_body">
<?php
$t = new Teacher();
$msg="";
$err=0;
$ename="";
$ejoi="";
$epicture="";
$egender="";
$epass="";
$eemail="";
$efname="";
$emname="";
$epaddress="";
$eperaddress="";
$emobileno="";
$eteacherid="";
$eworkingduration="";
$equalification="";
$eclassid="";
$egroup="";
$eaq="";
$ete="";
$eta="";
$epe="";
$epw="";
$ephone="";
if(isset($_POST['sub'])){
 
    if($_POST['tid']==""){
      $err++;
      $eteacherid .="Please enter teacher Id.";
      }
    else if(strlen($_POST['tid'])<3){
	  $err++;
	  $eteacherid.="Teacher Id must be three character.";
	  }
	
	
	if($_POST['name']==""){
      $err++;
      $ename.="Please enter student name.";
      }
    else if(strlen($_POST['name'])<3){
	  $err++;
	  $ename.="Student name must be three character.";
	  }
	
	/*
	if($_POST['pic']==""){
      $err++;
      $epicture .="Please enter student picture.";
      }*/
   
      
   
   if($_POST['groupp']==""){
      $err++;
      $egroup.="Please enter assigning group.";
      }
      else if(strlen($_POST['groupp'])<3){
	  $err++;
	  $egroup.="Assigning group name must be three character.";
	  }
   
   if($_POST['aq']==""){
      $err++;
      $eaq.="Please enter academic qualification.";
      }
      else if(strlen($_POST['aq'])<3){
	  $err++;
	  $eaq.="Academic qualification must be three character.";
	  }
   
   if($_POST['p']==""){
      $err++;
      $ephone.="Please enter phone number.";
      }
      else if(strlen($_POST['p'])<3){
	  $err++;
	  $ephone.="Phone name must be three character.";
	  }
   
	
   if(isset($_POST['gen'])==""){
      $err++;
      $egender .="Please select gender.";
      }
    
    
	if($_POST['email']==""){
      $err++;
      $eemail.="Please enter student email.";
      }
    else if(strlen($_POST['email'])<3){
	  $err++;
	  $eemail.="Student must be three character.";
	  }
	
	
	if($_POST['pass']==""){
      $err++;
      $epass.="Please enter password.";
      }
    else if(strlen($_POST['pass'])<2){
	  $err++;
	  $epass.="Password must be three character.";
	  }
	
	if($_POST['pass'] != $_POST['pass1']){
		$err++;
		$epass.="Password don't mass";
		}
	
	if($_POST['fname']==""){
      $err++;
      $efname.="Please enter student's father name.";
      }
    else if(strlen($_POST['fname'])<3){
	  $err++;
	  $efname.="Student's father name must be three character.";
	  }
    
	
	if($_POST['mname']==""){
      $err++;
      $emname.="Please enter student's mother name.";
      }
    else if(strlen($_POST['name'])<3){
	  $err++;
	  $emname.="Student's mother name must be three character.";
	  }
	
	
	if($_POST['paddr']==""){
      $err++;
      $epaddress.="Please enter student address.";
      }
    else if(strlen($_POST['paddr'])<3){
	  $err++;
	  $epaddress.="Student address must be three character.";
	  }
	
	
	if($_POST['peaddr']==""){
      $err++;
      $eperaddress.="Please enter student  permanent address.";
      }
    else if(strlen($_POST['peaddr'])<3){
	  $err++;
	  $eperaddress.="Student address must be three character.";
	  }
	  	
	if($_POST['mob']==""){
      $err++;
      $emobileno.="Please enter student  mobile no.";
      }
    else if(strlen($_POST['mob'])<3){
	  $err++;
	  $emobile.="Student mobile must be three character.";
	  }
	
	if($_POST['joi']==""){
      $err++;
      $ejoi.="Please enter teacher joiningdate.";
      }
    else if(strlen($_POST['joi'])<3){
	  $err++;
	  $ejoi.="Teacher joiningdate must be three character.";
	  }
	
	
	
	if($_POST['work']==""){
      $err++;
      $eworkingduration.="Please enter teacher  WorkingDuration.";
      }
    else if(strlen($_POST['work'])<3){
	  $err++;
	  $eworkingduration.="Teacher WorkingDuration must be three character.";
	  }
	
	
	if($_POST['qua']==""){
      $err++;
      $equalification.="Please enter teacher  Qualification .";
      }
    else if(strlen($_POST['qua'])<3){
	  $err++;
	  $equalification.="Teacher Qualification must be three character.";
	  }
	
	
  
 echo $err;
 
  if($err == 0){
	$t->Name = $_POST['name'];
	$t->TeacherId = $_POST['tid'];
	$t->Picture = UploadPicture($_FILES['pic']);
	$t->Groupp = $_POST['groupp'];
	$t->AcademicQualification = CreateFile($_POST['aq']);
	$t->TrainingExprience = CreateFile($_POST['te']);
	$t->TeachingArea = $_POST['ta'];
	$t->PreviousEmployment = $_POST['pe'];
	$t->PersonalWebpage = $_POST['pw'];
	$t->Phone = $_POST['p'];
	$t->Mobile = $_POST['mob'];
	$t->Gender = $_POST['gen'];
	$t->Email = $_POST['email'];
	$t->Password = $_POST['pass'];
    $t->FName = $_POST['fname'];
	$t->MName = $_POST['mname'];
	$t->PAddress = CreateFile($_POST['paddr']);
	$t->PerAddress = CreateFile($_POST['peaddr']);
	$t->WorkingDuration = $_POST['work'];
	$t->Qualification = $_POST['qua'];
	$t->JoiningDate = $_POST['joi'];
	
	if($t->Insert()){
	$msg .="Insert successful.";
	}
	else{
		$msg .=$t->Err;
	}
	//Redirect("?a=teacher&msg={$msg}");
  }
}
 
?>

<form action="" method="post" enctype="multipart/form-data">
<table width="521" border="1" align="center">
<h1><center>
Teacher Registration&nbsp;
<?php
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  
  <tr>
    <td width="125">Teacher Id</td>
    <td width="218"><input type="text" name="tid" /></td>
    <td width="156"><?php mer($eteacherid);?></td>
  </tr>
  
  <tr>
    <td>Name</td>
    <td><input type="text" name="name" /></td>
    <td><?php mer($ename);?></td>
  </tr>
  
  <tr>
    <td>Picture</td>
    <td><input type="file" name="pic" /></td>
    <td><?php mer($epicture);?></td>
  </tr>
  
  
  <tr>
    <td>Group</td>
    <td><input type="text" name="groupp" /></td>
    <td><?php mer($egroup);?></td>
  </tr>
 
  <tr>
    <td>Academic Qualification</td>
    <td><textarea name="aq"></textarea></td>
    <td><?php mer($eaq);?></td>
  </tr> 
  
  <tr>
    <td>Training Experience</td>
    <td><textarea name="te"></textarea></td>
    <td><?php mer($ete);?></td>
  </tr> 
  
  <tr>
    <td>Teaching Area</td>
    <td><input type="text" name="ta" /></td>
    <td><?php mer($eta);?></td>
  </tr> 
  
  <tr>
    <td>Previous Employment</td>
    <td><input type="text" name="pe" /></td>
    <td><?php mer($epe);?></td>
  </tr> 
  
  <tr>
    <td>Personal Webpage</td>
    <td><input type="Text" name="pw" /></td>
    <td><?php mer($epw);?></td>
  </tr> 
  
  <tr>
    <td>Phone</td>
    <td><input type="text" name="p" /></td>
    <td><?php mer($ephone);?></td>
  </tr>
 
  <tr>
    <td>Mobile No</td>
    <td><input type="text" name="mob" /></td>
    <td><?php mer($emobileno);?></td>
  </tr>
 
  <tr>
    <td>Gender</td>
    <td>
    <input type="radio" name="gen" value="m" />Male
    <input type="radio" name="gen" value="f" />Female
    </td>
    <td><?php mer($egender);?></td>
  </tr>
  
  <tr>
    <td>Email</td>
    <td><input type="text" name="email" /></td>
    <td><?php mer($eemail);?></td>
  </tr>
  
  <tr>
    <td>Password</td>
    <td><input type="password" name="pass" /></td>
    <td><?php mer($epass);?></td>
  </tr>
  
  <tr>
    <td>R-type Password</td>
    <td><input type="password" name="pass1" /></td>
    <td><?php mer($epass);?></td>
  
  </tr>
    <tr>
    <td>Father's Name</td>
    <td><input type="text" name="fname" /></td>
    <td><?php mer($efname);?></td>
  </tr>
  
  <tr>
    <td>Mother's Name</td>
    <td><input type="text" name="mname" /></td>
    <td><?php mer($emname);?></td>
  </tr>
  
  <tr>
    <td>Present Address</td>
    <td><textarea name="paddr"></textarea></td>
    <td><?php mer($epaddress);?></td>
  
  </tr>
    <tr>
    <td>Permanent Address</td>
    <td><textarea name="peaddr"></textarea></td>
    <td><?php mer($eperaddress);?></td>
  </tr>
  
   <tr>
    <td>Joining Date</td>
    <td><input type="text" name="joi" /></td>
    <td><?php mer($ejoi);?></td>
  </tr>
   <tr>
    <td>WorkingDuration</td>
    <td><input type="text" name="work" /></td>
    <td><?php mer($eworkingduration);?></td>
  </tr>
   <tr>
    <td>Qualification</td>
    <td><input type="text" name="qua" /></td>
    <td><?php mer($equalification);?></td>
  </tr>
  <tr>
    <td><input type="reset" name="reset" value="Reset" /></td>
    <td><input type="submit" name="sub" value="Regirster" /></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>

</div>