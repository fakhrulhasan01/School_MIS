<div class="main_body">
<?php
$y = new Year();
$msg="";
$err=0;
$eyear="";
if(isset($_POST['sub'])){
	if($_POST['year']==""){
		$err++;
		$eyear.="Please insert a year name.";
	   }
	   else if(strlen($_POST['year'])<3){
	   $err++;
	   $eyear.="Year name must be three character.";
	   }
	   if($err==0){
		$y->Id = $_POST['id'];
		$y->Name = $_POST['year'];
		if($y->Update()){
		$msg.="Update successful.";
		}
		else{
		$msg.=$y->Err;
		}
		Redirect("?a=year&msg={$msg}");
	   }
	}
	$y->Id = $_GET['id'];
	$y->SelectById();

?>
<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
<table width="619" border="0" align="center">

<h1><center>Year &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  <tr>
    <td width="111">Year Name</td>
    <td width="210"><input type="text" name="year" value="<?php echo $y->Name;?>" /></td>
    <td width="284"><?php mer($eyear);?></td>

  </tr>
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Update" /></td>
  </tr>
</table>
</form>


</div>