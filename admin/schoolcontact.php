<div class="row no-gutter">
<?php
$sc = new SchoolContact();
$msg="";
$err=0;
$ename="";

if(isset($_POST['sub'])){
	
	if($_POST['name']==""){
		$err++;
		$ename.="Please insert a school name.";
	   }
	   else if(strlen($_POST['name'])<3){
	   $err++;
	   $ename.="Name must be three character.";
	   }
	   
	   
	  
	  echo $err;
	  
	  if($err==0){
		$sc->Name=$_POST['name'];
		$sc->Description=CreateFile($_POST['des']);
		$sc->Telephone=$_POST['tel'];
		$sc->Mobile=$_POST['mob'];
		$sc->Fax=$_POST['fax'];
		
		if($sc->Insert()){
		$msg.="Insert successful.";
		}
		else{
		$msg.=$sc->Err;
		}
		Redirect("?a=schoolcontact&msg={$msg}");
	   }
	}

?>
<form action="" method="post">
<table width="619" border="0" align="center">

<h1><center>School Contact &nbsp; &nbsp;
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
    <td width="111">Address</td>
    <td width="210"><textarea name="des"></textarea></td>
    <td width="284"></td>
  </tr>
    <tr>
    <td width="111">Telephone</td>
    <td width="210"><input type="text" name="tel" /></td>
    <td width="284"></td>
  </tr>
    <tr>
    <td width="111">Mobile</td>
    <td width="210"><input type="text" name="mob" /></td>
    <td width="284"></td>
  </tr>
    <tr>
    <td width="111">Fax</td>
    <td width="210"><input type="text" name="fax" /></td>
    <td width="284"></td>
  </tr>
  
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Insert" /></td>
  </tr>
</table>
</form>
<br />
<br />
<br />

<table width="923" border="1" align="center">
  <tr>
    <td width="131">Name</td>
    <td width="229">Address</td>
    <td width="128">Telephone</td>
    <td width="127">Mobile</td>
    <td width="153">Fax</td>
    <td width="49">Edit</td>
    <td width="60">Delete</td>
  </tr>
 
  <tr>
 <?php 
 $r=$sc->Select();
 Table($r,"schoolcontact");
 ?>
  </tr>
  
</table>


</div>