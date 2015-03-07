<div class="row no-gutter">
<?php
$earn = new Earn();
$earntype = new EarnType();
$day = new Day();
$month = new Month();
$year = new Year();
$msg="";
$err=0;
$eamount="";
$eearntypeid="";


if(isset($_POST['sub'])){
	
	if($_POST['amount']==""){
		$err++;
		$eamount.="Please insert  amount.";
	   }
	   
	   
	if($_POST['earntypeid']==0){
		$err++;
		$eearntypeid.="Please select one type.";
	   }
	
	  
	  echo $err;
	  
	  if($err==0){
		$earn->Id = $_POST['id'];  
		$earn->Amount = $_POST['amount'];
		$earn->EarnTypeId = $_POST['earntypeid'];
		$earn->DayId = $_POST['dayid'];
		$earn->MonthId = $_POST['monthid'];
		$earn->YearId = $_POST['yearid'];
		
		if($earn->Update()){
		$msg.="Update successful.";
		}
		else{
		$msg.=$earn->Err;
		}
	  	Redirect("?ad=earn&msg={$msg}");
	   }
	}
	
	$earn->Id = $_GET['id'];
	$earn->SelectById();

?> 
<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
<table width="90%" border="0" align="center">

<h1><center>Earn &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  
  
  
  <tr>
    <td>Amount</td>
    <td><input type="text" name="amount" value="<?php echo $earn->Amount; ?>" /></td>
    <td><?php mer($eamount);?></td>
  </tr>
 
  <tr>
    <td>Earn Type</td>
    <td>
     <select name="earntypeid">
    <option value="0">Select One Type</option>
    <?php
    $r = $earntype->Select();
	SelectedFunction($r,$earn->EarnTypeId);
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
	SelectedFunction($r,$earn->DayId);
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
	SelectedFunction($r,$earn->MonthId);
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
	SelectedFunction($r,$earn->YearId);
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