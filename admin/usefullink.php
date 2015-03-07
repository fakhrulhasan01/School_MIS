<div class="row no-gutter">
<?php
$ul = new Usefullink();
$msg="";
$err=0;
$ename="";
$elink="";
if(isset($_POST['sub'])){
	if($_POST['name']==""){
		$err++;
		$ename.="Please insert a link name.";
	   }
	   else if(strlen($_POST['name'])<3){
	   $err++;
	   $ename.="Link name must be three character.";
	   }
	   
	   if($_POST['link']==""){
		$err++;
		$elink.="Please insert a link.";
	   }
	   else if(strlen($_POST['link'])<3){
	   $err++;
	   $elink.="Link  must be three character.";
	   }
	  
	  echo $err;
	  
	  if($err==0){
		$ul->Name=$_POST['name'];
		$ul->Link=$_POST['link'];
		
		if($ul->Insert()){
		$msg.="Insert successful.";
		}
		else{
		$msg.=$ul->Err;
		}
		Redirect("?a=usefullink&msg={$msg}");
	   }
	}

?>
<form action="" method="post">
<table width="619" border="0" align="center">

<h1><center>Link &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  
  <tr>
    <td width="111">Name</td>
    <td width="210"><input type="text" name="name" /></td>
    <td width="284"><?php mer($ename);?></td>

  </tr>
  
  <tr>
    <td width="111">Link</td>
    <td width="210"><input type="text" name="link" /></td>
    <td width="284"><?php mer($elink);?></td>

  </tr>
  
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Insert" /></td>
  </tr>
</table>
</form>

<table width="625" border="1" align="center">
  <tr>
    <td width="218">Name</td>
    <td width="283">Link</td>
    <td width="51">Edit</td>
    <td width="45">Delete</td>
  </tr>
 
  <tr>
 <?php 
 $r=$ul->Select();
 Table($r,"usefullink");
 ?>
  </tr>
  
</table>


</div>