<div class="row no-gutter">
<style type="text/css">
#grading-point-progress-sheet-tr td{
			height:10%;
			background-color:#993;
			color:#000;
			text-align:center;
			font-size:80%;
			margin:0px 0px 0px 0px;
		}
		#grading-point-progress-sheet-tr1{
			height:30px;
			background-color:#FFFFCC;
			font-size:14px;
			color:#000;
			text-align:center;
			margin:0px 0px 0px 0px;
		}
		#grading-point-progress-sheet-tr2{
			height:5px;
			background-color:#6FC;
			color:#000;
			font-size:14px;
			text-align:center;
			margin:0px 0px 0px 0px;
		}

#logo-Of-School{
	background-color:#F9F9F9F;
	height:100px;
	width:100px;
	float:left;
	position:relative;
	padding:0px 0px 0px 0px;
	margin:0px 0px 0px 0px;
}#name-Of-School{
	background-color:#F9F9F9F;
	height:40px;
	font-size:30px;
	width:495px;
	float:left;
	position:relative;
	padding:0px 0px 0px 30px;
	margin:0px 0px 0px 0px;
}#name-Of-School1{
	background-color:#F9F9F9F;
	height:25px;
	width:495px;
	color:#000;
	font-size:16px;
	float:left;
	position:relative;
	padding:1px 0px 0px 130px;
	margin:0px 0px 0px 0px;
}#name-Of-School2{
	background-color:#F9F9F9F;
	height:33px;
	font-size:24px;
	color:#000;
	width:495;
	float:left;
	position:relative;
	padding:5px 0px 0px 120px;
	margin:0px 0px 0px 0px;
}#student-Info{
	background-color:#F9F9F9F;
	height:auto;
	width:595px;
	float:left;
	position:relative;
	padding:0px 0px 0px 0px;
	margin:0px 0px 0px 0px;
}	
#result-box{
	background-color:#FFF;
	height:auto;
	width:595px;
	float:left;
	position:relative;
	padding:0px 0px 0px 0px;
	margin:5px 0px 0px 0px;
	border:0px #000000 solid;
}
#table-result-show td{
	height:10px !important;
	font-size:14px !important;
	font-family:"Times New Roman", Times, serif !important;
	padding:0 !important;
}
</style>

<?php 
$year = new Year();
?>
<form action="" method="post">
	<table>
    	<tr>
        	<td><input type="text" name="studentId" placeholder="Enter Student ID" /></td>
            <td>
            	<select name="yearId">
                	<option value="">Select Year</option>
                    <?php 
						SelectFunction($year->Select());
					?>
                </select>
            </td>
            <td><input type="submit" name="search" value="SHOW RESULT" /></td>
        </tr>
    </table>
</form>
    <?php 
		$result = new Result();
	   	$gradepoint=0;
		$total = 0;
		$totalSubject = 0;
		$totalGrade = 0;
		if(isset($_POST['search'])){
			if($_POST["yearId"] == "" || $_POST["studentId"] == ""){
			}else{
	?>
    
    
               <?php 
	            $st = new Student();
	            if(isset($_POST['search'])){
			    if($_POST['studentId'] != ""){
				$st->StudentId = $_POST['studentId'];
				$st->SelectById();  
			     }  
	           }
	          ?>
              <?php 
	            $t = new Teacher();
	            if(isset($_POST['search'])){
			    $t->Id = $_SESSION['tcid'];
				$t->SelectById();  
	           }
	          ?>
              
              <?php 
	            $acfs = new AssigningClassForStudent();
	            if(isset($_POST['search'])){
			    
				if($_POST['studentId'] != ""){
				$acfs->StudentId = $_POST['studentId'];
			    } 
				if($_POST['yearId'] != ""){
				$acfs->YearId = $_POST['yearId'];
			    } 
				$acfs->SelectById();
	           }
	          ?>
<table width="595" height="842" border="1" align="center"><!--main table and total work in this table-->
      <tr>
        <td> 
     
     
     <table width="595" border="0" align="center"><!--table for school name and istudent info start-->
         <tr>   
            <td>
              <div id="logo-Of-School"><img src="../../finalSchoolProjectHalfDone/teacher/icon-images/logo1.jpg" height="100" /></div>
              <div id="name-Of-School">Bangladesh Navy College Dhaka</div>
              <div id="name-Of-School1">Dhaka Cantonment,Dhaka-1216</div>  
              <div id="name-Of-School2">PROGRESS REPORT-2015</div>    
              <div id="student-Info">
    <table width="595" border="0">
        <tr>
          <td width="50%">Name of Student:<b><?php echo $st->Name;?></b></td>
          <td width="50%">Class:
             <b>
	            <?php
					 $c = new Classs();
					 $c->Id=$acfs->ClassId;
					 $c->SelectById();
					 if($acfs->ClassId == $c->Id){
					 echo $c->Name; 
					 }else{
				     echo "Other Class";
				    }
		       ?>
            </b>
          </td>
          

        </tr>
     
   
        <tr>
           <td width="50%">Section:
              <b>
                <?php
					$sec = new Section();
					$sec->Id=$acfs->SectionId;
					$sec->SelectById();
					if($acfs->SectionId == $sec->Id){
				    echo $sec->Name;
					} 
					else{
					echo "Other Section";
					}
				?>
              </b>
          </td>
          <td height="21">Shift:
             <b>
	           <?php 
					$sh = new Shift();
					$sh->Id = $acfs->ShiftId;
					$sh->SelectById();
					if($acfs->ShiftId == $sh->Id){
					echo $sh->Name; 
					}else{
				    echo "Other Shift";
				    }
			   ?>
            </b>
         </td> 
       </tr>
       <tr>
         
         <td>Class Roll:<b><?php echo $acfs->ClassRoll;?></b></td>
        <td>Class Teacher's:<b><?php echo $t->Name;?></b></td>
        </tr>     
 </table>

</div>



   </td>
 </tr>
</table><!--table for school name and istudent info end-->    


<div id="result-box"><!-- div result box start here-->
<table width="693" border="1" align="left" id="table-result-show"><!--table academic result-->    
        <tr>
        	<th colspan="9"><center><b>Mid-Term Exam</b></center></th>
        </tr>

		<tr style="height:10px; font-size:16px; color:#000;">       
            <td width="26%">Subject</td>
            <td width="8%">Full Marks</td>
            <td width="5%">Sub</td>
            <td width="4%">Obj</td>
            <td width="5%">Total</td>
            <td width="8%">1st Tutorial</td>
            <td width="8%">2nd Tutorial</td>
            <td width="5%">Sub Total</td>
            <td width="8%">L.Grade</td>
            <td width="8%">G.Point</td>
            <td width="7%">&nbsp;&nbsp;H M Section</td>
            <td width="8%">&nbsp;&nbsp;H M Class</td>
   
		</tr>
        <?php 
			$result->StudentId = $_POST["studentId"];
			$result->YearId = $_POST["yearId"];
			$result->Select();
				$r=$result->Select();
                if($r != ""){
                for($i=0; $i<count($r); $i++){

				if($r[$i][8] == "1" || $r[$i][8] == "2" || $r[$i][8] == "5" || $r[$i][8] == "6"){
				}else{
				if($i>0){
					 if($r[$i-1][8] == $r[$i][8]){
						 
					 }else{
						 if($r[$i][8] == "7"){
							 echo "<tr style='background: #E1E1E1'><td colspan='10'><b><center>Final Exam</b></center></td></tr>";
						 }
					 }
				}
					$totalSubject++;
					$total += $r[$i][4];
					echo "<tr>";
					echo "<td>".$r[$i][0]."</td>";
					echo "<td>".$r[$i][1]."</td>";
					echo "<td>".$r[$i][2]."</td>";
					echo "<td>".$r[$i][3]."</td>";
					echo "<td>".$r[$i][4]."</td>";
				    echo "<td>".$r[$i][6]."</td>";
					
					
				echo "<td>";
					$grade = "";
					$value = $r[$i][4];
					if($value >= (($r[$i][1]*80)/100)){
						$grade = "A+";
					}else if($value>=(($r[$i][1]*70)/100) && $value<(($r[$i][1]*80)/100)){
						$grade = "A";
					}else if($value>=(($r[$i][1]*60)/100) && $value<(($r[$i][1]*70)/100)){
						$grade = "A-";
					}else if($value>=(($r[$i][1]*50)/100) && $value<(($r[$i][1]*60)/100)){
						$grade = "B";
					}else if($value>=(($r[$i][1]*40)/100) && $value<(($r[$i][1]*50)/100)){
						$grade = "C";
					}else if($value>=(($r[$i][1]*33)/100) && $value<(($r[$i][1]*40)/100)){
						$grade = "D";
					}else{
						echo "F";
					}
					echo $grade;
				echo "</td>";
					
				echo "<td>";
				$cgrade = "";
				$value = $r[$i][4];
					if($value >= (($r[$i][1]*80)/100)){
						$cgrade = "5.00";
					}else if($value>=(($r[$i][1]*70)/100) && $value<(($r[$i][1]*80)/100)){
						$cgrade = "4.00";
					}else if($value>=(($r[$i][1]*60)/100) && $value<(($r[$i][1]*70)/100)){
						$cgrade = "3.50";
					}else if($value>=(($r[$i][1]*50)/100) && $value<(($r[$i][1]*60)/100)){
						$cgrade = "3.00";
					}else if($value>=(($r[$i][1]*40)/100) && $value<(($r[$i][1]*50)/100)){
						$cgrade = "2.50";
					}else if($value>=(($r[$i][1]*33)/100) && $value<(($r[$i][1]*40)/100)){
						$cgrade = "2.00";
					}else{
						echo "0.00";
					}
				$totalGrade += $cgrade;
				echo $cgrade;
			
				echo "</td>";	
					echo "<td>";
						echo $result->SelectMaxMarks($r[$i][5], $r[$i][6]);
						
					echo "</td>";
					echo "<td>";
						echo $result->SelectMaxMarks($r[$i][5], "");
					echo "</td>";	
					
					//echo "<td>".$r[$i][7]."</td>";
			 echo "<tr>";
			 

 			
			}
		}//checking if is not = first or second tutorial
			
	}
	


?>
   
</table><!--table academic result end-->

<table width="395" border="1" align="center">
  <tr><td colspan="5">Aggregate</td></tr><tr>
    <td width="70">Subject</td>
    <td width="40">Total Marks</td>
    <td width="25">Avg</td>
    <td width="40">Letter Grade</td>
    <td width="42">CGPA</td>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
</table>

</div> <!-- div result box end here-->
    
 <?php }//check if user input is empty else condition
 }//check if click on button
 ?>   
    </td>
  </tr>
</table><!--main table and total work in this table-->

</div>

