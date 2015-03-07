<div class="row no-gutter">
<?php
$t = new TeacherAccountInfo();
$typeteacher = new TypeTeacher();
$day = new Day();
$month = new Month();
$year = new Year();
$msg="";
$err=0;
$eamount="";
$ettypeid="";


if(isset($_POST['sub'])){
	
	if($_POST['paidamount']==""){
		$err++;
		$eamount.="Please insert  amount.";
	   }
	   
	   
	if($_POST['typeteacherid']==0){
		$err++;
		$ettypeid.="Please select one type.";
	   }
	
	  
	  echo $err;
	  
	  if($err==0){
		$t->Id = $_POST['id'];  
		$t->TeacherId = $_POST['teacherid'];  
		$t->PaidAmount = $_POST['paidamount'];
		$t->TypeTeacherId = $_POST['typeteacherid'];
		$t->DayId = $_POST['dayid'];
		$t->MonthId = $_POST['monthid'];
		$t->YearId = $_POST['yearid'];
		
		if($t->Update()){
		$msg.="Update successful.";
		}
		else{
		$msg.=$t->Err;
		}
	  	Redirect("?ad=teacheraccountinfo&msg={$msg}");
	   }
	}
$t->Id = $_GET['id'];
$t->SelectById();

?> 
<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
<table width="90%" border="0" align="center">

<h1><center>Teacher Account Info&nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  
  <tr>
    <td>Teacher Id</td>
    <td><input type="text" name="teacherid" value="<?php echo $t->TeacherId ?>" /></td>
    <td></td>
  </tr>
 
  
  <tr>
    <td>Amount</td>
    <td><input type="text" name="paidamount" value="<?php echo $t->PaidAmount;?>" /></td>
    <td><?php mer($eamount);?></td>
  </tr>
 
  <tr>
    <td>Earn Type</td>
    <td>
     <select name="typeteacherid">
    <option value="0">Select One Type</option>
    <?php
    $r = $typeteacher->Select();
	SelectedFunction($r, $t->TypeTeacherId);
	?>
    </select>
    </td>
    <td></td>
  </tr>
  
  <tr>
    <td>Day</td>
    <td>
     <select name="dayid">
    <option value="0">Day</option>
    <?php
    $r = $day->Select();
	SelectedFunction($r, $t->DayId);
	?>
    </select>
    </td>
    <td></td>
    </tr>
    <tr>
    <td>Month</td>
    <td>
     <select name="monthid">
    <option value="0">Month</option>
    <?php
    $r = $month->Select();
	SelectedFunction($r, $t->MonthId);
	?>
    </select>
    </td>
    <td></td>
 </tr>
 <tr>
    <td>Year</td>
    <td>
     <select name="yearid">
    <option value="0">Year</option>
    <?php
    $r = $year->Select();
	SelectedFunction($r, $t->YearId);
	?>
    </select>
    </td>
    <td></td>
    
  </tr>
  
    
  
  
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Insert" /></td>
  </tr>
</table>
</form>
</div>