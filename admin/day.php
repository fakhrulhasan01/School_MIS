<div class="row no-gutter">
<?php
$d = new Day();
$msg="";
$err=0;
$eday="";
if(isset($_POST['sub'])){
	if($_POST['day']==""){
		$err++;
		$eclass.="Please insert a day name.";
	   }
	   
	   if($err==0){
		$d->Name=$_POST['day'];
		if($d->Insert()){
		$msg.="Insert successful.";
		}
		else{
		$msg.=$d->Err;
		}
		Redirect("?a=day&msg={$msg}");
	   }
	}

?>
<form action="" method="post">
<table width="619" border="0" align="center">

<h1><center>Day &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  <tr>
    <td width="111">Day Name</td>
    <td width="210"><input type="text" name="day" /></td>
    <td width="284"><?php mer($eday);?></td>

  </tr>
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Insert" /></td>
  </tr>
</table>
</form>

<table width="254" border="1">
  <tr>
    <td width="95">Day name</td>
    <td width="81">Edit</td>
    <td width="56">Delete</td>
  </tr>
 
  <tr>
 <?php 
 $r=$d->Select();
 Table($r,"day");
 ?>
  </tr>
  
</table>


</div>