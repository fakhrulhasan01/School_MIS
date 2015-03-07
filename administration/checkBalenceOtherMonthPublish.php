<div class="row no-gutter">

<?php 
$expenceforpublish = new ExpenceForPublish();
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
<?php
if(isset($_POST['search'])){
?>
<table width="90%" border="1" align="center">
        
        <tr>
          <th colspan="9"><center><b>Runing Month</b></center></th>
        </tr>
  
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
 
 if($_POST['yearid'] != ""){
 $expenceforpublish->YearId = $_POST['yearid'];
 }
 
 if($_POST['monthid'] > 0){
 $expenceforpublish->MonthId = $_POST['monthid'];
 }
 
 if($_POST['dayid'] > 0){
 $expenceforpublish->DayId = $_POST['dayid'];
 }
 
 
 $r=$expenceforpublish->Select();
 if($r !==""){
 for($i=0; $i<count($r); $i++){
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
	 	echo "<td><a title='Delete' href='?ad=expenceforpublishdelete&id=".$r[$i][0]."'><center><img src='icon-images/delete.jpg'  height='22' width='28'/></center></a></td>";
		echo "<td><a title='Edit' href='?ad=expenceforpublishedit&id=".$r[$i][0]."'><center><img src='icon-images/edit.jpg'  height='22' width='28'/></center></a></td>";
			
		
		echo "<td>".$r[$i][3]."</td>";
	 	echo "<td>".$r[$i][4]."</td>";
		echo "<td>".$r[$i][5]."</td>";
		echo "<td>".$r[$i][2]."</td>";
	 	echo "<td>"."&nbsp;&nbsp;&nbsp;&nbsp;".$r[$i][1]."&nbsp;Tk"."</td>";
		echo "<tr>";
 
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
<?php }?>


</div>