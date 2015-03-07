<div class="row no-gutter">
<style type="text/css">

#tr_desigine1{
	height:30px;
	width:100%;
	background-color:#D4D4D4;
	float:left;
	position:relative;
	margin:3px; 0px 0px 5px;
}

#tr_desigine2{
	height:30px;
	width:100%;
	background-color:#66FFCC;
	float:left;
	position:relative;
}
</style>
<?php 
$y =  new Year();
$m = new Month();
$d = new Day();
?>
<form action="" method="post">

<table width="100%" border="1">
  <tr>
   <td width="13%">
    <select name="yearid">
    <option value="0">Select Year Name</option>
    <?php
    $r = $y->Select();
	SelectFunction($r);
	?>
    </select>
   </td>
  
  <td width="11%">
  <select name="monthid">
  <option value="0">Select Month</option>
  <?php 
  $r = $m->Select();
  SelectFunction($r);
  ?>
  </select>
  </td>
  
  <td width="11%">
  <select name="dayid">
  <option value="0">Select Day</option>
  <?php 
  $r = $d->Select();
  SelectFunction($r);
  ?>
  </select>
  </td>
  
  
  <td>  
  <input type="submit" name="search" value="Search" /> 
  </td>
  
  
  </tr>
  
  </table>
</form>

<?php if(isset($_POST['search'])){?>

<div class="left_col_photogallary_details_header">
<h1><center>Oxford International School</center></h1>
<h3><center>Dr. Nawab Ali Tower </center></h3>
<center>Receipt and Payment </center>
</div>
</br>
<div class="row small k-equal-height">
<table class="table"> 
 <tr class="info">
     <td width="73">Recepts</td>
    <td width="314">Particulars</td>
    <td width="73">Amount(in BDT)</td>
    <td width="90" style="padding:0px 0px 0px 0px;">Amount(in BDT)</td>
  </tr>

 
  <tr class="success">
  <td width="73">Opening</td>
    <td width="314">Total Earn From Student</td>
    <td width="73"></td>
    <td width="90" style="text-align:right;">
     <?php
	$totalpaidamountstudent=0;
	$totalearnother=0;
	$sumtotalearn=0;
	$paid = new PaidAmount();
	
	if(isset($_POST['search'])){
		if($_POST['yearid'] !=""){
		$paid->YearId = $_POST['yearid'];
		}
		if($_POST['monthid'] >0){
		$paid->MonthId = $_POST['monthid'];
		}
		if($_POST['dayid'] >0){
		$paid->DayId = $_POST['dayid'];
		}
	  $r=$paid->SelectAmount();
	  if($r !=""){
		 
		  for($i=0; $i<count($r); $i++){
			   $totalpaidamountstudent += $r[$i][1];
			  echo round($totalpaidamountstudent,2);
		  }
	  }
	}

 ?>
    </td>
  
  </tr>
  
  <tr class="danger">
  <td width="73">Opening</td>
    <td width="314">Total Earn from Other</td>
    <td width="73"></td>
    <td width="90" style="text-align:right;">
     <?php
	$oen = new Earn();
	if(isset($_POST['search'])){
		if($_POST['yearid'] !=""){
		$oen->YearId = $_POST['yearid'];
		}
		if($_POST['monthid'] >0){
		$oen->MonthId = $_POST['monthid'];
		}
		if($_POST['dayid'] >0){
		$oen->DayId = $_POST['dayid'];
		}
	  $r=$oen->SelectAmount();
	  if($r !=""){
		   
		  for($i=0; $i<count($r); $i++){
			  $totalearnother += $r[$i][1];
			  echo $r[$i][1];
		  }
	  }
	}
	 ?>
    </td>
  
  </tr>
  
  
   <tr>
    <td width="73">Total Earn</td>
    <td width="314"></td>
    <td width="73"></td>
    <td width="90" Style="color:black;font-size: 20px; text-align:right;">
	<?php echo $sumtotalearn= ($totalpaidamountstudent+$totalearnother);?></td>
  </tr>
  
  
  
  <tr class="success">
    <td width="73">Opening</td>
    <td width="314">Expence For Teacher</td>
    <td width="73"></td>
    <td width="90" style="text-align:right;">
	<?php 
	$totalexpenceteacher=0;
	$totalexpenceother=0;
	$sumtotalexpence=0;
	$t = new TeacherAccountInfo();
	if(isset($_POST['search'])){
		
		if($_POST['yearid'] != ""){
		$t->YearId = $_POST['yearid'];
		}
		if($_POST['monthid'] >0){
		$t->MonthId = $_POST['monthid'];
		}
		if($_POST['dayid'] >0){
		$t->DayId = $_POST['dayid'];
		}
		
	$r=$t->SelectAmount();
	if($r !=""){
		for($i=0; $i<count($r); $i++){
			$totalexpenceteacher += $r[$i][1];
			echo $r[$i][1];
			}
		}
	}
	?></td>
  
  </tr>
  
  
  <tr class="danger">
  <td width="73">Opening</td>
    <td width="314">Expence For Other</td>
    <td width="73"></td>
    <td width="90" style="text-align:right;">
    <?php
    $oe =new Expence();
	if(isset($_POST['search'])){
		
		if($_POST['yearid'] != ""){
		$oe->YearId = $_POST['yearid'];
		}
		if($_POST['monthid'] >0){
		$oe->MonthId = $_POST['monthid'];
		}
		if($_POST['dayid'] >0){
		$oe->DayId = $_POST['dayid'];
		}

	
	$r=$oe->SelectAmount();
	if($r !=""){
		for($i=0; $i<count($r); $i++){
			$totalexpenceother += $r[$i][1];
			echo round($totalexpenceother,2);
			}
		}
	}
	?>
    </td>
  
  </tr>
  
   <tr class="success">
    <td width="73">Opening</td>
    <td width="314">Expence For Publish</td>
    <td width="73"></td>
    <td width="90" style="text-align:right;">
	
	<?php
    $pub =new ExpenceForPublish();
	if(isset($_POST['search']) !=""){
	
	if($_POST['yearid'] !=""){
	$pub->YearId = $_POST['yearid'];
	}
	if($_POST['monthid'] >0){
	$pub->MonthId = $_POST['monthid'];
	}
	if($_POST['dayid'] >0){
	$pub->DayId = $_POST['dayid'];
	}
	
	
	$r=$pub->SelectAmount();
	if($r !=""){
		for($i=0; $i<count($r); $i++){
			$totalexpenceother += $r[$i][1];
			echo $r[$i][1];
			}
		}
	}
	?></td>
  
  </tr>
  
    <tr class="danger">
  <td width="73">Opening</td>
    <td width="314">Expence For Gardian ArrangeMent</td>
    <td width="73"></td>
    <td width="90" style="text-align:right; height:10px;">
    <?php
    $pubg =new ExpenceForGardiantArrangement();
	if(isset($_POST['search']) !=""){
	
	if($_POST['yearid'] !=""){
	$pubg->YearId = $_POST['yearid'];
	}
	if($_POST['monthid'] >0){
	$pubg->MonthId = $_POST['monthid'];
	}
	if($_POST['dayid'] >0){
	$pubg->DayId = $_POST['dayid'];
	}
	
	$r=$pubg->SelectAmount();
	if($r !=""){
		for($i=0; $i<count($r); $i++){
			$totalexpenceother += $r[$i][1];
			echo $r[$i][1];
			}
		}
	}
	?>
    </td>
  
  </tr>
  
  
  <tr>
    <td width="73">Total Expence</td>
    <td width="314"></td>
    <td width="73"></td>
    <td width="90" Style="color:black;font-size: 20px; text-align:right;">
	<?php echo $sumtotalexpence =($totalexpenceteacher+$totalexpenceother); ?></td>
  </tr>
  
  <tr class="info">
     <td width="73">Total</td>
    <td width="314">Balance</td>
    
    <td width="73">
    <?php
    $subtotal=$sumtotalearn-$sumtotalexpence;
	if($sumtotalearn>$sumtotalexpence){
	   echo "Profite";
	   }
	   else{
	   echo "Due";
	   }
	?>
    </td>
	<td width="90" Style="color:black;font-size: 20px; text-align:right;">
	<?php 
	 
	 if($sumtotalearn>$sumtotalexpence){
		echo $subtotal;
		}else{
		echo $subtotal;
		}
	 ?>
	</td>
  </tr>
  
  
</table>


</div>





<?php }?>
</div>