
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
	
	if($_POST['per']==""){
		$err++;
		$eperson.="Please select any person.";
		}
		
		echo $err;
		
		if($err==0){
		$ad->Id = $_POST['id'];
		$ad->SelectById();
		if(($_FILES['pic']['name'] != "") && (($_FILES['pic']['type'] == "image/jpg") ||
									 ($_FILES['pic']['type'] == "image/jpeg") ||
									 ($_FILES['pic']['type'] == "image/png") ||
									 ($_FILES['pic']['type'] == "image/gif"))) {
					if($ad->Picture != "")
					{
						$tcpp = "images/" . $ad->Picture;
						unlink($tcpp);
					}
					$ad->Picture = UploadPicture($_FILES['pic']);
				}
				
				//echo $tc->Picture;
				
				$adr = "files/" . $ad->Address;
				unlink($adr);

		
		$ad->Name = $_POST['name'];
		//$ad->Picture = UploadPicture($_FILES['pic']);
		$ad->Description = CreateFile($_POST['des']);
		$ad->Person = $_POST['per'];
		if($ad->Update()){
		 $msg.="Update successfull.";
		 }
		 else{
			$smg.=$ad->Err;
		   }
		   Redirect("?a=administration&msg={$msg}");
		}
	    
	}
	$ad->Id = $_GET['id'];
	$ad->SelectById();
?>

<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
<table width="545" border="1">
<h1><center>Administration</center></h1>
  <tr>
    <td width="69">Name</td>
    <td width="294"><input type="text" name="name" value="<?php echo $ad->Name;?>" /></td>
    <td width="160"><?php mer($ename);?></td>
  </tr>
  <tr>
    <td>Picture</td>
    <td>
    <img src="images/<?php echo $ad->Picture;?>" height="85" width="100" />
    <input type="file" name="pic" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Description</td>
    <td><textarea name="des"><?php FileRead("files/" . $ad->Description);?></textarea></td>
    <td><?php mer($edescription);?></td>
  </tr>
<tr>
    <td>Person</td>
    <td>
    <?php 
	if($ad->Person=="Precident"){
	?>
    <input type="radio" name="per"  checked="checked" value="Precident" />Precident
    <input type="radio" name="per" value="Principal" />Principal
    <input type="radio" name="per" value="Assistence Principal" /> Assistence Principal
    <?php 
	}else if($ad->Person=="Principal"){
	?>
    
    <input type="radio" name="per" value="Precident" />Precident
    <input type="radio" name="per" checked="checked" value="Principal" />Principal
    <input type="radio" name="per" value="Assistence Principal" /> Assistence Principal
   
    <?php }else {?>
    
    <input type="radio" name="per" value="Precident" />Precident
    <input type="radio" name="per" value="Principal" />Principal
    <input type="radio" name="per" checked="checked" 
    value="Assistence Principal" /> Assistence Principal

    
	<?php }?>
    
    
    </td>
    <td><?php mer($eperson);?></td>
  </tr>
<tr>
    <td><input type="reset" name="reset" value="Reset" /></td>
    <td><input type="submit" name="sub" value="Update" /></td>
    <td>&nbsp;</td>
  </tr>

</table>
</form>
</div>