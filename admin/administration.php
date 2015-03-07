
<div class="row no-gutter">
<?php 
$ad = new Administration();
$err=0;
$msg="";
$ename="";
$edescription="";
$epicture="";
$eperson="";

if(isset($_POST['sub'])){
	
	if($_POST['name']==""){
		$err++;
		$ename.="Please enter name.";
		}
	    else if(strlen($_POST['name'])<3){
		$err++;
		$ename.="Name must be two character.";
		}
	
	if($_POST['des']==""){
		$err++;
		$edescription.="Please enter description.";
		}
	    else if(strlen($_POST['des'])<3){
		$err++;
		$edescription.="Description must be two character.";
		}
	
	if(isset($_POST['per'])==""){
		$err++;
		$eperson.="Please select any person.";
		}
		
		//echo $err;
		
		if($err==0){
		$ad->Name = $_POST['name'];
		$ad->Picture = UploadPicture($_FILES['pic']);
		$ad->Description = CreateFile($_POST['des']);
		$ad->Person = $_POST['per'];
		if($ad->Insert()){
		 $msg.="Insert successfull.";
		 }
		 else{
			$smg.=$ad->Err;
		   }
		   Redirect("?a=administration&msg={$msg}");
		}
	    
	}
?>

<form action="" method="post" enctype="multipart/form-data">
<table width="100%" border="1">
<h1><center>
Administration
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  <tr>
    <td width="128">Designation Name</td>
    <td width="314"><input type="text" name="name" /></td>
    <td width="302"><?php mer($ename);?></td>
  </tr>
  <tr>
    <td>Picture</td>
    <td><input type="file" name="pic" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Description</td>
    <td><textarea name="des"></textarea></td>
    <td><?php mer($edescription);?></td>
  </tr>
<tr>
    <td>Person</td>
    <td>
    <input type="radio" name="per" value="Precident" />Precident
    <input type="radio" name="per" value="Principal" />Principal
    <input type="radio" name="per" value="Assistence Principal" /> Assistence Principal
    
    </td>
    <td><?php mer($eperson);?></td>
  </tr>
<tr>
    <td><input type="reset" name="reset" value="Reset" /></td>
    <td><input type="submit" name="sub" value="Insert" /></td>
    <td>&nbsp;</td>
  </tr>

</table>
</form>
&nbsp;&nbsp;&nbsp;&nbsp;
<table width="766" border="1">
  <tr>
    <td width="135">Name</td>
    <td width="89">Picture</td>
    <td width="326">Description</td>
    <td width="51">Person</td>
    <td width="57">Edit</td>
    <td width="68">Delete</td>
  </tr>
  
  <tr>
  <?php 
  $r=$ad->Select();
  Table($r,"administration");
  ?>
  </tr>
</table>


</div>