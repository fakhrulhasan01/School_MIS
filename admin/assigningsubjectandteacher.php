<div class="main_content">
<?php
$ast = new AssigningSubjectAndTeacher();
$c = new Classs();
$t = new Teacher();
$s = new Subject();
$err=0;
$msg="";
$eclassid="";
$eteacherid="";
$esubjectid="";

if(isset($_POST['sub'])){
	if($_POST['subjectid']==0){
	$err++;
	$esubjectid .="Please select a subject.";
	}
	
  if($_POST['classid'] == 0){
	$err++;
	$eclassid .="Please select one class.";
	}

  if($_POST['teacherid'] == 0){
	$err++;
	$eteacherid .="Please select one teacher.";
	}
	
	echo $err;
	
	if($err==0){
	$ast->SubjectId=$_POST['subjectid'];
	$ast->ClassId =$_POST['classid'];
	$ast->TeacherId =$_POST['teacherid'];
	if($ast->Insert()){
	 $msg ="Insert successful.";
	 }
	 else{
	  $msg =$ast->Err;
	 }
	 Redirect("?a=assigningsubjectandteacher&ms={$msg}");
	}
  }


?>
<form action="" method="post">
<table width="439" border="0">
  <tr>
    <td width="186">&nbsp;</td>
    <td width="342">&nbsp;</td>
    <td width="14">&nbsp;</td>
  </tr>
  <tr>
    <td>Subject</td>
    <td>
    <select name="subjectid">
    <option value="0">Select One</option>
    <?php 
    $r=$s->Select();
    SelectFunction($r);
	?>
    </select>
    </td>
    <td><?php mer($esubjectid);?></td>
  </tr>
  <tr>
    <td>Class</td>
    <td>
    <select name="classid">
    <option value="0">Select One</option>
    <?php 
    $r=$c->Select();
    SelectFunction($r);
	?>
    </select>
    </td>
    <td><?php mer($eclassid);?></td>
  </tr>

  <tr>
    <td>Teacher</td>
    <td>
    <select name="teacherid">
    <option value="0">Select One</option>
    <?php 
    $r=$t->Select();
    SelectFunction($r);
	?>
    </select>
    </td>
    <td><?php mer($eteacherid);?></td>
  </tr>
  <tr>
  
    <td>&nbsp;</td>
    <td><input type="submit" name="sub" value="Insert" /></td>
  </tr>

</table>
</form>

<table width="743" border="1">
  <tr>
    <td width="195">Subject</td>
    <td width="137">Class</td>
    <td width="263">Teacher</td>
    <td width="55">Edit</td>
    <td width="59">Delete</td>
  </tr>
  <?php
  $r=$ast->Select();
  Table($r,assigningsubjectandteacher);
  ?>
</table>


</div>