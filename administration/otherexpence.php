<div class="row no-gutter">
<?php
$oex = new OtherExpence();
$msg="";
$err=0;
$eamount="";
$eexpence="";


if(isset($_POST['sub'])){
	
	if($_POST['amount']==""){
		$err++;
		$eamount.="Please insert  amount.";
	   }
	   
	   
	if($_POST['forexpence']==""){
		$err++;
		$eexpence.="Please insert rison.";
	   }
	
	  
	  echo $err;
	  
	  if($err==0){
		$oex->Amount = $_POST['amount'];
		$oex->ForExpence = $_POST['forexpence'];
		$oex->Day = date("D");
		$oex->Month = date ("M");
		$oex->Year = date ("Y");
		
		if($oex->Insert()){
		$msg.="Insert successful.";
		}
		else{
		$msg.=$oex->Err;
		}
		Redirect("?ad=otherexpence&msg={$msg}");
	   }
	}

?>
<form action="" method="post">
<table width="90%" border="0" align="center">

<h1><center>Other Expence &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  
  
  
  <tr>
    <td>Amount</td>
    <td><input type="tel" name="amount" /></td>
    <td><?php mer($eamount);?></td>
  </tr>
 
  <tr>
    <td width="111">For Expence</td>
    <td width="210"><textarea name="forexpence"></textarea></td>
    <td width="284"><?php mer($eexpence);?></td>
  </tr>
  
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Insert" /></td>
  </tr>
</table>
</form>

<table width="90%" border="1" align="center">
  <tr>
    <td width="218">Amount</td>
    <td width="283">Eor Expence</td>
    <td width="51">Day</td>
    <td width="51">Month</td>
    <td width="51">Year</td>
    <td width="45">Edit</td>
    <td width="45">Delete</td>
  </tr>
 
  <tr>
 <?php 
 $r=$oex->Select();
 Table($r,"otherexpence");
 ?>
  </tr>
  
</table>


</div>