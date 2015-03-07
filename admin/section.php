<div class="row no-gutter">
<?php
$se = new Section();
$msg="";
$err=0;
$esection="";
if(isset($_POST['sub'])){
	
	if($_POST['section']==""){
		$err++;
		$esection.="Please insert a section name.";
	   }
	   
	   
	   if($err==0){
		$se->Name=$_POST['section'];
		if($se->Insert()){
		$msg.="Insert successful.";
		}
		else{
		$msg.=$se->Err;
		}
		Redirect("?a=section&msg={$msg}");
	   }
	}

?>
<form action="" method="post">
<table width="619" border="0" align="center">

<h1><center>Section &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  <tr>
    <td width="111">Section Name</td>
    <td width="210"><input type="text" name="section" /></td>
    <td width="284"><?php mer($esection);?></td>

  </tr>
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Insert" /></td>
  </tr>
</table>
</form>

<table width="254" border="1">
  <tr>
    <td width="95">Section Name</td>
    <td width="81">Edit</td>
    <td width="56">Delete</td>
  </tr>
 
  <tr>
 <?php 
 $r=$se->Select();
 Table($r,"section");
 ?>
  </tr>
  
</table>


</div>