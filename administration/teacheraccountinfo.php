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
		$t->TeacherId = $_POST['teacherid'];  
		$t->PaidAmount = $_POST['paidamount'];
		$t->TypeTeacherId = $_POST['typeteacherid'];
		$t->DayId = $_POST['dayid'];
		$t->MonthId = $_POST['monthid'];
		$t->YearId = $_POST['yearid'];
		
		if($t->Insert()){
		$msg.="Insert successful.";
		}
		else{
		$msg.=$t->Err;
		}
	  	Redirect("?ad=teacheraccountinfo&msg={$msg}");
	   }
	}

?> 
<form action="" method="post">
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
    <td><input type="text" name="teacherid" /></td>
    <td></td>
  </tr>
 
  
  <tr>
    <td>Amount</td>
    <td><input type="text" name="paidamount" /></td>
    <td><?php mer($eamount);?></td>
  </tr>
 
  <tr>
    <td>Earn Type</td>
    <td>
     <select name="typeteacherid">
    <option value="0">Select One Type</option>
    <?php
    $r = $typeteacher->Select();
	SelectFunction($r);
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
	SelectFunction($r);
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
	SelectFunction($r);
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
	SelectFunction($r);
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

<table width="90%" border="1" align="center">
        <tr>
          <th colspan="9"><center><b>Runing Month</b></center></th>
        </tr>
  
  <tr>
    <td width="52">Delete</td>
    <td width="57">Edit</td>
    <td width="55">Day</td>
    <td width="59">Month</td>
    <td width="44">Year</td>
    <td width="72">Teacher Id</td>
    <td width="199">Name</td>
    <td width="316">Amount Type</td>
    <td width="86">&nbsp;Amount</td>
    
  </tr>
 
 <?php 
 $jan=0;$feb=0;$mar=0;$apr=0;$may=0;$jun=0;$jul=0;$aug=0;$sep=0;$oct=0;$nov=0;$dec=0;
 $totalamount=0;
 $r=$t->Select();
 if($r !==""){
 for($i=0; $i<count($r); $i++){
   
   if($r[$i][3] == date("Y")){
	
	if($i>0){
	 if($r[$i-1][2] == $r[$i][2]){
				  }else{
						 if($r[$i][2] == "January"){
						 echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Total</b></center></td></tr>";
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>January</b></center></td></tr>";
						 
						 }else if($r[$i][2] == "February"){
						  $jan=$totalamount;
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Total
$jan </b></center></td></tr>";
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>February</b></center></td></tr>";
						 }else if($r[$i][2] == "March"){
						  $feb=$totalamount-$jan;
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Total
$feb </b></center></td></tr>";
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>March</b></center></td></tr>";
						
						 }else if($r[$i][2] == "April"){
						$mar=$totalamount-($jan+$feb);
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Total
$mar </b></center></td></tr>";
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>April</b></center></td></tr>";
						
						 }else if($r[$i][2] == "May"){
						  $apr=$totalamount-($jan+$feb+$mar);
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Total
$apr </b></center></td></tr>";
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>May</b></center></td></tr>";
						 }
						 else if($r[$i][2] == "Jun"){
						  $may=$totalamount-($jan+$feb+$mar+$apr);
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Total
$may </b></center></td></tr>";
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Jun</b></center></td></tr>";
						 }
						 else if($r[$i][2] == "July"){
						$jun=$totalamount-($jan+$feb+$mar+$apr+$may);
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Total
$jun </b></center></td></tr>";
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>July</b></center></td></tr>";
						 }
						 else if($r[$i][2] == "August"){
						 $jul=$totalamount-($jan+$feb+$mar+$apr+$may+$jun);
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Total
$jul</b></center></td></tr>";
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>August</b></center></td></tr>";
						 }
						 else if($r[$i][2] == "September"){
						 $aug=$totalamount-($jan+$feb+$mar+$apr+$may+$jun+$jul);
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Total
$aug </b></center></td></tr>";
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>September</b></center></td></tr>";
						 }
						 else if($r[$i][2] == "October"){
					     $sep=$totalamount-($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug);		 
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Total
$sep </b></center></td></tr>";
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>October</b></center></td></tr>";
						 }
						 else if($r[$i][2] == "November"){
						 $oct=$totalamount-($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep);		 	 
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Total
$oct </b></center></td></tr>";
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>November</b></center></td></tr>";
						 }
						 else if($r[$i][2] == "December"){
						 $nov=$totalamount-($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct);		 	
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Total
$nov </b></center></td></tr>";
						echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>December</b></center></td></tr>";
						 }
						 
					 }
				 }

					 
					 
	 $totalamount+=$r[$i][7];
	 echo "<tr>";
	 	
	 	echo "<td><a title='Delete' href='?ad=teacheraccountinfodelete&id=".$r[$i][0]."'><center><img src='icon-images/delete.jpg'  height='22' width='28'/></center></a></td>";
		echo "<td><a title='Edit' href='?ad=teacheraccountinfoedit&id=".$r[$i][0]."'><center><img src='icon-images/edit.jpg'  height='22' width='28'/></center></a></td>";
			
		
		echo "<td>".$r[$i][1]."</td>";
	 	echo "<td>".$r[$i][2]."</td>";
		echo "<td>".$r[$i][3]."</td>";
		echo "<td>".$r[$i][4]."</td>";
		echo "<td>".$r[$i][5]."</td>";
		echo "<td>".$r[$i][6]."</td>";
	 	echo "<td>"."&nbsp;&nbsp;&nbsp;&nbsp;".$r[$i][7]."&nbsp;Tk"."</td>";
		echo "<tr>";
 
 	
    }else{}//end of checking year	
 
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
    <td style="padding:0px 0px 0px 820px;">Total Balance &nbsp;&nbsp;=&nbsp;<?php echo $totalamount."&nbsp;Tk";?>
  </td>
</tr>
  
</table>


</div>