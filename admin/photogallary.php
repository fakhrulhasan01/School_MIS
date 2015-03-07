<div class="row no-gutter">

<?php 
$pg = new PhotoGallary();
$p = new PhotoType();
$msg="";
$err=0;
$ename="";
$epicture="";
$ephototypeid="";

if(isset($_POST['sub'])){
	if($_POST['name']==""){
		$err++;
		$ename.="Please insert a picture name.";
	   }
	   else if(strlen($_POST['name'])<3){
	   $err++;
	   $eclass.="Picture name must be three character.";
	   }
	   
	 /*if($_POST['pic']==""){
		$err++;
		$ename.="Please insert a picture name.";
	   }
	 */  
	   
	   if($_POST['phototypeid']==0){
		$err++;
		$ephototypeid.="Please select a picture type.";
	   }
	   
	   
	   if($err==0){
		$pg->Name = $_POST['name'];
		$pg->Picture = UploadPicture($_FILES['pic']);
		$pg->PhotoTypeId = $_POST['phototypeid'];
		
		if($pg->Insert()){
		$msg.="Insert successful.";
		}
		else{
		$msg.=$pg->Err;
		}
		Redirect("?a=photogallary&msg={$msg}");
	   }
	}


?>



<center><h1>
Photo Gallary
<?php 
  if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</h1></center>

<form action="" method="post" enctype="multipart/form-data">
<table width="678" border="1">

  <tr>
    <td width="111">Name of picture</td>
    <td width="248"><input type="text" name="name" /></td>
    <td width="297"><?php mer($ename);?></td>
  </tr>
  <tr>
    <td>Picture</td>
    <td><input type="file" name="pic" /></td>
    <td><?php mer($epicture);?></td>
  </tr>
  <tr>
    <td>Phototyre</td>
    <td>
    <select name="phototypeid">
    <option value="0">Select One Photo Type</option>
    <?php 
	$r = $p->Select();
	SelectFunction($r);
	?>
    </select>
    </td>
    <td><?php mer($ephototypeid);?></td>
  </tr>
  <tr>
    <td><input type="reset" name="reset" value="Reset" /></td>
    <td><input type="submit" name="sub" value="Insert" /></td>
    <td>&nbsp;</td>
  </tr>
  
</table>
</form>
<br />
<br />
<br />
<br />

<table width="677" border="1">
  <tr>
    <td width="233">Name of Picture</td>
    <td width="121">Picture</td>
    <td width="163">Type</td>
    <td width="63">Edit</td>
    <td width="63">Delete</td>
  </tr>
  <tr>
  
  <?php 
  $r=$pg->Select();
  Table($r,"photogallary");
  ?>
  </tr>
</table>






</div>



