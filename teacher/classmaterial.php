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
$eassigningteacherid="";
$eclassid="";
$edescription="";


if(isset($_POST['sub'])){
	
	
	
	if($_POST['classid']==0){
      $err++;
      $eclassid.="Please select  a class.";
      }
    
	
	
	if($_POST['classmaterialtypeid']==0){
      $err++;
      $eclassmaterialtypeid .="Please select a classmaterialtype.";
      }
	  
   if($_FILES['file']['name'] == ""){
		$err++;
		$efile = "Please select file to upload.";
	   
	   }
	   
   if($_POST['des']== 0 ){
      $err++;
      $edescription .="Please enter description.";
      }
   else if(strlen($_POST['des'])<3){
	  $err++;
	  $edescription.="Description  must be three character.";
	  }
	
	
echo $err;
  
	
	$cm->ClassId = $_POST['classid'];
	$cm->ClassMaterialTypeId = $_POST['classmaterialtypeid'];
	$cm->DocFile = UploadDocFile ($_FILES['file']);
	$cm->AssigningTeacherId = $_SESSION['tcid'];
    $cm->Description = CreateFile($_POST['des']);
	
	if($cm->Insert()){
	$msg .="Insert successful.";
	}
	else{
		$msg .=$cm->Err;
	}
	//Redirect("?t=classmaterial&msg={$msg}");
  }


?>
<form action="" method="post" enctype="multipart/form-data">
<table width="90%" border="0" align="center">
  
  <tr>
    <td height="41">Class</td>
    <?php 
		echo $_SESSION['tcid']; 
			
				$assignTeacher = new AssigningTeacher();
				$assignTeacher->TeacherId = $_SESSION['tcid'];
				$classList = $assignTeacher->Select();
		?>
    <td>
    <select name="classid" id="inp">
    <option value="0">Select One Class</option>
     <?php
				for($i=0; $i<count($classList); $i++){
					echo "<option value='".$classList[$i][0]."'>".$classList[$i][3]."</option>";
				}
            ?>
       </select>
    </td>
    <td><?php mer($eclassid);?></td>
  </tr> 
  
 <tr>
    <td width="202">Class Material Type</td>
    <td width="292">
    <select name="classmaterialtypeid">
    <option value="0">Class Material Type</option>
    <?php
    $r = $cmt->Select();
	SelectFunction($r);
	?>
    </select>
   </td>
    <td width="392"><?php mer($eclassmaterialtypeid);?></td>
  </tr>
  
    <tr>
    <td>Upload File</td>
    <td><input type="file" name="file" /></td>
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


<table width="90%" border="1">
  
  <tr>
    <td width="148">Class Material Type </td>
    <td width="100">Doc File</td>
    <td width="143">Description</td>    
    <td width="225">Post Date</td> 
    <td width="110">Class Name</td>
    <td width="115">Teacher Name</td>    
      
    <td width="35">Edit</td>
    <td width="57">Delete</td>
  </tr>
 
 <tr> 
 <?php 
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
	 	echo "<td><a title='Edit' href='?a=assigningteacheredit&id=".$r[$i][0]."'><center><img src='icon-images/edit.jpg'  height='22' width='28'/></center></a></td>";
	 	echo "<td><a title='Delete' href='?a=assigningteacheredit&id=".$r[$i][0]."'><center><img src='icon-images/delete.jpg'  height='22' width='28'/></center></a></td>";
	 echo "<tr>";
 }}
 ?>
 </tr>
  
 
</table>

</div>