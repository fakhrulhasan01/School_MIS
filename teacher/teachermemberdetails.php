<div class="row no-gutter">

<?php 
$t = new Teacher();
$t->Id = $_GET['id'];
$t->SelectById();
?>

<div class="teachermember_main_body" id="td">
<div class="teachermember_main_body_header_img">
<div class="teachermember_main_body_header_img_in">
<div class="teachermember_main_body_header_img_in_img">
<img src="images/<?php echo $t->Picture;?>" height="100" width="200" /></div>
</div>
<div class="teachermember_main_body_header_heading">Personal Information</div>

</div>
<br />
<br />
<br />

<table width="850" border="1" align="center">
  <tr>
    <td width="199">&nbsp;Name :</td>
    <td width="585">&nbsp;<?php echo $t->Name;?></td>
  </tr>
  <tr>
    <td>&nbsp;Group :</td>
    <td>&nbsp;<?php echo $t->Group;?></td>
  </tr>
  <tr>
    <td>&nbsp;Academic Qualification :</td>
    <td>&nbsp;<?php FileRead("files/" .$t->AcademicQualification);?></td>
  </tr>
  <tr>
    <td>&nbsp;Training Experience :</td>
    <td>&nbsp;<?php FileRead("files/" .$t->TrainingExprience);?></td>
  </tr>
  <tr>
    <td>&nbsp;Teaching Area :</td>
    <td>&nbsp;<?php echo $t->TeachingArea;?></td>
  </tr>
  <tr>
    <td>&nbsp;Previous Employment :</td>
    <td>&nbsp;<?php echo $t->PreviousEmployment;?></td>
  </tr>
  <tr>
    <td>&nbsp;Personal Webpage :</td>
    <td>&nbsp;<?php echo $t->PersonalWebpage;?></td>
  </tr>
  <tr>
    <td>&nbsp;Phone Mumber :</td>
    <td>&nbsp;<?php echo $t->Phone;?></td>
  </tr>
  <tr>
    <td>&nbsp;Gender :</td>
    <td>&nbsp;<?php echo $t->Gender;?></td>
  </tr>
  <tr>
    <td>&nbsp;Email :</td>
    <td>&nbsp;<?php echo $t->Email;?></td>
  </tr>
  <tr>
    <td>&nbsp;Father Name</td>
    <td>&nbsp;<?php echo $t->FName;?></td>
  </tr>
  <tr>
    <td>&nbsp;Mother Name</td>
    <td>&nbsp;<?php echo $t->MName;?></td>
  </tr>
  <tr>
    <td>&nbsp;Present Address</td>
    <td>&nbsp;<?php FileRead("files/" .$t->PAddress);?></td>
  </tr>
  <tr>
    <td>&nbsp;Permanent Address</td>
    <td>&nbsp;<?php FileRead("files/" .$t->PerAddress);?></td>
  </tr>
  <tr>
    <td>&nbsp;Mobile Number :</td>
    <td>&nbsp;<?php echo $t->MobileNo;?></td>
  </tr>
  
  <tr>
    <td>&nbsp;Join Date :</td>
    <td>&nbsp;<?php echo $t->JoiningDate;?></td>
  </tr>
  <tr>
    <td>&nbsp;Working Duration :</td>
    <td>&nbsp;<?php echo $t->WorkingDuration;?></td>
  </tr>
  <tr>
    <td>&nbsp;Qualification :</td>
    <td>&nbsp;<?php echo $t->Qualification;?></td>
  </tr>
 </table>


</div>
</div>