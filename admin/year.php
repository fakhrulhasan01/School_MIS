<div class="row no-gutter">
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
		$y->Name=$_POST['year'];
		if($y->Insert()){
		$msg.="Insert successful.";
		}
		else{
		$msg.=$y->Err;
		}
		Redirect("?a=year&msg={$msg}");
	   }
	}

?>
<form action="" method="post">
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
    <td width="210"><input type="text" name="year" /></td>
    <td width="284"><?php mer($eyear);?></td>

  </tr>
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Insert" /></td>
  </tr>
</table>
</form>

<table width="254" border="1">
  <tr>
    <td width="95">Year Name</td>
    <td width="81">Edit</td>
    <td width="56">Delete</td>
  </tr>
 
  <tr>
 <?php 
 $r=$y->Select();
 Table($r,"year");
 ?>
  </tr>
  
</table>


</div>