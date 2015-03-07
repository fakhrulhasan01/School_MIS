<style type="text/css">
	#view th{
		border:1px #CCC solid;
		background-color:#3C9;
		color:white;
		text-align:center;
		height:34px;
	}
	#view td{
		border:1px #CCC solid;
	}
	#view{
		background-color:#;
		margin:10px auto 0px auto;
	}
	#btn{
		background-color:#0C6;
		color:white;
		font-weight:bold;
		float:right;
		margin-right:4px;
	}
	#inp{
		width:220px;
		height:28px;
	}
	
</style>
<div class="row no-gutter">
<?php
 $as = new AssigningClassForStudent();
 $c = new Classs();
 $y = new Year();
 $se = new Section();
 $sh = new Shift();
 $estudentid="";
 $err=0;
 $msg="";

if(isset($_POST['sub'])){
	
	if($_POST['studentid']== 0){
      $err++;
      $estudentid.="Please insert a student id.";
      }   
	
	
	//echo $err;
	   
	   if($err==0){
		     $as->StudentId = $_POST['studentid'];
			 $as->ClassId = $_POST['classid'];
			 $as->ClassRoll = $_POST['classroll'];
			 $as->YearId = $_POST['yearid'];
			 $as->SectionId = $_POST['sectionid'];
			 $as->ShiftId = $_POST['shiftid'];
			 $as->TeacherId = $_SESSION['tcid'];
			 if($as->Insert()){
		      $msg.="Insert successful.";
		      }
		
		       else{
		        $msg.=$as->Err;
		      }
		  Redirect("?t=assigningclassforstudent&msg={$msg}");
	   }
	   
	}
 ?>
<form action="" method="post">
<table width="40%" border="0" align="center">

<h1><center>Student Regirstration &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
}
?>
</center></h1>
   <tr>
    <td height="41"><strong>StudentId</strong></td>
    <td>
    <input type="text" name="studentid" /> </td>
    <td></td>
  </tr> 
  
  
 <tr>
    <td height="41"><strong>Class Name</strong></td>
    <td>
    <select name="classid">
    <option value="0">Select One Class Name</option>
    <?php
    $r = $c->Select();
	SelectFunction($r);
	?>
    </select>
    </td>
    <td></td>
  </tr> 
  
  
  <tr>
    <td height="41"><strong>Student Class Roll</strong></td>
    <td><input type="text" name="classroll" /></td>
    <td></td>
  </tr> 
  
  <tr>
    <td height="41"><strong>Year Name</strong></td>
    <td>
    <select name="yearid">
    <option value="0">Select One Year Name</option>
    <?php
    $r = $y->Select();
	SelectFunction($r);
	?>
    </select>
    </td>
    <td></td>
  </tr> 
  
 
  <tr>
    <td height="41"><strong>Section Name</strong></td>
    <td>
    <select name="sectionid">
    <option value="0">Select One Section Name</option>
    <?php
    $r = $se->Select();
	SelectFunction($r);
	?>
    </select>
    </td>
    <td></td>
  </tr>
  <tr>
    <td height="41"><strong>Shift Name</strong></td>
    <td>
    <select name="shiftid">
    <option value="0">Select One Shift Name</option>
    <?php
    $r = $sh->Select();
	SelectFunction($r);
	?>
    </select>
    </td>
    <td></td>
  </tr>
 
    <tr>
    <td></td>
    <td><input type="submit" name="sub" value="Insert" id="btn" /></td>
  </tr>
</table>
</form>

<table width="100%" id="view" align="center">
  <tr>
    <th width="116">Student Id</th>
    <th width="116">Class Name</th>
    <th width="116">Class Roll</th>
    <th width="116">Year Name</th>
    <th width="116">Section Name</th>
    <th width="116">Shift Name</th>
    <th width="116">Teacher Name</th>
    <th width="50">Edit</th>
    <th width="56">Delete</th>
  </tr>
 
  <tr>
  
 <?php 
 
 $r=$as->Select();
 if($r != ""){
 for($i=0; $i<count($r); $i++){
	 echo "<tr>";
	 	echo "<td>".$r[$i][0]."</td>";
	 	echo "<td>".$r[$i][1]."</td>";
		echo "<td>".$r[$i][2]."</td>";
		echo "<td>".$r[$i][3]."</td>";
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