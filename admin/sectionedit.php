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
		$se->Id = $_POST['id'];   
		$se->Name=$_POST['section'];
		if($se->Update()){
		$msg.="Update successful.";
		}
		else{
		$msg.=$se->Err;
		}
		Redirect("?a=section&msg={$msg}");
	   }
	}
$se->Id = $_GET['id'];
$se->SelectById();


?>
<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
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
    <td width="210"><input type="text" name="section"  value="<?php echo $se->Name;?>"/></td>
    <td width="284"><?php mer($esection);?></td>

  </tr>
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Update" /></td>
  </tr>
</table>
</form>


</div>