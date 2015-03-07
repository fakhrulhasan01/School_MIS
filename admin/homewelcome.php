<div class="main_body">
<?php
$hw = new HomeWelcome();
$msg="";
$err=0;
$ename="";
$etype="";
if(isset($_POST['sub'])){
	if($_POST['name']==""){
		$err++;
		$ename.="Please insert a Description name.";
	   }
	   else if(strlen($_POST['name'])<3){
	   $err++;
	   $ename.="Description name must be three character.";
	   }
	
	if(isset($_POST['type'])==""){
		$err++;
		$etype.="Please select a type.";
	   }
	
	
	if($err==0){
		$hw->Name=CreateFile($_POST['name']);
		$hw->Type = $_POST['type'];
		if($hw->Insert()){
		$msg.="Insert successful.";
		}
		else{
		$msg.=$hw->Err;
		}
		Redirect("?a=homewelcome&msg={$msg}");
	   }
	}

?>
<form action="" method="post">
<table width="619" border="0" align="center">

<h1><center>Welcome &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  <tr>
    <td width="139">Welcome Message</td>
    <td width="266"><textarea name="name"></textarea></td>
    <td width="200"><?php mer($ename);?></td>
  </tr>
  
  
  <tr>
    <td width="139">Select Type</td>
    <td width="266">
    <input type="radio" name="type" value="hw" />HomeWelcome
    <input type="radio" name="type" value="w" />Why Staudy In (BISC)
    </td>
    <td width="200"><?php mer($etype);?></td>
  </tr>
  
  <tr>
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Insert" /></td>
  </tr>
</table>
</form>

<table width="861" border="1">
  <tr>
    <td width="724">Welcome Message</td>
    <td width="54">Type</td>
    <td width="54">Edit</td>
    <td width="61">Delete</td>
  </tr>
 
  <tr>
 <?php 
 $r=$hw->Select();
 Table($r,"homewelcome");
 ?>
  </tr>
  
</table>


</div>