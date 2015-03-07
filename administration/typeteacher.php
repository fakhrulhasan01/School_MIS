<div class="row no-gutter">
<?php
$tt = new TypeTeacher();
$msg="";
$err=0;
$ett="";
if(isset($_POST['sub'])){
	if($_POST['tt']==""){
		$err++;
		$ett.="Please insert a type name.";
	   }
	   
	   if($err==0){
		$tt->Name=$_POST['tt'];
		if($tt->Insert()){
		$msg.="Insert successful.";
		}
		else{
		$msg.=$tt->Err;
		}
		Redirect("?ad=typeteacher&msg={$msg}");
	   }
	}

?>
<form action="" method="post">
<table width="90%" border="0" align="center">

<h1><center>Type Teacher &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  <tr>
    <td width="111">Type Teacher</td>
    <td width="210"><input type="text" name="tt" /></td>
    <td width="284"><?php mer($ett);?></td>

  </tr>
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Insert" /></td>
  </tr>
</table>
</form>

<table width="90%" border="1" align="center">
  <tr>
    <td width="95">Type Teacher</td>
    <td width="81">Edit</td>
    <td width="56">Delete</td>
  </tr>
 
  <tr>
 <?php 
 $r=$tt->Select();
 Table($r,"typeteacher");
 ?>
  </tr>
  
</table>


</div>