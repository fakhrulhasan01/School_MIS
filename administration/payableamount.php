<div class="row no-gutter">
<?php
$pay = new PayableAmount();
$c = new Classs();
$y = new Year();
$am = new PayOrPaidAmountType();
$sh = new Shift();
$msg="";
$err=0;
$eclassid="";
$eamounttypeid="";
$eyearid="";
$eamount="";
$eshiftid="";


if(isset($_POST['sub'])){
	if($_POST['classid']==""){
		$err++;
		$eclassid.="Please select a class name.";
	   }
	   
	   
	if($_POST['amounttypeid']==""){
		$err++;
		$eamounttypeid.="Please select a Type.";
	   }
	if(isset($_POST['yearid'])==""){
		$err++;
		$eyearid.="Please Select a Year";
		}
	if(isset($_POST['amount'])==""){
		$err++;
		$eamount.="Please Select a amount";
		}

	  
	  echo $err;
	  
	  if($err==0){
		$pay->ClassId = $_POST['classid'];
		$pay->YearId = $_POST['yearid'];
		$pay->ShiftId = $_POST['shiftid'];
		$pay->PayOrPaidAmountTypeId = $_POST['amounttypeid'];
		$pay->Amount = $_POST['amount'];
		$pay->Date = date("D-M-Y");
		
		if($pay->Insert()){
		$msg.="Insert successful.";
		}
		else{
		$msg.=$pay->Err;
		}
		Redirect("?ad=PayableAmount&msg={$msg}");
	   }
	}

?>
<form action="" method="post">
<table width="619" border="0" align="center">

<h1><center>Payable Amount &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  
  
  
  <tr>
    <td>Class Name</td>
    <td>
    <select name="classid">
    <option value="0">Select One Class Name</option>
    <?php
    $r = $c->Select();
	SelectFunction($r);
	?>
    </select>
    </td>
    <td><?php mer($eclassid);?></td>
  </tr>
  <tr>
    <td>Year Name</td>
    <td>
    <select name="yearid">
    <option value="0">Select One Class Name</option>
    <?php
    $r = $y->Select();
	SelectFunction($r);
	?>
    </select>
    </td>
    <td><?php mer($eyearid);?></td>
  </tr>
  
  
  
  <tr>
    <td>Shift Name</td>
    <td>
    <select name="shiftid">
    <option value="0">Select One Shift Name</option>
    <?php
    $r = $sh->Select();
	SelectFunction($r);
	?>
    </select>
    </td>
    <td><?php mer($eshiftid);?></td>
  </tr>
  
  <tr>
    <td>Amount Type</td>
    <td>
    <select name="amounttypeid">
    <option value="0">Select One Amount Type</option>
    <?php
    $r = $am->Select();
	SelectFunction($r);
	?>
    </select>
    </td>
    <td><?php mer($eamounttypeid);?></td>
  </tr>
  
  <tr>
    <td width="111">Amount</td>
    <td width="210"><input type="text" name="amount" /></td>
    <td width="284"><?php mer($eamount);?></td>
  </tr>
  
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Insert" /></td>
  </tr>
</table>
</form>

<table width="90%" border="1" align="center">
  <tr>
    
    
    <td width="55">Delete</td>
    <td width="51">Edit</td>
    <td width="79">Date</td>
    <td width="94">Class Name</td>
    <td width="85">Year Name</td>
    <td width="114">Shift Name</td>
    <td width="376">Amount Type</td>
    <td width="94">&nbsp;Amount</td>
    
  </tr>
 <tr>
  
 <?php 
 $totalamount=0;
 $r=$pay->Select();
 if($r !==""){
 for($i=0; $i<count($r); $i++){
	 $totalamount+=$r[$i][4];
	 echo "<tr>";
	 	
	echo "<td><a title='Delete' href='?ad=payableamountedit
	&classid=".$r[$i][6]."
	&yearid=".$r[$i][7]."
	&shiftidid=".$r[$i][8]."'>
	<center><img src='icon-images/delete.jpg'  height='22' width='28'/></center></a></td>";
	echo "<td><a title='Edit' href='?ad=payableamountedit
	&classid=".$r[$i][6]."
	&yearid=".$r[$i][7]."
	&shiftid=".$r[$i][8]."'>
	<center><img src='icon-images/edit.jpg'  height='22' width='28'/></center></a></td>";
			
		
		echo "<td>".$r[$i][5]."</td>";
	 	echo "<td>".$r[$i][0]."</td>";
		echo "<td>".$r[$i][1]."</td>";
		echo "<td>".$r[$i][2]."</td>";
		echo "<td>".$r[$i][3]."</td>";
	 	echo "<td>"."&nbsp;&nbsp;&nbsp;&nbsp;".$r[$i][4]."&nbsp;Tk"."</td>";
		echo "<tr>";
 }}
 ?>
 </tr>
  
  
</table>
  <table width="90%" border="1" align="center">
  <tr>
    <td style="padding:0px 0px 0px 820px;">Total Balance &nbsp;&nbsp;=&nbsp;<?php echo $totalamount."&nbsp;Tk";?></td>
    
  </tr>
  
</table>


</div>