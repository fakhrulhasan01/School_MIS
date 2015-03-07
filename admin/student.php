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
$y = new Year();
$rr = new Religion();
$b = new BloodGroup();
$msg="";
$err=0;
$estudentid="";
/*$gen="";
$nationality="";
$ename="";
$eclassroll="";
$euserid="";
$epassword="";
$epicture="";
$eclassid="";
$eyearid="";
$esectionid="";
$eshiftid="";
$efname="";
$emname="";
$edob="";
$egender="";
$enationality="";
$ereligionid="";
$ebloodgroupid="";
$emobile="";
$ephone="";
$eemail="";
$eaemail="";
$enationalid="";
$epaddress="";
$eperaddress="";
*/

if(isset($_POST['sub'])){

     if($_POST['studentid']==""){
      $err++;
      $estudentid.="Please enter studentid name.";
      }
	
	  	
	
  
   // echo $err;
 
  if($err == 0){
	$s->StudentId = $_POST['studentid'];	
	$s->Name = $_POST['name'];
	$s->Picture = UploadPicture($_FILES['pic']);
	$s->ClassId = $_POST['classid'];
	$s->YearId = $_POST['yearid'];
	$s->FName = $_POST['fname'];
	$s->MName = $_POST['mname'];
	$s->DateOfBirth = $_POST['dob'];
	$s->Gender = $_POST['gen'];
	$s->Nationality = $_POST['nationality'];
	$s->ReligionId = $_POST['religionid'];
	$s->BloodGroupId = $_POST['bloodgroupid'];
	$s->Mobile = $_POST['mobile'];
	$s->Phone = $_POST['phone'];
	$s->Email = $_POST['email'];
	$s->AlterNativeEmail = $_POST['aemail'];
	$s->Password = $_POST['password'];
    $s->NationalId = $_POST['nationalid'];
	$s->AboutStudent = $_POST['aboutstudent'];
	$s->PreviousInstitute = $_POST['previousinstitute'];
    $s->PAddress = CreateFile($_POST['paddr']);
	$s->PerAddress = CreateFile($_POST['peraddr']);
	
	if($s->Insert()){
	$msg .="Insert successful.";
	}
	else{
		$msg .=$s->Err;
	}
	Redirect("?a=student&msg={$msg}");
  }
}
 
?>

<form action="" method="post" enctype="multipart/form-data">
<table width="70%" border="0" align="center" id="border">
<h1><center>Student Registration</center></h1>
  
  <tr id="grading_point_tr11">
    <td>&nbsp;&nbsp;StudentId</td>
    <td><input type="text" name="studentid" /></td>
    <td><?php mer($estudentid);?></td>
  </tr>  
  
  <tr id="grading_point_tr22">
    <td>&nbsp;&nbsp;Name</td>
    <td><input type="text" name="name" /></td>
    <td></td>
  </tr>
  
  <tr id="grading_point_tr11">
    <td>&nbsp;&nbsp;Picture</td>
    <td><input type="file" name="pic" /></td>
    <td></td>
  </tr>
  
  <tr id="grading_point_tr22">
    <td>&nbsp;&nbsp;Class</td>
    <td>
    <select name="classid">
    <option value="0">Select One Class Name</option>
    <?php
    $r = $c->Select();
	SelectFunction($r);
	?>
    </select>
    
    </td>
    <td></td>
  </tr>
  
  <tr id="grading_point_tr11">
    <td>&nbsp;&nbsp;Year</td>
    <td>
     <select name="yearid">
    <option value="0">Select One year Name</option>
    <?php
    $r = $y->Select();
	SelectFunction($r);
	?>
    </select>
    </td>
    <td></td>
  </tr>
  
  <tr id="grading_point_tr22">
    <td>&nbsp;&nbsp;Father's Name</td>
    <td><input type="text" name="fname" /></td>
    <td></td>
  </tr>
  
  <tr id="grading_point_tr11">
    <td>&nbsp;&nbsp;Mother's Name</td>
    <td><input type="text" name="mname" /></td>
    <td></td>
  </tr>
  
  <tr id="grading_point_tr22">
    <td>&nbsp;&nbsp;Date Of Birth</td>
    <td><input type="text" name="dob" /></td>
    <td></td>
  </tr>
  
  <tr id="grading_point_tr11">
    <td>&nbsp;&nbsp;Gender</td>
    <td>
    <input type="radio" name="gen" value="m" />Male
    <input type="radio" name="gen" value="f" />Female
    </td>
    <td></td>
  </tr>
  
  <tr id="grading_point_tr22">
    <td>&nbsp;&nbsp;Nationality</td>

    <td>
    <input type="radio" name="nationality" value="b" />Bangladeshi
    <input type="radio" name="nationality" value="o" />Other
    </td>
    <td></td>
  </tr>
  
  <tr id="grading_point_tr11">
    <td>&nbsp;&nbsp;Religion</td>
    <td>
    <select name="religionid">
    <option value="0">Select One religion Name</option>
    <?php
    $r = $rr->Select();
	SelectFunction($r);
	?>
    </select>
    </td>
    <td></td>
  </tr>
  
  <tr id="grading_point_tr22">
    <td>&nbsp;&nbsp;BloodGroup</td>
    <td>
    <select name="bloodgroupid">
    <option value="0">Select One year Name</option>
    <?php
    $r = $b->Select();
	SelectFunction($r);
	?>
    </select>
    </td>
    <td></td>
  </tr>
  
  <tr id="grading_point_tr11">
    <td>&nbsp;&nbsp;Mobile</td>
    <td><input type="text" name="mobile" /></td>
    <td></td>
  </tr>
  
  <tr id="grading_point_tr22">
    <td>&nbsp;&nbsp;Phone</td>
    <td><input type="text" name="phone" /></td>
    <td></td>
  </tr>
  <tr id="grading_point_tr11">
    <td>&nbsp;&nbsp;Email</td>
    <td><input type="text" name="email" /></td>
    <td></td>
  </tr>
  
  <tr id="grading_point_tr22">
    <td>&nbsp;&nbsp;Alternative Email</td>
    <td><input type="text" name="aemail" /></td>
    <td></td>
  </tr>
  
  <tr id="grading_point_tr11">
    <td>&nbsp;&nbsp;Password</td>
    <td><input type="password" name="password" /></td>
    <td></td>
  </tr>
  
  <tr id="grading_point_tr22">
    <td>&nbsp;&nbsp;R-type Password</td>
    <td><input type="password" name="password1" /></td>
    <td></td>
  </tr>
  
  <tr id="grading_point_tr11">
    <td>&nbsp;&nbsp;National Id</td>
    <td><input type="text" name="nationalid" /></td>
    <td></td>
  </tr>
  
  <tr id="grading_point_tr22">
    <td>&nbsp;&nbsp;About Student</td>
    <td><input type="text" name="aboutstudent" /></td>
    <td></td>
  </tr>
  
  <tr id="grading_point_tr11">
    <td>&nbsp;&nbsp;Previous Institute</td>
    <td><input type="text" name="previousinstitute" /></td>
    <td></td>
  </tr>
  
  <tr id="grading_point_tr22">
    <td>&nbsp;&nbsp;Present Address</td>
    <td><textarea name="paddr"></textarea></td>
    <td></td>
  </tr>
    <tr id="grading_point_tr11">
    <td>&nbsp;&nbsp;Permanent Address</td>
    <td><textarea name="peraddr"></textarea></td>
    <td></td>
  </tr>
  
  <tr>
    <td><input type="reset" name="reset" value="Reset" /></td>
    <td><input type="submit" name="sub" value="Regirster" /></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>


<table width="100%" id="view" align="center">
  <tr>
    <th width="242">StudentId </th>
    <th width="242">Student Name </th>
    <th width="116">Picture</th>
    <th width="116">Class Name</th>
    <th width="116">Year</th>
    <th width="116">FName</th>
    <th width="116">MName</th>
    <th width="116">DOB</th>
    <th width="116">Sex</th>
    <th width="116">Nationality</th>
    <th width="116">Religion</th>
    <th width="116">Blood Group</th>
    <th width="116">Mobile</th>
    <th width="116">Phone</th>
    <th width="116">Email</th>
    <th width="116">Alternate Email</th>
    <th width="116">National Id</th>
    <th width="116">About Student</th>
    <th width="116">Previous Institute</th>
    <th width="116">Present Address</th>
    <th width="116">Permanent Address</th>
    <th width="50">Edit</th>
    <th width="56">Delete</th>
  </tr>
 
 <tr>
  
 <?php 
 $r=$s->Select();
 if($r !==""){
 for($i=0; $i<count($r); $i++){
	 echo "<tr>";
	 	echo "<td>".$r[$i][0]."</td>";
	 	echo "<td>".$r[$i][1]."</td>";
		echo "<td>".'<img src="images/ echo $r[$i][2];" />'."</td>";
		echo "<td>".$r[$i][3]."</td>";
		echo "<td>".$r[$i][4]."</td>";
		echo "<td>".$r[$i][5]."</td>";
		echo "<td>".$r[$i][6]."</td>";
		echo "<td>".$r[$i][7]."</td>";
		echo "<td>".$r[$i][8]."</td>";
		echo "<td>".$r[$i][9]."</td>";
		echo "<td>".$r[$i][10]."</td>";
		echo "<td>".$r[$i][11]."</td>";
		echo "<td>".$r[$i][12]."</td>";
		echo "<td>".$r[$i][13]."</td>";
		echo "<td>".$r[$i][14]."</td>";
		echo "<td>".$r[$i][15]."</td>";
		echo "<td>".$r[$i][16]."</td>";
		echo "<td>".$r[$i][17]."</td>";
		echo "<td>".$r[$i][18]."</td>";
		echo "<td>".$r[$i][19]."</td>";
		echo "<td>".$r[$i][20]."</td>";
	
	 	echo "<td><a title='Edit' href='?a=assigningteacheredit&id=".$r[$i][0]."'><center><img src='icon-images/edit.jpg'  height='22' width='28'/></center></a></td>";
	 	echo "<td><a title='Delete' href='?a=assigningteacheredit&id=".$r[$i][0]."'><center><img src='icon-images/delete.jpg'  height='22' width='28'/></center></a></td>";
	 echo "<tr>";
 }}
 ?>
 </tr>

  
</table>





</div>