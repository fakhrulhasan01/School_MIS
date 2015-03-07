<div class="row no-gutter">

<!--================start of class blog=========================-->
<?php 
if(isset($_SESSION['stid']) || isset($_SESSION['tcid'])){?>
</br>
</br>
<div class="class_materials_bolg">

<div class="class_bolg_comment_other_div">other box</div>
<div class="class_materials_bolg_header">Here Post Your Problem</div>


<?php 
$cb = new ClassBlog();
$cb->ClassId = $_GET['id'];
$r=$cb->Select();

if($r !==""){
	for($i=0; $i<count($r); $i++){
		  if($r[$i][1] == "0"){
			$tc = new Teacher();
			$tc->Id = $r[$i][2];
			$tc->SelectById();
?>

        <div class="class_materials_bolg_comment">
        <div class="class_materials_bolg_comment_img">
        <img src="images/<?php echo $tc->Picture;?>" height="100" width="100" /></div>
        <div class="class_materials_bolg_comment_name">
		<?php echo $tc->Name;?><br />
        <?php echo $r[$i][5];?>
        </div>
        <div class="class_materials_bolg_comment_likebox">like<br />Dislike</div>


        <div class="class_materials_bolg_comment_desc">
		<?php FileRead("files/" .$r[$i][4]);?></div>
        </div></div>
<?php }else{
			$st = new Student();
			$st->UserId = $r[$i][1];
			$st->SelectById();
	?>
        <div class="class_materials_bolg_comment">
         <div class="class_materials_bolg_comment_img">
        <img src="images/<?php echo $st->Picture;?>" height="100" width="100" /></div>
        <div class="class_materials_bolg_comment_name">
		<?php echo $st->Name;?>
        <?php echo $r[$i][5];?><br /></div>
        <div class="class_materials_bolg_comment_likebox">like<br />Dislike</div>
        <div class="class_materials_bolg_comment_desc">
		<?php FileRead("files/" .$r[$i][4]);?></div>
       </div>    
  	<?php   
	  }
	}
}?>

<?php
$cb = new ClassBlog();
$msg="";
$err=0;
$edescription="";

if(isset($_POST['sub'])){
  
  if($_POST['des']==""){
	$err++;
	$edescription .="Please enter description.";
	}
	echo $err;
	
  if($err==0){
	if(isset($_SESSION['stid'])){
		$cb->StudentId = $_SESSION['stid'];
		$cb->TeacherId = "";
	}else{
		 $cb->TeacherId = $_SESSION['tcid'];
		 $cb->StudentId = "";
	}
	$cb->ClassId = $_POST['id'];
	$cb->Description = CreateFile($_POST['des']);
	
	if($cb->Insert()){
	  $msg .="Insert successful.";
	  }
	  else{
	  $msg .=$cb->Err;
	  }
       Redirect("?s=class&msg={$msg}&id=".$_POST['id']."");
	}
  }
?>



<div class="class_materials_bolg_comment_submit" style="height:auto;">
 <?php 
 if($msg != ""){
	 mss($msg);
 }
 ?> 
  <form action="" method="post">
  <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
  <table width="0" border="0">       
         <tr>
           <td>Comment Submit Here &nbsp;&nbsp;&nbsp;&nbsp;Message</td>
         </tr>
         
         <tr>
          <td><textarea name="des" rows="6" cols="24"></textarea></td>
         </tr>
         
         <tr>
            <td>
            <input type="submit" name="sub" value="Comment" />
            &nbsp;&nbsp;&nbsp;&nbsp;<a href="?v=logout" style="text-decoration:none;">Logout</a>
            </td>
         </tr>
         
     </table>
     </form>

</div>

</div>



<!--=============================end of class blog=========================-->
<div class="class_bolg_iq">  <!--class blog start here-->
<p id="iq_header">IQ Test For All Student</p>
<div class="iqtest">


<?php 
	
	
	
	 $iq = new Iqtest();
	 $r=$iq->Select();
	 if($r !==""){
		 $j=0;
		 for($i=0; $i<count($r); $i++){
			 
	?>

<table width="900" border="0" align="center">

  <tr>
    <td>
    
    <div class="iqtest_question"> 

	<?php echo $r[$i][1];?>&nbsp;:
	<?php echo $r[$i][3];?></div>
    
    <div class="iqtest_option1">
    <input type="radio" name="<?php echo $j; ?>" value="<?php echo $r[$i][5];?>" />
	<?php echo $r[$i][5];?></div>
    <div class="iqtest_option2">
    <input type="radio" name="<?php echo $j; ?>" value="<?php echo $r[$i][6];?>" />
	<?php echo $r[$i][6];?></div>
    <div class="iqtest_option3">
    <input type="radio" name="<?php echo $j; ?>" value="<?php echo $r[$i][7];?>" />
	<?php echo $r[$i][7];?></div>
    <div class="iqtest_option4">
    <input type="radio" name="<?php echo $j; ?>" value="<?php echo $r[$i][8];?>" />
	<?php echo $r[$i][8];?></div>
    
    </td>
  </tr>
</table>

<?php
			 $j++;
		 }
	 }
	 ?>


  <div class="iqtest_submit_btn"><input type="submit" name="sub" value="Submit" /></div>
</div>


</div> <!--class blog end here-->













<!--=============================start of  Class Material=========================-->




<?php }else{?>
<div class="class_materials_bolg_welcome">
<center style="font-size:20px; color: palevioletred;">Welcome </br>If you want to comment Please <a href="?V=home#sha" style="color:red; font-size:30px">Login</a> First</center>
</div>




<div class="row small k-equal-height">
<table class="table table-bordered" > 
 <tr class="info">

    <td width="147" style="color:peru">Class Material Type</td>
    <td width="128" style="color:peru">Description File</td>
    <td width="322" style="color:peru">Description</td>
    <td width="182" style="color:peru">Post Date</td>
    <td width="104" style="color:peru">Class Name</td>
    <td width="113" style="color:peru">Teacher Name</td>
    
  </tr>
       <tr> 
 <?php 
 $cm = new ClassMaterial();
 $cm->ClassId=$_GET['id'];
 $r=$cm->Select();
 if($r != ""){
 for($i=0; $i<count($r); $i++){
	 echo "<tr>";
	 	echo "<td>".$r[$i][1]."</td>";
	 	
		echo "<td>";
		if(substr($r[$i][2], -4) == ".pdf"){
							echo "<a href='largefiles/".$r[$i][2]."'>
							<img src='img/pdf.jpeg' width='22' height='20'/></a>";
				
				}else if((substr($r[$i][2], -4) == ".doc") || (substr($r[$i][2], -4) == "docx")){
				
						echo "<a href='largefiles/".$r[$i][2]."'>
						<img src='img/doc.png' width='22' height='20'/></a>";
						}
		echo"</td>";
		
		echo "<td>";
		 FileRead("files/".$r[$i][3]);
		echo"</td>";
		
		echo "<td>".$r[$i][4]."</td>";
		echo "<td>".$r[$i][5]."</td>";
		echo "<td>".$r[$i][6]."</td>";
	 	
 }}
 ?>
 </tr>

</table>

</div>





<!--=============================end of IQ Class Material=========================-->
<?php }?>


</div> <!--main_body end here-->