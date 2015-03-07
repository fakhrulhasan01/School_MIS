<div class="row no-gutter">
<?php
$b = new BloodGroup();
$msg="";
$err=0;
$ebloodgroup="";
if(isset($_POST['sub'])){
	if($_POST['bloodgroup']==""){
		$err++;
		$ebloodgroup.="Please insert a bloodgroup name.";
	   }
	   else if(strlen($_POST['bloodgroup'])<2){
	   $err++;
	   $ebloodgroup.="Bloodgroup name must be three character.";
	   }
	   
	   if($err==0){
		$b->Name=$_POST['bloodgroup'];
		if($b->Insert()){
		$msg.="Insert successful.";
		}
		else{
		$msg.=$b->Err;
		}
		Redirect("?a=bloodgroup&msg={$msg}");
	   }
	}

?>
<form action="" method="post">
<table width="50%" border="0" align="center">

<h1><center>Blood Group &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  <tr>
    <td width="111">Blood Group Name</td>
    <td width="210"><input type="text" name="bloodgroup" /></td>
    <td width="284"><?php mer($ebloodgroup);?></td>

  </tr>
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Insert" /></td>
  </tr>
</table>
</form>

<table width="50%" border="1" align="center">
  <tr>
    <td width="95">Bloodgroup name</td>
    <td width="81">Edit</td>
    <td width="56">Delete</td>
  </tr>
 
  <tr>
 <?php 
 $rr=$b->Select();
 Table($rr,"bloodgroup");
 ?>
  </tr>
  
</table>


</div>