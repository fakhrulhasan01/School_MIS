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
		$ul->Id = $_POST['id'];
		$ul->Name=$_POST['name'];
		$ul->Link=$_POST['link'];
		
		if($ul->Update()){
		$msg.="Update successful.";
		}
		else{
		$msg.=$ul->Err;
		}
		Redirect("?a=usefullink&msg={$msg}");
	   }
	}

$ul->Id = $_GET['id'];
$ul->SelectById();
?>
<form action="" method="post"> 
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
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
    <td width="210"><input type="text" name="name" value="<?php echo $ul->Name;?>" /></td>
    <td width="284"><?php mer($ename);?></td>

  </tr>
  
  <tr>
    <td width="111">Link</td>
    <td width="210"><input type="text" name="link" value="<?php echo $ul->Link;?>" /></td>
    <td width="284"><?php mer($elink);?></td>

  </tr>
  
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Update" /></td>
  </tr>
</table>
</form>



</div>