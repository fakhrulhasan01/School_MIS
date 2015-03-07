<div class="main_body">

<?php
$cm = new ClassMaterial();
$cmt = new ClassMaterialType();
$c = new Classs();
$at = new AssigningTeacher();
$msg="";
$err=0;
$efile="";
$eclassmaterialtypeid="";
$eclassattendence="";
$eassigningteacherid="";
$eclassid="";

if(isset($_POST['sub'])){
	
	
	
	if($_POST['classid']==0){
      $err++;
      $eclassid.="Please select  a class.";
      }
    
	if($_POST['assigningteacherid']==0){
      $err++;
      $eassigningteacherid .="Please select a teacher.";
      }
	
	if($_POST['classmaterialtypeid']==0){
      $err++;
      $eclassmaterialtypeid .="Please select a classmaterialtype.";
      }
	  
   if($_FILES['file']['name'] == ""){
		$err++;
		$efile = "Please select file to upload.";
	   
	   }
	   
   if($_POST['des']==""){
      $err++;
      $edescription .="Please enter description.";
      }
   else if(strlen($_POST['des'])<3){
	  $err++;
	  $edescription.="Description  must be three character.";
	  }
	
	
	//echo $err;
	
	
	
	
	
	if($err == 0){
	$cm = new ClassMaterial();
	$cm->Id = $_POST['id'];
	$cm->SelectById();
	if($_FILES['file']['name'] != ""){
		if($cm->ClassAttendence != ""){
			$fileToDelete = "largefiles/".$cm->ClassAttendence;
			unlink($fileToDelete);
			$cm->ClassAttendence = UploadDocFile ($_FILES['file']);
		}
	}
	$cm->ClassMaterialTypeId = $_POST['classmaterialtypeid'];
	
	$cm->AssigningTeacherId = $_POST['assigningteacherid'];
    $cm->Description = CreateFile($_POST['des']);
	/*
	if($cm->Insert()){
	$msg .="Insert successful.";
	}
	else{
		$msg .=$cm->Err;
	}*/
	//Redirect("?t=classmaterial&msg={$msg}");
  }
}
 
 
 
 $cm->Id = $_GET['id'];
 $cm->SelectById();
?>



<script>
function catsub(data){		
	data.assigningteacherid.length = 0;
//	alert(3);
	if(data.classid.options[data.classid.selectedIndex].value == 0) {
		data.assigningteacherid.options[data.assigningteacherid.length] = new Option("Select Class First fd", 0);
	}
		<?php
		$r = $c->Select();
		for($i=0; $i<count($r); $i++){
		?>
	else if(data.classid.options[data.classid.selectedIndex].value == <?php echo $r[$i][0]; ?>) {
		<?php
	  	$at->ClassId = $r[$i][0];
		$rr = $at->Select();
		if($rr != ""){
			for($j=0; $j<count($rr); $j++) {
		?>
		data.assigningteacherid.options[data.assigningteacherid.length] = new Option("<?php echo $rr[$j][1]; ?>", <?php echo $rr[$j][0]; ?>);
		<?php
			}
		}
		?>
		}
	<?php
		}
	?>
	}
</script>    


<center><h1>Class Meterials</h1></center>
<form action="" method="post" enctype="multipart/form-data" name="myForm">
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
<table width="900" border="0" align="center">
  
  <tr>
    <td>Class</td>
    <td>
    
          <select name="classid" class="contact_select" onchange="catsub(document.myForm);">
                         <option value="0">Select ctaegory......</option>
                          <?php
						  		
								SelectedFunction($c->Select(), $cm->ClassMaterialTypeId);
                     	?>
          </select>
    </td>
    <td><?php mer($eclassid);?></td>
  </tr>
  <tr>
    <td>Assigning Teacher</td>
    <td>
    <select name="assigningteacherid" id="assigningteacherid" class="contact_select">
                                <option value="0">Select a Class first....</option>
                                </select>
		

    </td>
    <td><?php mer($eassigningteacherid);?></td>
  </tr>
 
 <tr>
    <td width="202">Class Material Type</td>
    <td width="292">
    <select name="classmaterialtypeid">
    <option value="0">Class Material Type</option>
    <?php
    $r = $cmt->Select();
	SelectedFunction($r, $cm->ClassMaterialTypeId);
	?>
    </select>
   </td>
    <td width="392"><?php mer($eclassmaterialtypeid);?></td>
  </tr>
  
    <tr>
    <td>Upload File</td>
    <td>
    <input type="file" name="file" />
    <?php 
						if(substr($cm->ClassAttendence, -4) == ".pdf"){
							echo "<a href='largefiles/".$cm->ClassAttendence."'>
							<img src='img/pdf.jpeg' width='22' height='20'/></a>";
						}
						else if((substr($cm->ClassAttendence, -4) == ".doc") || (substr($cm->ClassAttendence, -4) == "docx")){				
						echo "<a href='largefiles/".$cm->ClassAttendence."'>
						<img src='img/doc.png' width='22' height='20'/></a>";					
						}				
	?>
    </td>
    <td><?php mer($efile);?></td>
  </tr>
  
  
  
  <tr>
    <td width="202">Description</td>
    <td width="292"><textarea name="des" rows="10" cols="40"></textarea></td>
    <td width="392"><?php mer($edescription);?></td>
  </tr>
  
  
 
  <tr>
    <td><input type="reset" name="reset" value="Reset" /></td>
    <td><input type="submit" name="sub"  value="Insert" /></td>
    <td>&nbsp;</td>
  </tr>
 


</table>
</form>

<table width="1065" border="1">
  
  <tr>
    <td width="143">Class Attendence</td>
    <td width="173">Description</td>
    <td width="159">Class Material Type</td>    
    <td width="140">Teacher Name</td>    
    <td width="304">Class Name</td>
    <td width="304">Post Date</td>    
    <td width="40">Edit</td>
    <td width="60">Delete</td>
  </tr>
  
  <tr>
  <?php 
  $r = $cm->Select();
  Table($r, "classmaterial");
  ?>
  </tr>

</table>




</div>