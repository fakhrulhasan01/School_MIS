<div class="row no-gutter">

<?php 
$uce = new UpComingEvent();
$msg="";
$err=0;
$ename="";
$edate="";
$etime="";
$edescription="";


if(isset($_POST['sub'])){
	
	if($_POST['name']==""){
		$err++;
		$ename.="Please insert a name.";
	   }
	   else if(strlen($_POST['name'])<3){
	   $err++;
	   $ename.="Name must be three character.";
	   }
	   
	   if($_POST['d']==""){
		$err++;
		$edate.="Please enter date.";
	   }
	   else if(strlen($_POST['d'])<3){
	   $err++;
	   $edate.="Date name must be three character.";
	   }
	   if($_POST['t']==""){
		$err++;
		$etime.="Please enter time.";
	   }
	   if($_POST['des']==""){
	    $err++;
		$edescription.="Please enter description.";
	   }
	   else if(strlen($_POST['des'])<3){
	   $err++;
	   $edescription.="Description name must be three character.";
	   }
	
	   
	   if($err==0){
		$uce->Id = $_POST['id'];
		$uce->SelectById();
		
		$des = "files/" . $uce->Description;
				unlink($des);
		      
		$uce->Name = $_POST['name'];
		$uce->Date = $_POST['d'];
	    $uce->Time = $_POST['t'];
		$uce->Description = CreateFile($_POST['des']);
		
		if($uce->Update()){
		$msg.="Update successful.";
		}
		else{
		$msg.=$uce->Err;
		}
		Redirect("?a=upcomingevent&msg={$msg}");
	   }
	}
$uce->Id = $_GET['id'];
$uce->SelectById();

?>



<center><h1>
Upcoming Event
<?php 
  if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</h1></center>

<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
<table width="850" border="1" align="center">

  <tr>
    <td width="132">Name</td>
    <td width="375"><input type="text" name="name" value="<?php echo $uce->Name;?>" /></td>
    <td width="321"><?php mer($ename);?></td>
  </tr>
  <tr>
    <td>Date</td>
    <td><input type="text" name="d" value="<?php echo $uce->Date;?>" /></td>
    <td><?php mer($edate);?></td>
  </tr>
  <tr>
    <td>Time</td>
    <td><input type="text" name="t" value="<?php echo $uce->Time;?>" /></td>
    <td><?php mer($etime);?></td>
  </tr>
  
  <tr>
    <td>Description</td>
    <td><textarea name="des"><?php FileRead("files/" . $uce->Description);?></textarea></td>
    <td><?php mer($edescription);?></td>
  </tr>
  <tr>
    <td><input type="reset" name="reset" value="Reset" /></td>
    <td><input type="submit" name="sub" value="Update" /></td>
    <td>&nbsp;</td>
  </tr>
  
</table>
</form>
<br />
<br />
<br />
<br />






</div>



