<div class="row no-gutter">
<?php
$pp = new PayOrPaidAmountType();
$msg="";
$err=0;
$ep="";
if(isset($_POST['sub'])){
	if($_POST['p']==""){
		$err++;
		$eclass.="Please insert a  name.";
	   }
	   else if(strlen($_POST['p'])<3){
	   $err++;
	   $eclass.="Name must be three character.";
	   }
	   if($err==0){
		$pp->Name=$_POST['p'];
		if($pp->Insert()){
		$msg.="Insert successful.";
		}
		else{
		$msg.=$pp->Err;
		}
		Redirect("?ad=payorpaidamounttype&msg={$msg}");
	   }
	}

?>
<form action="" method="post">
<table width="80%" border="0" align="center">

<h1><center>PayOrPaidAmountType &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  <tr>
    <td width="111">Name</td>
    <td width="210"><input type="text" name="p" /></td>
    <td width="284"><?php mer($ep);?></td>

  </tr>
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Insert" /></td>
  </tr>
</table>
</form>

<table width="80%" border="1" align="center">
  <tr>
    <td width="95">Name</td>
    <td width="81">Edit</td>
    <td width="56">Delete</td>
  </tr>
 
  <tr>
 <?php 
 $r=$pp->Select();
 Table($r,"payorpaidamounttype");
 ?>
  </tr>
  
</table>


</div>