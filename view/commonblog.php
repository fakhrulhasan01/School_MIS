<div class="row no-gutter">

<?php 
if(isset($_SESSION['stid'])|| isset($_SESSION['tcid'])){?>
</br>
</br>
<center>

<div class="class_materials_bolg">
<div class="class_materials_bolg_comment_other_div"></div>
<div class="class_materials_bolg_header"><strong>Here Post Your Problem</strong></div>




<?php 
$cb = new CommonBlog();
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
		<?php echo $tc->Name;?>&nbsp;Teacher<br />
        <?php echo $r[$i][4];?>
        </div>
        <div class="class_materials_bolg_comment_likebox">like<br />Dislike</div>


        <div class="class_materials_bolg_comment_desc">
		<?php FileRead("files/" .$r[$i][3]);?></div>
        </div>
<?php }else{
			$st = new Student();
			$st->UserId = $r[$i][1];
			$st->SelectById();
	?>
        <div class="class_materials_bolg_comment">
        <div class="class_materials_bolg_comment_img">
        <img src="images/<?php echo $st->Picture;?>" height="100" width="100" /></div>
        <div class="class_materials_bolg_comment_name">
		<?php echo $st->Name;?>&nbsp;Student<br />
        <?php echo $r[$i][4];?></div>
        <div class="class_materials_bolg_comment_likebox">like<br />Dislike</div>
        <div class="class_materials_bolg_comment_desc">
		<?php FileRead("files/" .$r[$i][3]);?></div>
        </div>    
  	<?php   
	  }
	}
}?>


<?php
$cob = new CommonBlog();
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
		$cob->StudentId = $_SESSION['stid'];
		$cob->TeacherId = "";
	}else{
		 $cob->TeacherId = $_SESSION['tcid'];
		 $cob->StudentId = "";
	}
	$cob->Description = CreateFile($_POST['des']);
	
	if($cob->Insert()){
	  $msg .="Insert successful.";
	  }
	  else{
	  $msg .=$cob->Err;
	  }
       Redirect("?v=commonblog&msg={$msg}");
	}
  }
?>




<div class="class_materials_bolg_comment_submit" style="height:auto">
 <?php 
 if($msg != ""){
	 mss($msg);
 }
 ?> 
  <form action="" method="post">
  <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
  <table width="0" border="0" align="left">       
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
</center>
<?php }else{?>

<div class="class_materials_bolg_welcome">

<center><strong>Welcome</strong></br>If you want to comment Please <a href="?V=home#log"><strong>Login</strong></a> First</center>
</div>
<?php }?>


</div>