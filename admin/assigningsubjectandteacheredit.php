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
	if($ast->Update()){
	 $msg ="Update successful.";
	 }
	 else{
	  $msg =$ast->Err;
	 }
	 Redirect("?a=assigningsubjectandteacher&ms={$msg}");
	}
  }

$ast->SubjectId = $_GET['id'];
$ast->ClassId = $_GET['id'];
$ast->TeacherId = $_GET['id'];
$ast->SelectById();
?>
<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
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
    SelectedFunction($r,$ast->SubjectId);
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
    SelectedFunction($r,$ast->ClassId);
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
    SelectedFunction($r,$ast->TeacherId);
	?>
    </select>
    </td>
    <td><?php mer($eteacherid);?></td>
  </tr>
  <tr>
  
    <td>&nbsp;</td>
    <td><input type="submit" name="sub" value="Update" /></td>
  </tr>

</table>
</form>



</div>