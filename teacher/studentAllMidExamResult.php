<div class="row no-gutter">
<style type="text/css">

#logo-Of-School{
	background-color:#063;
	height:100px;
	width:10%;
	float:left;
	position:relative;
	padding:0px 0px 0px 0px;
	margin:0px 0px 0px 0px;
}#name-Of-School{
	background-color:#FFF;
	height:100px;
	width:90%;
	float:left;
	position:relative;
	margin:0px 0px 0px 0px;
}#student-Info{
	background-color:#FFF;
	height:auto;
	width:100%;
	float:left;
	position:relative;
	padding:0px 0px 0px 0px;
	margin:0px 0px 0px 0px;
}	
#result-box{
	background-color:#6CC;
	height:auto;
	width:100%;
	float:left;
	position:relative;
	padding:0px 0px 0px 0px;
	margin:5px 0px 0px 0px;
	border:0px #000000 solid;
}
#table-result-show-header td{
	height:10px !important;
	font-size:14px !important;
	color:#000;
	font-family:"Times New Roman", Times, serif !important;
	padding:0 !important;
	background-color:#CCC;
}
#table-result-show-grade td{
	height:10px !important;
	font-size:14px !important;
	color:#000;
	text-align:center;
	font-family:"Times New Roman", Times, serif !important;
	padding:0 !important;
}
#table-result-show-total-gpa td{
	height:10px !important;
	font-size:14px !important;
	color:#000;
	text-align:center;
	padding:0px 0px 0px -20px;
	font-family:"Times New Roman", Times, serif !important;
	padding:0 !important;
}
#progress-one{
	background-color:#CCC;
	height:auto;
	width:100%;
	float:left;
	position:relative;
	padding:0px 0px 0px 0px;
	margin:0px 0px 0px 0px;
	border:0px #000000 solid;
}
#progress-two{
	background-color:#FFF;
	height:auto;
	width:100%;
	float:left;
	position:relative;
	padding:0px 0px 0px 0px;
	margin:0px 0px 0px 0px;
	border:0px #000000 solid;
}
#grading-point{
	width:50%;
	color:#FFF;
	background-color:#990000;
	text-align:center;
	margin:0px 0px 0px 0px;
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
<table width="100%" border="1" align="center"><!--main table and total work in this table-->
      <tr>
        <td> 
     
     
     <table width="100%" border="0" align="center"><!--table for school name and istudent info start-->
         <tr>   
            <td>
              
              <div id="logo-Of-School"><img src="icon-images/logo1.jpg" width="100%" height="100" /></div>
              <div id="name-Of-School">

              <table width="100%" border="0">
                      <tr>
                        <td style="padding:0px 0px 0px 230px; font-size:24px; color:#000;"><b>
Bangladesh Navy College Dhaka</b>
</td>
                      </tr>
                      <tr>
                        <td style="padding:0px 0px 0px 300px; font-size:16px; color:#000;">Dhaka Cantonment,Dhaka-1216</td>
                      </tr>
                      <tr>
                        <td style="padding:0px 0px 0px 295px; font-size:20px; color:#000;" ><b>
PROGRESS REPORT-2015</b>
</td>
                      </tr>
                    </table>
                    
              </div>  
              
  <div id="student-Info"> <!--div student info start here-->
    <table width="100%" border="0">
        <tr>
          <td width="45%">Name of Student:<b><?php echo $st->Name;?></b></td>
          <td width="22%">Class:
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
     

       </tr>
       <tr>
         <td>Class Teacher's:<b><?php echo $t->Name;?></b></td>
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
         
         <td>Class Roll:<b><?php echo $acfs->ClassRoll;?></b></td>
        
        </tr>     
 </table>

</div><!--div student info end here-->



   </td>
 </tr>
</table><!--table for school name and istudent info end-->    


<div id="result-box"><!-- div result box start here-->
<table width="100%" border="1" align="left"><!--table academic result-->    
        <tr>
        	<th colspan="2"><center><b>&nbsp;</b></center></th>
            <th colspan="9"><center><b>Mid Term Exam</b></center></th>
        
        </tr>

		<tr id="table-result-show-header">       
            <td width="25%">Subject</td>
            <td width="5%">Full Marks</td>
            <td width="5%"><center>Sub Marks</center></td>
            <td width="5%"><center>Obj Marks</center></td>
            <td width="5%"><center>1st Tutorial</center></td>            
            <td width="5%"><center>2nd Tutorial</center></td>
            <td width="5%"><center>Total</center></td>
            <td width="5%"><center>Letter Grade</center></td>
            <td width="5%"><center>Letter Grade</center></td>
            <td width="5%"><center>H M Section<center></td>
            <td width="5%"><center>H M Class</center></td>
            
		</tr>
        <?php 
		$total=0;
		$totalMid=0;
		$totalFinal=0;
		$avg=0;
		$totalMidSum=0;
		$totalFinalSum=0;
		$count=0;
		$totalMidSumCount=0;
		$totalFinalSumCount=0;
		$aggregateAvg=0;
		$aggregateAvgTotal=0;
			$result->StudentId = $_POST["studentId"];
			$result->YearId = $_POST["yearId"];
			$result->Select();
				$r=$result->Select();
                if($r != ""){
                for($i=0; $i<count($r); $i++){ /*start loop for search result*/
                    $count++;
					$totalMidSum +=$r[$i][12];
					$totalFinalSum +=$r[$i][13];
					echo "<tr id='table-result-show-grade'>";
					echo "<td>".$r[$i][1]."Chri Religion & Moral Education"."</td>";
					echo "<td>100</td>";
					echo "<td>".$r[$i][2]."</td>";
					echo "<td>".$r[$i][3]."</td>";
					echo "<td>".$r[$i][4]."</td>";					
					echo "<td>".$r[$i][5]."</td>";
					echo "<td>".$totalMid=$r[$i][12]."</td>";
                    
					echo "<td>";
					if(($r[$i][12])>=80){
						echo "A+";
						}else if(($r[$i][12])<=79 && ($r[$i][12]>=70)){
							echo "A";
						}else if(($r[$i][12])<=69 && ($r[$i][12]>=60)){
							echo "A-";
						}
						else if(($r[$i][12])<=59 && ($r[$i][12]>=50)){
						echo "B";
						}
						else if(($r[$i][12])<=49 && ($r[$i][12]>=40)){
						echo "C";	
						}
						else if(($r[$i][12])<=39 && ($r[$i][12]>=33)){
						echo "D";	
						}
						else{
						echo "F";	
						}
					echo "</td>";
					
					echo "<td>";
					if(($r[$i][12])>=80){
							echo "5.00";
						}else if(($r[$i][12])<=79 && ($r[$i][12]>=70)){
							echo "4.00";
						}else if(($r[$i][12])<=69 && ($r[$i][12]>=60)){
							echo "3.50";
						}
						else if(($r[$i][12])<=59 && ($r[$i][12]>=50)){
						 	echo "3.00";
						}
						else if(($r[$i][12])<=49 && ($r[$i][12]>=40)){
							echo "2.50";	
						}
						else if(($r[$i][12])<=39 && ($r[$i][12]>=33)){
							echo "2.00";	
						}else{
						 	echo "0.00";	
						}
					echo "</td>";
					
					$sectionMidHighest = $result->SelectMaxMarks($r[$i][10], $r[$i][11], $r[$i][14]);
					$classMidHighest = $result->SelectMaxMarks($r[$i][10], "", $r[$i][14]);
					
					
					echo "<td>".$sectionMidHighest[0][0]."</td>";
					echo "<td>".$classMidHighest[0][0]."</td>";
					
					
					
					
			
			 echo "<tr>"; 
				}
		  }/*end loop for search result*/
		echo "<tr id='table-result-show-total-gpa'>";
		echo "<td>Total Marks & GPA</td>";
		echo "<td colspan='5'></td>";
		echo "<td>";
		echo $totalMidSum;
		echo "</td>";
		
		echo "<td>";
		$totalMidSumCount=$totalMidSum/$count;
                	if($totalMidSumCount>=80){
						echo "A+";
						}else if($totalMidSumCount<=79 && $totalMidSumCount>=70){
							echo "A";
						}else if($totalMidSumCount<=69 && $totalMidSumCount>=60){
							echo "A-";
						}
						else if($totalMidSumCount<=59 && $totalMidSumCount>=50){
						echo "B";
						}
						else if($totalMidSumCount<=49 && $totalMidSumCount>=40){
						echo "C";	
						}
						else if($totalMidSumCount<=39 && $totalMidSumCount>=33){
						echo "D";	
						}
						else{
						echo "F";	
						}
					echo "</td>";
					
					echo "<td>";
					if($totalMidSumCount>=80){
						echo "5.00";
						}else if($totalMidSumCount<=79 && $totalMidSumCount>=70){
							echo "4.00";
						}else if($totalMidSumCount<=69 && $totalMidSumCount>=60){
							echo "3.50";
						}
						else if($totalMidSumCount<=59 && $totalMidSumCount>=50){
						echo "3.00";
						}
						else if($totalMidSumCount<=49 && $totalMidSumCount>=40){
						echo "2.50";	
						}
						else if($totalMidSumCount<=39 && $totalMidSumCount>=33){
						echo "2.00";	
						}
						else{
						echo "0.00";	
						}
					echo "</td>";		
		echo "</tr>";

 	
	 
	


?>
 
 
</table><!--table academic result end-->

<div id="progress-one">
<table width="33%" border="1" style="float:left; position:relative;">
  <tr><td colspan="4">Assessment</td></tr>
  <tr height="54">
    <td width="15%">Best</td>
    <td width="18%">Better</td>
    <td width="17%">Good</td>
    <td width="50%">Need to Work Hard</td>
  <tr>
    <td height="54">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="34%" border="1" style="float:left; position:relative;">
  <tr><td colspan="5">Position</td></tr>
  <tr height="36">
    <td width="31%">Position</td>
    <td width="22%">Mid Term</td>
    <td width="23%">Final</td>
    <td width="24%">Avg</td>
  <tr height="36">
    <td>Section</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 <tr height="36">
    <td height="23">Class</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="33%" border="1" style="float:left; position:relative;">
  <tr><td colspan="3">Attendence</td></tr>
  <tr>
    <td width="41%"></td>
    <td width="30%">Mid Term</td>
    <td width="29%">Final Exam</td>
  <tr>
    <td>Working Days</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Attendance</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Absence</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>

</div>

<div id="progress-two">

<table width="50%" border="1" style="float:left; position:relative;">
            
            <tr>
              <td id="grading-point" colspan="4">Grading System</td>
            </tr>
            
            <tr id="grading_point_tr">
              <td>Letter Grade</td>
              <td>Range of Marks</td>
              <td>Grade Point</td>
              <td>Remarks</td>
            </tr>
            
            <tr id="grading_point_tr1">
              <td>A+</td>
              <td>80-100</td>
              <td>5.00</td>
              <td>Outstanding</td>
            </tr>
            <tr id="grading_point_tr2">
              <td>A</td>
              <td>70-79</td>
              <td>4.00</td>
              <td>Excellent</td>
            </tr>
            <tr id="grading_point_tr1">
              <td>A-</td>
              <td>60-69</td>
              <td>3.50</td>
              <td>Very Good</td>
            </tr>
            <tr id="grading_point_tr2">
              <td>B</td>
              <td>50-59</td>
              <td>3.00</td>
              <td>Good</td>
            </tr>
            <tr id="grading_point_tr1">
              <td>C</td>
              <td>40-49</td>
              <td>2.50</td>
              <td>Satisfactory</td>
            </tr>
            <tr id="grading_point_tr2">
              <td>F</td>
              <td>0-39</td>
              <td>0.00</td>
              <td>Fail</td>
            </tr>
            
     </table>
<table width="50%" border="1" style="float:left; position:relative;">
  <tr>
    <td colspan="3">&nbsp;</td>
    
  </tr>
  <tr height="70">
    <td width="30%">Class Teacher's Remark & Signature</td>
    <td width="50%">&nbsp;</td>
    <td width="20%">&nbsp;</td>
  </tr>
  <tr height="69">
    <td width="30%">Principal Remark & Signature</td>
    <td width="50%">&nbsp;</td>
    <td width="20%">&nbsp;</td>
  </tr> 
   <tr height="50">
    <td width="30%">Gardian's Signature</td>
    <td colspan="2" width="70%">&nbsp;</td>
  </tr>
</table>

    
    
 </div>

</div> <!-- div result box end here-->
    
 <?php }//check if user input is empty else condition
 }//check if click on button
 ?>   
    </td>
  </tr>
</table><!--main table and total work in this table-->

</div>

