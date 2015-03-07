<div class="row no-gutter">
Student Payment Ledger<br>
SSL school<br>
<?php
$pa = new PaidAmount();
$y = new Year();
$eyearid="";
$totalpaidamount=0; //for count total payableamount and paid amount
$totalpayableamount=0;
?>
  <tr>
    <td>Year</td>
    <td>
    <select name="yearid">
    <option value="0">All</option>
    <?php
    $r = $y->Select();
	SelectFunction($r);
	?>
    </select>
    </td>
    <td><?php mer($eyearid);?></td>
  </tr>

<table width="90%" border="1">
  <tr>
    <td width="7%">Student Id</td>
    <td width="8%">Class name</td>
    <td width="9%">Year Name</td>
    <td width="8%">Shift name</td>
    <td width="10%">Section Name</td>
    <td width="6%">SlNo</td>
    <td width="10%">Date</td>
    <td width="34%">Payment Type</td>
    <td width="8%">Amount</td>
    
    
  </tr>
  
  <tr>
 <?php 
 $pa->StudentId=$_SESSION['stid'];
 $r=$pa->Select();
 if($r !==""){
 for($i=0; $i<count($r); $i++){
	 $totalpaidamount += $r[$i][6];
	 echo "<tr>";
	 	echo "<td>".$r[$i][0]."</td>";
	 	echo "<td>".$r[$i][1]."</td>";
		echo "<td>".$r[$i][2]."</td>";
		echo "<td>".$r[$i][3]."</td>";
		echo "<td>".$r[$i][4]."</td>";
		echo "<td>".$r[$i][8]."</td>";
		echo "<td>".$r[$i][7]."</td>";
		echo "<td>".$r[$i][5]."</td>";
		echo "<td>".$r[$i][6]."</td>";
	  echo "</tr>";
 }
 }

 ?>
 
  </tr>
  
  
  
</table>
<div id="accountinfo">
<p>paid Amount&nbsp;=<?php echo $totalpaidamount;?></p>
<p>Payable Amount
<?php 
$pay = new PayableAmount();
$st = new Student();
$st->UserId = $_SESSION['stid'];
$st->SelectById();
$pay->ClassId = $st->ClassId;
$r = $pay->Select1();
if($r != ""){
	for($i=0; $i<count($r); $i++){
      $totalpayableamount = $r[$i][0];
	 echo "<td>".$r[$i][0]."</td>";
	 echo "<br/>";
	}
}
?>
<p>
<?php 
$waiver=0;
$w = new Waiver();
$w->StudentId = $_SESSION['stid'];
$r= $w->Select();
if($r !=""){
	for($i=0; $i<count($r); $i++){
		
		echo "<td>"."waiver=".$waiver=(($totalpayableamount*($r[$i][0]))/100)."</td>";
		
		}
	
	}
?>
<p>balance due&nbsp;=<?php echo $totalpayableamount-($waiver+$totalpaidamount); ?></p>

</p>

</div>
</div>