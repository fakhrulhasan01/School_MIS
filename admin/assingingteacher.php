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
$at = new AssigningTeacher();
$c = new Classs();
$msg="";
$err=0;
$eclassid="";
$eteacher="";

if(isset($_POST['sub'])){
	
	if($_POST['classid']== 0){
      $err++;
      $eclassid.="Please select a class.";
      } 
	
   if($_POST['teacherId'] == 0){
		 $err++;
		 $eteacher.="Teacher Name Must be three character.";
		 }
	
	echo $err;
	   
	   if($err==0){
		$at->ClassId=$_POST['classid'];
		$at->TeacherId = $_POST['teacherId'];
		if($at->Insert()){
		$msg.="Insert successful.";
		}
		
		else{
		$msg.=$at->Err;
		}
		Redirect("?a=assingingteacher&msg={$msg}");
	   }
	   
	}

?>
<form action="" method="post">
<table width="672" border="0" align="center">

<h1><center>Assigning Teacher &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
}
?>
</center></h1>
<tr>
    <td height="41"><strong>Assigning Class</strong></td>
    <td>
    <select name="classid" id="inp">
    <option value="0">Select One Class</option>
    <?php
    $r = $c->Select();
	SelectFunction($r);
	?>
    </select>
    </td>
    <td><?php mer($eclassid);?></td>
  </tr> 
  

  <tr>
    <td width="129" height="50"><strong>Teacher Name</strong></td>
    <td width="220">
    	<?php 
		$tc = new Teacher();
		$teacherList = $tc->Select();
		?>
        <select name="teacherId" id="inp">
        	<option value="0">Select a teacher</option>
            <?php 
			for($i=0; $i<count($teacherList); $i++){
				echo "<option value='".$teacherList[$i][0]."'>".$teacherList[$i][1]. " (" . $teacherList[$i][12] . ")</option>";
			}
			?>
        </select>
    </td>
    <td width="309"><?php mer($eteacher);?></td>

  </tr>
  <tr>
  
    <td></td>
    <td><input type="submit" name="sub" value="Insert" id="btn" /></td>
  </tr>
</table>
</form>

<table width="70%" id="view" align="center">
  <tr>
    <th width="242">Teacher Name </th>
    <th width="116">Class Name</th>
    <th width="50">Edit</th>
    <th width="56">Delete</th>
  </tr>
 
  <tr>
 <?php 
 $r=$at->Select();
 for($i=0; $i<count($r); $i++){
	 echo "<tr>";
	 	echo "<td>".$r[$i][2]."</td>";
	 	echo "<td>".$r[$i][3]."</td>";
	 	echo "<td><a title='Edit' href='?a=assigningteacheredit&id=".$r[$i][0]."'><center><img src='icon-images/edit.jpg'  height='22' width='28'/></center></a></td>";
	 	echo "<td><a title='Delete' href='?a=assigningteacheredit&id=".$r[$i][0]."'><center><img src='icon-images/delete.jpg'  height='22' width='28'/></center></a></td>";
	 echo "<tr>";
 }
 ?>
  </tr>
  
</table>


</div>