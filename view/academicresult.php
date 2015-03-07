<style type="text/css">
	#text{
		font-size:16px; color:#666;
	}
	#inpWidth{
		width:120px;
	}
	#btn{
		width:140px;
		background-color:#093;
		color:#FFF;
		font-weight:bold;
		height:28px;
	}
</style>
<div class="row no-gutter">
<?php 
$ex = new ExamName();
$y = new Year();
$sh = new Shift();
$c = new Classs();
$se = new Section();
?>
<center>
<table width="100%" border="1" id="main" bgcolor="#00CC33">
  <tr>
    <td>
   
    <div id="submit_result">
    <form action="" method="post">
    <table width="100%">
        
     <tr>
      <td width="148">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input id="inpWidth" type="text" name="roll" placeholder="Enter your id" /> 
       </td>
        
         <td width="113"> 
            	<select name="year">
                	<option value="" id="text">-Select Year-</option>
                	<?php 
						$r = $y->Select();
						SelectFunction($r);
					?>
                </select>
            </td>
            <td width="115"> 
            	<select name="class">
                	<option value="" id="text">-Select class-</option>
                	<?php 
						$r = $c->Select();
						SelectFunction($r);
					?>
                </select>
            </td>
            <td width="127"> 
            	<select name="section">
                	<option value="" id="text">-Select section-</option>
                	<?php 
						$r = $se->Select();
						SelectFunction($r);
					?>
                </select>
            </td>
            
           
              
              <td width="113"> 
              <select name="shift">
                <option value="" id="text2">-Select Shift-</option>
                <?php 
						$r = $sh->Select();
						SelectFunction($r);
					?>
              </select>
              </td>
             <td width="150"> 
              <select name="examname">
                <option value="" id="text2">-Select Examname-</option>
                <?php 
						$r = $ex->Select();
						SelectFunction($r);
					?>
              </select>
              </td>
            <td width="140"><input id="btn" type="submit" name="search" value="SEARCH" /></td>
            <td width="142"><input id="btn" type="submit" name="print" value="Print" /></td>
        </tr>
            

    </table>
    </form>
    
    </div>
    <div id="logo_grading">
    <div id="grading">
    <table width="95%" border="1" align="center">
            
            <tr>
              <p id="grading_point">Grading System</p>
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

    <p id="effictive">Effictive from 2001</p>
    
    </div>
    <div id="logo"><img src="img/logo.jpg" /></div>
    </div>
    
    <div id="name_of_school">
    <p id="name_of_school_text">The name of our school</p><br />
                             
    </div>
    
     
     
     
      <!--result report and student info-->    
             <?php 
	            $st = new Student();
	            if(isset($_POST['search'])){
			    if($_POST['roll'] != ""){
				$st->StudentId = $_POST['roll'];
				$st->SelectById();  
			     }  
	           }
	          ?>
			   <?php 
	            $r = new Result();
	            if(isset($_POST['search'])){
			    
				
				if($_POST['class'] != ""){
				$r->ClassId = $_POST['class'];
			    } 
				if($_POST['year'] != ""){
				$r->YearId = $_POST['year'];
			    } 
				if($_POST['section'] != ""){
				$r->SectionId = $_POST['section'];
			    } 
				if($_POST['shift'] != ""){
				$r->ShiftId = $_POST['shift'];
			    }  
	           }
	          ?>
    
              <?php 
	            $acfs = new AssigningClassForStudent();
	            if(isset($_POST['search'])){
			    
				if($_POST['roll'] != ""){
				$acfs->StudentId = $_POST['roll'];
			    } 
				if($_POST['class'] != ""){
				$acfs->ClassId = $_POST['class'];
			    } 
				if($_POST['year'] != ""){
				$acfs->YearId = $_POST['year'];
			    } 
				if($_POST['section'] != ""){
				$acfs->SectionId = $_POST['section'];
			    } 
				if($_POST['shift'] != ""){
				$acfs->ShiftId = $_POST['shift'];
			    } 
				$acfs->SelectById();
	           }
	          ?>
    

    <div id="result_report">Academic Result of</div>
    
    
    <div id="student_info">
       <table width="58%" border="0">
           <tr>
             <td width="21%" id="student_info_text">Name of Student:&nbsp;</td>
             <td width="79%"><?php echo $st->Name;?></td>
           </tr>
           
           <tr>
             <td id="student_info_text">Class Name:&nbsp;</td>
             <td>
			 <?php
			 $c = new Classs();
			 $c->Id=$r->ClassId;
			 $c->SelectById();
			 if($r->ClassId == $c->Id){
			 echo $c->Name; 
			 
			 }else{
				 echo "Other Class";
				 }?>
             </td>
           </tr>
           
           <tr>
             <td id="student_info_text">Class Roll:&nbsp;</td>
             
             <td><?php echo $acfs->ClassRoll;?></td>
           </tr>
           
           
           <tr>
             <td id="student_info_text">Section:&nbsp;</td>
             <td>
			 <?php
			 $sec = new Section();
	         $sec->Id=$r->SectionId;
	         $sec->SelectById();
	
             if($r->SectionId == $sec->Id){
				 echo $sec->Name;
				 } 
				 else{
                 echo "Other Section";
                  }?>
            </td>
           </tr>
           
           <tr>
             <td id="student_info_text">Shift:&nbsp;</td>
             <td>
			 <?php 
			 $sh = new Shift();
			 $sh->Id = $r->ShiftId;
			 $sh->SelectById();
			 if($r->ShiftId == $sh->Id){
			 echo $sh->Name; 
			 }else{
				 echo "Other Shift";
				 }
			 
			 ?>
             
             </td>
           </tr>
           
     </table>
           
     </table>

  </div>
  
    
    <div id="result_info">
    <table width="99%" border="1" align="center">
  <tr>
    <th width="24%">Subject</th>
    <th width="11%">Full Marks</th>
    <th width="6%">Sub</th>
    <th width="7%">Obj</th>
    <th width="6%">Total</th>
    <th width="10%">Letter Grade</th>
    <th width="11%">Gradre Point</th>
    <th width="13%">&nbsp;&nbsp;Highest Marks <center>Section</center></th>
    <th width="12%">&nbsp;&nbsp;Highest Marks <center>Class</center></th>
        </tr>
        
    <?php 
	   $gradepoint=0;
		$total = 0;
		$totalSubject = 0;
		$totalGrade = 0;
		if(isset($_POST['search'])){
		if(($_POST['roll'] != "") && 
		   ($_POST['year'] != "") && 
		   ($_POST['examname'] != "")&&
		   ($_POST['shift'] != "") ){
				$result = new Result();
					if($_POST['roll'] != ""){
						$result->StudentId = $_POST['roll'];
					}
					if($_POST['year'] != ""){
						$result->YearId = $_POST['year'];
					}
					if($_POST['examname'] != ""){
						$result->ExamNameId = $_POST['examname'];
					}
					if($_POST['shift'] != ""){
						$result->ShiftId = $_POST['shift'];
					}
					if($_POST['section'] != ""){
						$result->SectionId = $_POST['section'];
					}
					if($_POST['class'] != ""){
						$result->ClassId = $_POST['class'];
					}
				$r=$result->Select();
                if($r != ""){
                for($i=0; $i<count($r); $i++){
					
					$totalSubject++;
					$total += $r[$i][4];
					echo "<tr>";
					echo "<td>".$r[$i][0]."</td>";
					echo "<td>".$r[$i][1]."</td>";
					echo "<td>".$r[$i][2]."</td>";
					echo "<td>".$r[$i][3]."</td>";
					echo "<td>".$r[$i][4]."</td>";
					
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
					
	
			 
			 echo "<tr>";
 			}}
			
			}
			
			}
	?>
   </table>
   <br />
<?php if(isset($_POST['search'])){
if(($_POST['roll'] != "") && 
($_POST['class'] != "") && 
($_POST['year'] != "")&&
($_POST['shift'] != "")&&
($_POST['section'] != "")){
?>
  <table width="99%" border="1" align="center">
  <tr>
    <td width="24%"><strong>Total Mrks Grade Letter and GPA</strong> </td>
    <td width="11%"></td>
    <td width="6%"></td>
    <td width="7%"></td>
    <td width="6%"><?php echo $total;?></td>
    <?php $gradepoint=$totalGrade/$totalSubject;?>    
    <td width="10%">
    <?php 
    if($gradepoint >= 5.00){
		echo "A+";
		}
		else if($gradepoint <=4.99 && $gradepoint >= 4.00){
		echo "A";	
		}
		else if($gradepoint <=3.99 && $gradepoint >= 3.50){
		echo "A-";
		}
		else if($gradepoint <=3.49 && $gradepoint >= 3.00){
		echo "B";
		}
		else if($gradepoint <=2.99 && $gradepoint >= 2.50){
		echo "C";
		}
		else{
		echo "";
		}
	
	?>

    </td>
    
	<td width="11%">
		<?php echo $gradepoint=round($totalGrade/$totalSubject,2);?>    
    </td>
    <td width="13%"></td>
    <td width="12%"></td>
  </tr>  
  </table>
<?php }}?>
		

   </div>
     
    </td>
  </tr>
</table>

</center>


</div>