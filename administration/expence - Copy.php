<div class="row no-gutter">
<?php
$expence = new Expence();
$expencetype = new ExpenceType();
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
		$expence->Amount = $_POST['amount'];
		$expence->ExpenceTypeId = $_POST['expencetypeid'];
		$expence->Day = date("D");
		$expence->Month = date ("M");
		$expence->Year = date ("Y");
		
		if($expence->Insert()){
		$msg.="Insert successful.";
		}
		else{
		$msg.=$expence->Err;
		}
		Redirect("?ad=expence&msg={$msg}");
	   }
	}

?>
<form action="" method="post">
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
    <td><input type="text" name="amount" /></td>
    <td><?php mer($eamount);?></td>
  </tr>
 
  <tr>
    <td>Earn Type</td>
    <td>
     <select name="expencetypeid">
    <option value="0">Select One Type</option>
    <?php
    $r = $expencetype->Select();
	SelectFunction($r);
	?>
    </select>
    </td>
    <td><?php mer($eexpencetypeid);?></td>
  </tr>
  
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Insert" /></td>
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
 
 <?php 
 $jan=0;$feb=0;$mar=0;$apr=0;$may=0;$jun=0;$jul=0;$aug=0;$sep=0;$oct=0;$nov=0;$dec=0;
 $totalamount=0;
 $r=$expence->Select();
 if($r !==""){
 for($i=0; $i<count($r); $i++){
	
	if($r[$i][5] == date("Y")){
	
	if($i>0){
	
	if($r[$i-1][4] == $r[$i][4]){
					 }else{
						 if($r[$i][4]=="Jan"){
		echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>January</b></center></td></tr>";
						 }						
						 else if($r[$i][4]=="Feb"){
							 $jan=$totalamount;
						   echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Total 
$jan </b></center></td></tr>";
						   echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Febuary</b></center></td></tr>";
						 }else if($r[$i][4]=="Mar"){
							 $feb=$totalamount-$jan;    
						  echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Total 
$feb </b></center></td></tr>";
						   echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>March</b></center></td></tr>";
						 }else if($r[$i][4]=="Apr"){ 
						     $mar=$totalamount-($jan+$feb);
							 echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Total $mar </b></center></td></tr>";
						   echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>April</b></center></td></tr>";
						 }
						 else if($r[$i][4]=="May"){ 
						     $apr=$totalamount-($jan+$feb+$mar);
							 echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Total 
$apr </b></center></td></tr>";
						   echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>May</b></center></td></tr>";
						 }
						 else if($r[$i][4]=="Jun"){ 
						     $may = $totalamount-($jan+$feb+$mar+$apr);
							 echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Total 
$may </b></center></td></tr>";
						   echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Jun</b></center></td></tr>";
						 }
						 else if($r[$i][4]=="Jul"){ 
						     $jun=$totalamount-($jan+$feb+$mar+$apr+$may);
							 echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Total $jun </b></center></td></tr>";
						   echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>July</b></center></td></tr>";
						 }
						 else if($r[$i][4]=="Aug"){ 
						     $jul=$totalamount-($jan+$feb+$mar+$apr+$may+$jun);
							 echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Total 
$jul </b></center></td></tr>";
						   echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>August</b></center></td></tr>";
						 }
						 else if($r[$i][4]=="Sep"){ 
						     $aug=$totalamount-($jan+$feb+$mar+$apr+$may+$jun+$jul);
							 echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Total 
$aug </b></center></td></tr>";
						   echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>September</b></center></td></tr>";
						 }
						 else if($r[$i][4]=="Oct"){ 
						     $sep=$totalamount-($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug);
							 echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Total 
$sep </b></center></td></tr>";
						   echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>October</b></center></td></tr>";
						 }
						 else if($r[$i][4]=="Nov"){ 
						     $oct=$totalamount-($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep);
							 echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Total 
$oct </b></center></td></tr>";
						   echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>November</b></center></td></tr>";
						 }
						 else if($r[$i][4]=="Dec"){ 
						     $nov=$totalamount-($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct);
							 echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Total 
$nov </b></center></td></tr>";
						   echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>December</b></center></td></tr>";
						 }
				       
					 

					 
					 } //end of second if
					 
				 } //end of first if
		 
	 
	 $totalamount+=$r[$i][1];
	 echo "<tr>";
	 	
	 	echo "<td><a title='Delete' href='?ad=expencedelete&id=".$r[$i][0]."'><center><img src='icon-images/delete.jpg'  height='22' width='28'/></center></a></td>";
		echo "<td><a title='Edit' href='?ad=expenceedit&id=".$r[$i][0]."'><center><img src='icon-images/edit.jpg'  height='22' width='28'/></center></a></td>";
			
		
		echo "<td>".$r[$i][3]."</td>";
	 	echo "<td>".$r[$i][4]."</td>";
		echo "<td>".$r[$i][5]."</td>";
		echo "<td>".$r[$i][2]."</td>";
	 	echo "<td>"."&nbsp;&nbsp;&nbsp;&nbsp;".$r[$i][1]."&nbsp;Tk"."</td>";
		echo "<tr>";
 
 }else{}//end of third if	
 }
 
 }
 ?>
 </tr>
  
  
</table>
  <table width="90%" border="1" align="center">
  <tr style='background: #E1E1E1'>
  <td colspan='10'><b><center>Total<?php echo 
   $dec=$totalamount-($jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov)?> </b></center>
  </td>
  </tr>
  
  <tr>
    <td style="padding:0px 0px 0px 820px;">Total Balance &nbsp;&nbsp;=&nbsp;<?php echo $totalamount."&nbsp;Tk";?></td>
    
  </tr>
  
</table>


</div>