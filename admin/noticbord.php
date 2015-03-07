<div class="main_body">
<?php
$nb = new NoticBord();
$nty = new NoticType();


$msg="";
$err=0;
$ename="";
$etypeid="";

if(isset($_POST['sub'])){
 
    if($_POST['name']==""){
      $err++;
      $ename .="Please enter name of title.";
      }
    else if(strlen($_POST['name'])<3){
	  $err++;
	  $ename.="Name  must be three character.";
	  }
	
	
	if($_POST['typeid']==0){
      $err++;
      $etypeid .="Please select a tpye.";
      }
    
	echo $err;
	if($err==0){
	$nb->Name = $_POST['name'];
	$nb->Description = CreateFile($_POST['des']);

	$nb->NoticTypeId = $_POST['typeid'];
   
   
   if(($_FILES['desfile']['type'] == "application/msword")
											||
				($_FILES['desfile']['type']  ==	"application/vnd.openxmlformats-officedocument.wordprocessingml.document")
											||
				($_FILES['desfile']['type']  ==	"application/octet-stream")
											||
				($_FILES['desfile']['type'] == "application/pdf")
											||
				($_FILES['desfile']['type'] == "application/vnd.ms-powerpoint")
											||
				($_FILES['desfile']['type'] == "application/vnd.openxmlformats-officedocument.presentationml.presentation")				
				){
					$nb->DescriptionFile = UploadDocFile($_FILES['desfile']);
				}else{
					$nb->DescriptionFile = "";					
				}
	
	if($nb->Insert()){
	$msg .="Insert successful.";
	Redirect("?a=noticbord&msg={$msg}");
	}
	else{
		$msg .=$nb->Err;
	}
	
	
  }
}
 

 
?>


  


<center><h1>

Notic Bord
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</h1></center>
<form action="" method="post" enctype="multipart/form-data">
<table width="900" border="0" align="center">
  
  <tr>
    <td width="192">Name</td>
    <td width="541"><input type="text" name="name" /></td>
    <td width="153"><?php mer($ename);?></td>
  </tr>
  
  
  <tr>
    <td>Description</td>
    <td><textarea name="des" rows="10" cols="40"></textarea></td>
    <td></td>
  </tr>
  
  <tr>
    <td>DescriptionFile</td>
    <td><input type="file" name="desfile" />If you want to upload file please select it.</td>
    <td></td>
  </tr>
  
  
  <tr>
    <td>Type</td>
    <td>
    
  <select name="typeid">
    <option value="0">Select One Type</option>
    <?php
    $r = $nty->Select();
	SelectFunction($r);
	?>
    </select>
    </td>
    <td><?php mer($etypeid);?></td>
  </tr>
 
  <tr>
    <td><input type="reset" name="reset" value="Reset" /></td>
    <td><input type="submit" name="sub"  value="Insert" /></td>
    <td>&nbsp;</td>
  </tr>
 


</table>


</form>

<table width="1000" border="1">
	<tr>
    	<td width="17%">Name </td>
    	<td width="31%">Description </td>
    	<td width="14%">Description File</td>
        <td width="25%">Post Date</td>
        <td width="25%">Type of Calender</td>
        
        <td width="6%">Edit</td>
        <td width="7%">Delete</td>
    </tr>
    <?php 
	$r = $nb->Select();
	Table($r, "noticbord");
	?>
    
</table>
</div>