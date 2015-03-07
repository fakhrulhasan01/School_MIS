<div class="row no-gutter">
<?php
$efga = new ExpenceForGardiantArrangement();
$efgat = new ExpenceForGardiantArrangementType();
$day = new Day();
$month = new Month();
$year = new Year();
$msg="";
$err=0;
$eamount="";
$eexpencetypeid="";


if(isset($_POST['sub'])){
	
	if($_POST['amount']==""){
		$err++;
		$eamount.="Please insert  amount.";
	   }
	   
	   
	if($_POST['expencetypeid']==0){
		$err++;
		$eexpencetypeid.="Please select one type.";
	   }
	
	  
	  echo $err;
	  
	  if($err==0){
		$efga->Id = $_POST['id'];  
		$efga->Amount = $_POST['amount'];
		$efga->ExpenceGardiantArrangementTypeId = $_POST['expencetypeid'];
		$efga->DayId = $_POST['dayid'];
		$efga->MonthId = $_POST['monthid'];
		$efga->YearId = $_POST['yearid'];
		
		if($efga->Update()){
		$msg.="Update successful.";
		}
		else{
		$msg.=$efga->Err;
		}
	    Redirect("?ad=expenceforgardiantarrangement&msg={$msg}");
	   }
	}
	
	$efga->Id = $_GET['id'];
	$efga->SelectById();

?>
<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
<table width="90%" border="0" align="center">
<h1><center>Expence &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  
  
  
  <tr>
    <td>Amount</td>
    <td><input type="text" name="amount" value="<?php echo $efga->Amount;?>" /></td>
    <td><?php mer($eamount);?></td>
  </tr>
 
  <tr>
    <td>Earn Type</td>
    <td>
     <select name="expencetypeid">
    <option value="0">Select One Type</option>
    <?php
    $r = $efgat->Select();
	SelectedFunction($r, $efga->ExpenceGardiantArrangementTypeId);
	?>
    </select>
    </td>
    <td><?php mer($eexpencetypeid);?></td>
  </tr>
  <tr>
    <td>Day</td>
    <td>
     <select name="dayid">
    <option value="0">Day</option>
    <?php
    $r = $day->Select();
	SelectedFunction($r,$efga->DayId);
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
	SelectedFunction($r,$efga->MonthId);
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
	SelectedFunction($r,$efga->YearId);
	?>
    </select>
    </td>
    <td></td>
  </tr>
  
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Update" /></td>
  </tr>
</table>
</form>



</div>