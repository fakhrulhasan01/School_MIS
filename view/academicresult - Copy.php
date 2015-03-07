
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
?>
<center>
<table width="100%" border="1" id="main" bgcolor="#00CC33">
  <tr>
    <td>
   
    <div id="submit_result">
    <form action="" method="post">
    <table width="100%">
        
     <tr>
      <td width="229">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Studen Id:
      <input id="inpWidth" type="text" name="roll" placeholder="Enter your id" /> 
          </td>
         <td width="210">Select Year: 
            	<select name="year">
                	<option value="" id="text">-Select Year-</option>
                	<?php 
						$r = $y->Select();
						SelectFunction($r);
					?>
                </select>
            </td>
            <td width="304">Select Exam Term: 
              <select name="examname">
                <option value="" id="text2">-Select Examname-</option>
                <?php 
						$r = $ex->Select();
						SelectFunction($r);
					?>
              </select></td>
            
            <td width="143"><input id="btn" type="submit" name="search" value="SEARCH" /></td>
            <td width="162"><input id="btn" type="submit" name="print" value="Print" /></td>
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
				$st->UserId = $_POST['roll'];
				$st->SelectById();  
			     }  
	           }
	          ?>
    
    
    
    <div id="result_report">Academic Result of
                <?php
				  $yy = new Year();
				  $yy->Id=$st->YearId;
                  $yy->SelectById();

				if($st->YearId==$yy->Id){
					echo $yy->Name;
				}else{
				echo "Other Year";
				}?>
             </div>
    
    
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
			 $c->Id=$st->ClassId;
			 $c->SelectById();
			 if($st->ClassId == $c->Id){
			 echo $c->Name; 
			 
			 }else{
				 echo "Other Class";
				 }?>
             </td>
           </tr>
           
           <tr>
             <td id="student_info_text">Class Roll:&nbsp;</td>
             <td><?php echo $st->ClassRoll; ?></td>
           </tr>
           
           
           <tr>
             <td id="student_info_text">Section:&nbsp;</td>
             <td>
			 <?php
			 $sec = new Section();
	         $sec->Id=$st->SectionId;
	         $sec->SelectById();
	
             if($st->SectionId == $sec->Id){
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
			 $sh->Id = $st->ShiftId;
			 $sh->SelectById();
			 if($st->ShiftId == $sh->Id){
			 echo $sh->Name; 
			 }else{
				 echo "Other Shift";
				 }
			 
			 ?>
             
             </td>
           </tr>
           
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
			if(($_POST['roll'] != "") && ($_POST['year'] != "") && ($_POST['examname'] != "")){
				$rs = new Result();
					if($_POST['roll'] != ""){
						$rs->UserId = $_POST['roll'];
					}
					if($_POST['year'] != ""){
						$rs->YearId = $_POST['year'];
					}
					if($_POST['examname'] != ""){
						$rs->ExamNameId = $_POST['examname'];
					}
				$r=$rs->Select();
                if($r != ""){
                for($i=0; $i<count($r); $i++){
					
					$totalSubject++;
					$total += $r[$i][5];
					echo "<tr>";
					echo "<td>".$r[$i][1]."</td>";
					echo "<td>".$r[$i][2]."</td>";
					echo "<td>".$r[$i][3]."</td>";
					echo "<td>".$r[$i][4]."</td>";
					echo "<td>".$r[$i][5]."</td>";
					
					echo "<td>";
					if(($r[$i][5])>=80){
						echo "A+";
						}else if(($r[$i][5])<=79 && ($r[$i][5]>=70)){
							echo "A";
						}else if(($r[$i][5])<=69 && ($r[$i][5]>=60)){
							echo "A-";
						}
						else if(($r[$i][5])<=59 && ($r[$i][5]>=50)){
						echo "B";
						}
						else if(($r[$i][5])<=49 && ($r[$i][5]>=33)){
						echo "C";	
						}else{
						echo "F";	
						}
					echo "</td>";
					
					echo "<td>";
					if(($r[$i][5])>=80){
							$grade = "5.00";
						}else if(($r[$i][5])<=79 && ($r[$i][5]>=70)){
							$grade = "4.00";
						}else if(($r[$i][5])<=69 && ($r[$i][5]>=60)){
							$grade = "3.50";
						}
						else if(($r[$i][5])<=59 && ($r[$i][5]>=50)){
						 	$grade = "3.00";
						}
						else if(($r[$i][5])<=49 && ($r[$i][5]>=33)){
							$grade = "2.50";	
						}else{
						 	$grade = "0.00";	
						}
						$totalGrade += $grade;
						echo $grade;
					echo "</td>";
					
					echo "<td>";
						echo $rs->SelectMaxMarks($r[$i][6], $r[$i][7]);
						
					echo "</td>";
					echo "<td>";
						echo $rs->SelectMaxMarks($r[$i][6], "");
					echo "</td>";	
					
	
			 
			 echo "<tr>";
 			}}
			
			}
			
			}
	?>
   </table>
   <br />

  <table width="99%" border="1" align="center">
  <tr>
    <td width="24%"><strong>Total Mrks Grade Letter and GPA</strong> </td>
    <td width="11%"></td>
    <td width="6%"></td>
    <td width="7%"></td>
    <td width="6%">
		<?php 
			if(isset($_POST["search"])){
				//echo $rs->SelectTotal($_POST['roll'], $_POST['examname']);
				echo $total;
			}
		?>
    </td>
   
   
    <?php 
			if(isset($_POST["search"])){
				//echo $rs->SelectTotal($_POST['roll'], $_POST['examname']);
				
				$gradepoint=$totalGrade/$totalSubject;
			}
			//echo $gradepoint1;
		?>    

    
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
		<?php 
			if(isset($_POST["search"])){
				//echo $rs->SelectTotal($_POST['roll'], $_POST['examname']);
				echo $gradepoint=round($totalGrade/$totalSubject,2);
			}
			//echo $gradepoint1;
		?>    
    </td>
    <td width="13%"></td>
    <td width="12%"></td>
  </tr>  
  </table>

		

   </div>
     
    </td>
  </tr>
</table>

</center>


</div>