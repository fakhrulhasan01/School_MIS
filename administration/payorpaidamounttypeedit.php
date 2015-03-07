<div class="row no-gutter">
<?php
$pp = new PayOrPaidAmountType();
$msg="";
$err=0;
$eclass=0;
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
		$pp->Id = $_POST['id'];   
		$pp->Name=$_POST['p'];
		if($pp->Update()){
		$msg.="Update successful.";
		}
		else{
		$msg.=$pp->Err;
		}
		Redirect("?ad=payorpaidamounttype&msg={$msg}");
	   }
	}
	$pp->Id = $_GET['id'];
	$pp->SelectById();

?>
<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
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
    <td width="210"><input type="text" name="p" value="<?php echo $pp->Name;?>" /></td>
    <td width="284"><?php mer($ep);?></td>

  </tr>
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Update" /></td>
  </tr>
</table>
</form>


</div>