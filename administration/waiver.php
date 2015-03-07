<div class="row no-gutter">
<?php
$w = new Waiver();
$msg="";
$err=0;
$euserid="";
$epersent="";
if(isset($_POST['sub'])){
	if($_POST['studentid']==""){
		$err++;
		$ename.="Please insert a user id.";
	   }
	   else if(strlen($_POST['studentid'])<3){
	   $err++;
	   $ename.="User Id length must be 3";
	   }
	   
	   if($_POST['persent']==""){
		$err++;
		$elink.="Please insert persent.";
	   }
	   else if(strlen($_POST['persent'])<2){
	   $err++;
	   $elink.="persent  must be two character.";
	   }
	  
	  echo $err;
	  
	  if($err==0){
		$w->StudentId=$_POST['studentid'];
		$w->Persent=$_POST['persent'];
		
		if($w->Insert()){
		$msg.="Insert successful.";
		}
		else{
		$msg.=$w->Err;
		}
		Redirect("?ad=waiver&msg={$msg}");
	   }
	}

?>
<form action="" method="post">
<table width="619" border="0" align="center">

<h1><center>Waiver &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  
  <tr>
    <td width="111">StudentId</td>
    <td width="210"><input type="text" name="studentid" /></td>
    <td width="284"><?php mer($euserid);?></td>

  </tr>
  
  <tr>
    <td width="111">Persent</td>
    <td width="210"><input type="text" name="persent" /></td>
    <td width="284"><?php mer($epersent);?></td>

  </tr>
  
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Insert" /></td>
  </tr>
</table>
</form>

<table width="625" border="1" align="center">
  <tr>
    <td width="218">StudentId</td>
    <td width="283">Persent</td>
    <td width="51">Edit</td>
    <td width="45">Delete</td>
  </tr>
 
  <tr>
 <?php 
 $r=$w->Select();
 Table($r,"waiver");
 ?>
  </tr>
  
</table>


</div>