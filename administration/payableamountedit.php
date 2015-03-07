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
	if($_POST['yearid']==""){
		$err++;
		$eyearid.="Please Select a Year";
		}
	if($_POST['amount']==""){
		$err++;
		$eamount.="Please Select a amount";
		}

	  
	  echo $err;
	  
	  if($err == 0){  
		$pay->ClassId = $_POST['classid'];
		$pay->YearId = $_POST['yearid'];
		$pay->ShiftId = $_POST['shiftid'];
		$pay->PayOrPaidAmountTypeId = $_POST['amounttypeid'];
		$pay->Amount = $_POST['amount'];
		$pay->Date = date("D-M-Y");
		
		
		echo $_POST["up-classid"];
		echo "<br />";
		if($pay->Update($_POST["up-classid"], $_POST["up-yearid"], $_POST["up-shiftid"])){
		$msg.="Update successful.";
		}
		else{
		$msg.=$pay->Err;
		}
		Redirect("?ad=payableamount&msg={$msg}");
	   }
	}
	$pay->ClassId = $_GET['classid'];
	$pay->YearId = $_GET['yearid'];
	$pay->ShiftId = $_GET['shiftid'];
	
	$pay->SelectById();

?>
<form action="" method="post">
<input type="hidden" name="up-classid" value="<?php echo $_GET['classid'];?>" />
<input type="hidden" name="up-yearid" value="<?php echo $_GET['yearid'];?>" />
<input type="hidden" name="up-shiftid" value="<?php echo $_GET['shiftid'];?>" />
<table width="90%" border="0" align="center">

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
	SelectedFunction($r,$pay->ClassId);
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
	SelectedFunction($r,$pay->YearId);
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
	SelectedFunction($r,$pay->ShiftId);
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
	SelectedFunction($r,$pay->PayOrPaidAmountTypeId);
	?>
    </select>
    </td>
    <td><?php mer($eamounttypeid);?></td>
  </tr>
  
  <tr>
    <td width="111">Amount</td>
    <td width="210"><input type="text" name="amount" value="<?php echo $pay->Amount;?>" /></td>
    <td width="284"><?php mer($eamount);?></td>
  </tr>
  
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Update" /></td>
  </tr>
</table>
</form>



</div>