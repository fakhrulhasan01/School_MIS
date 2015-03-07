<div class="row no-gutter">
<?php
$expenceforpublish = new ExpenceForPublish();
$expenceforpublishtype = new ExpenceForPublishType();
$day = new Day();
$month = new Month();
$year = new Year();
$msg="";
$err=0;
$eamount="";
$eexpenceforpublishtypeid="";


if(isset($_POST['sub'])){
	
	if($_POST['amount']==""){
		$err++;
		$eamount.="Please insert  amount.";
	   }
	   
	   
	if($_POST['expenceforpublishtypeid']==0){
		$err++;
		$eexpenceforpublishtypeid.="Please select one type.";
	   }
	
	  
	  echo $err;
	  
	  if($err==0){
		$expenceforpublish->Id = $_POST['id'];  
		$expenceforpublish->Amount = $_POST['amount'];
		$expenceforpublish->ExpenceForPublishTypeId = $_POST['expenceforpublishtypeid'];
		$expenceforpublish->DayId = $_POST['dayid'];
		$expenceforpublish->MonthId = $_POST['monthid'];
		$expenceforpublish->YearId = $_POST['yearid'];
		
		if($expenceforpublish->Update()){
		$msg.="Update successful.";
		}
		else{
		$msg.=$expenceforpublish->Err;
		}
		Redirect("?ad=expenceforpublish&msg={$msg}");
	   }
	}
	$expenceforpublish->Id = $_GET['id'];
	$expenceforpublish->SelectById();
	

?>
<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
<table width="90%" border="0" align="center">

<h1><center>Expence For Publish &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  
  
  
  <tr>
    <td>Amount</td>
    <td><input type="text" name="amount" value="<?php echo $expenceforpublish->Amount;?>" /></td>
    <td><?php mer($eamount);?></td>
  </tr>
 
  <tr>
    <td>Earn Type</td>
    <td>
     <select name="expenceforpublishtypeid">
    <option value="0">Select One Type</option>
    <?php
    $r = $expenceforpublishtype->Select();
	SelectedFunction($r,$expenceforpublish->ExpenceForPublishTypeId);
	?>
    </select>
    </td>
    <td><?php mer($eexpenceforpublishtypeid);?></td>
  </tr>
  <tr>
    <td>Day</td>
    <td>
     <select name="dayid">
    <option value="0">Day</option>
    <?php
    $r = $day->Select();
	SelectedFunction($r,$expenceforpublish->DayId);
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
	SelectedFunction($r, $expenceforpublish->MonthId);
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
	SelectedFunction($r, $expenceforpublish->YearId);
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
<table width="90%" border="1" align="center">
  <tr>
    
    
    <td width="58">Delete</td>
    <td width="72">Edit</td>
    <td width="69">Day</td>
    <td width="76">Month</td>
    <td width="118">Year</td>
    <td width="467">Amount Type</td>
    <td width="94">&nbsp;Amount</td>
    
  </tr>
 <tr>
  
 <?php 
  $jan=0;$feb=0;$mar=0;$apr=0;$may=0;$jun=0;$jul=0;$aug=0;$sep=0;$oct=0;$nov=0;$dec=0;
 $totalamount=0;
 $r=$expenceforpublish->Select();
 if($r !==""){
 for($i=0; $i<count($r); $i++){
	 if($r[$i][5] == date("Y")){ 
	 if($i>0){
	 if($r[$i-1][4] == $r[$i][4]){
				  }else{
						 if($r[$i][4] == "January"){
						 echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Total</b></center></td></tr>";
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>January</b></center></td></tr>";
						 
						 }else if($r[$i][4] == "February"){
						  $jan=$totalamount;
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Total
$jan </b></center></td></tr>";
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>February</b></center></td></tr>";
						 }else if($r[$i][4] == "March"){
						  $feb=$totalamount-$jan;
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Total
$feb </b></center></td></tr>";
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>March</b></center></td></tr>";
						
						 }else if($r[$i][4] == "April"){
						$mar=$totalamount-($jan+$feb);
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Total
$mar </b></center></td></tr>";
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>April</b></center></td></tr>";
						
						 }else if($r[$i][4] == "May"){
						  $apr=$totalamount-($jan+$feb+$mar);
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Total
$apr </b></center></td></tr>";
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>May</b></center></td></tr>";
						 }
						 else if($r[$i][4] == "Jun"){
						  $may=$totalamount-($jan+$feb+$mar+$apr);
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Total
$may </b></center></td></tr>";
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Jun</b></center></td></tr>";
						 }
						 else if($r[$i][4] == "July"){
						$jun=$totalamount-($jan+$feb+$mar+$apr+$may);
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Total
$jun </b></center></td></tr>";
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>July</b></center></td></tr>";
						 }
						 else if($r[$i][4] == "August"){
						 $jul=$totalamount-($jan+$feb+$mar+$apr+$may+$jun);
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Total
$jul</b></center></td></tr>";
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>August</b></center></td></tr>";
						 }
						 else if($r[$i][4] == "September"){
						 $aug=$totalamount-($jan+$feb+$mar+$apr+$may+$jun+$jul);
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Total
$aug </b></center></td></tr>";
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>September</b></center></td></tr>";
						 }
						 else if($r[$i][4] == "October"){
					     $sep=$totalamount-($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug);		 
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Total
$sep </b></center></td></tr>";
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>October</b></center></td></tr>";
						 }
						 else if($r[$i][4] == "November"){
						 $oct=$totalamount-($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep);		 	 
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Total
$oct </b></center></td></tr>";
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>November</b></center></td></tr>";
						 }
						 else if($r[$i][4] == "December"){
						 $nov=$totalamount-($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct);		 	
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Total
$nov </b></center></td></tr>";
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>December</b></center></td></tr>";
						 }
						 
					 }
				 }

	
	 
	 
	 
	 
	 $totalamount+=$r[$i][1];
	 echo "<tr>";
	 	echo "<td><a title='Delete' href='ad=expenceforpublishdelete&id=".$r[$i][0]."'><center><img src='icon-images/delete.jpg'  height='22' width='28'/></center></a></td>";
		echo "<td><a title='Edit' href='?ad=expenceforpublishedit&id=".$r[$i][0]."'><center><img src='icon-images/edit.jpg'  height='22' width='28'/></center></a></td>";
			
		
		echo "<td>".$r[$i][3]."</td>";
	 	echo "<td>".$r[$i][4]."</td>";
		echo "<td>".$r[$i][5]."</td>";
		echo "<td>".$r[$i][2]."</td>";
	 	echo "<td>"."&nbsp;&nbsp;&nbsp;&nbsp;".$r[$i][1]."&nbsp;Tk"."</td>";
		echo "<tr>";
 
	 }else{}//end check year 
 
     }
 
 
 }
 
 ?>
 
 </tr>
  
  
</table>
  <table width="90%" border="1" align="center">
   <?php
   $dec=$totalamount-($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov);	
    ?>
	<tr style='background: #E1E1E1'>
         <td colspan='10'>
         <b><center>Total<?php echo $dec; ?></b></center>
         </td>
    </tr>
  
  <tr>
    <td style="padding:0px 0px 0px 820px;">Total Balance &nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;<?php echo $totalamount."&nbsp;Tk";?></td>
    
  </tr>
  
</table>


 
 
</div>