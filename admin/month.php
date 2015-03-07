<div class="row no-gutter">
<?php
$m = new Month();
$msg="";
$err=0;
$emonth="";
if(isset($_POST['sub'])){
	if($_POST['month']==""){
		$err++;
		$emonth.="Please insert a month name.";
	   }
	   else if(strlen($_POST['month'])<3){
	   $err++;
	   $eclass.="Month name must be three character.";
	   }
	  
	   if($err==0){
		$m->Name=$_POST['month'];
		if($m->Insert()){
		$msg.="Insert successful.";
		}
		else{
		$msg.=$m->Err;
		}
		Redirect("?a=month&msg={$msg}");
	   }
	}

?>
<form action="" method="post">
<table width="619" border="0" align="center">

<h1><center>Month &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  <tr>
    <td width="111">Month Name</td>
    <td width="210"><input type="text" name="month" /></td>
    <td width="284"><?php mer($emonth);?></td>

  </tr>
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Insert" /></td>
  </tr>
</table>
</form>

<table width="254" border="1">
  <tr>
    <td width="95">Month name</td>
    <td width="81">Edit</td>
    <td width="56">Delete</td>
  </tr>
 
  <tr>
 <?php 
 $r=$m->Select();
 Table($r,"month");
 ?>
  </tr>
  
</table>


</div>