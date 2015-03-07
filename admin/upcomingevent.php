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
		$uce->Name = $_POST['name'];
		$uce->Date = $_POST['d'];
		$uce->Time = $_POST['t'];
		$uce->Description = CreateFile($_POST['des']);
		
		if($uce->Insert()){
		$msg.="Insert successful.";
		}
		else{
		$msg.=$uce->Err;
		}
		Redirect("?a=upcomingevent&msg={$msg}");
	   }
	}


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
<table width="850" border="1" align="center">

  <tr>
    <td width="132">Name</td>
    <td width="375"><input type="text" name="name" /></td>
    <td width="321"><?php mer($ename);?></td>
  </tr>
  <tr>
    <td>Date</td>
    <td><input type="text" name="d" /></td>
    <td><?php mer($edate);?></td>
  </tr>
  <tr>
    <td>Time</td>
    <td><input type="text" name="t" /></td>
    <td><?php mer($etime);?></td>
  </tr>
  
  <tr>
    <td>Description</td>
    <td><textarea name="des"></textarea></td>
    <td><?php mer($edescription);?></td>
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

<table width="853" border="1" align="center">
  <tr>
    <td width="106">Name</td>
    <td width="103">Date</td>
    <td width="103">Time</td>
    <td width="487">Description</td>
    <td width="56">Edit</td>
    <td width="67">Delete</td>
  </tr>
  <tr>
  
  <?php 
  $r=$uce->Select();
  Table($r,"upcomingevent");
  ?>
  </tr>
</table>






</div>



