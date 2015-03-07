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
	}#student-id{
		background-color:#0C6;
		color:white;
		float:right;
		width:144px;
		margin:2px 0px 0px 0px;
	
	}
	#inp{
		width:220px;
		height:28px;
	}
	
	.border{
		border: 1px #FF0000 solid;
		background-color:red;
		color:white;
	}
	
	.inp{
		background-color: green;
		color: white;
	}
	
</style>

<script type="text/javascript">
	$(document).ready(function(e) {
			
						
			function PageDesign(){
				$(".trContainer").each(function(index, element) {
					//alert("hi");
					$(this).find(".number").each(function(index, element) {
						//alert("Hi");
						var inputPattern = /^[0-9.]*$/i;
						if($(this) != "" && !inputPattern.test($(this).val())){
							$(this).removeClass("inp");
							$(this).addClass("border");
						}else if($(this).val() == ""){
							$(this).removeClass("inp");
							$(this).removeClass("border");
						}else{
						
								if($(this).val() == "0"){
									$(this).val("");
								}
								
								if($(this).val() != ""){
									$(this).addClass("inp");
								}
						}
					});//find inputs
					$(this).find(".number").eq(0).css("background-color","#9EEDC6");
					$(this).find(".number").eq(0).css("color","#FFF");
					$(this).find(".studentId").eq(0).css("background-color","#9EEDC6");
					$(this).find(".studentId").eq(0).css("color","#FFF");

					
					var isNew = $(this).find(".number").eq(9).val()=="1"?"Yes":"No";
					//alert(isNew);
				});//every tr		
			}
		
			setInterval(function(){
				PageDesign();
			}, 600);
			
			//PageDesign();
		
		
		
		
		$("#btn").click(function(){
			$("#message").html('');

			var err = 0;
			var error = 0;
			var teacherId = $("#teacherId").val();
			var shiftId = $("#shiftId").val();
			var sectionId = $("#sectionId").val();
			var classId = $("#classId").val();
			var examNameId = $("#examNameId").val();
			var yearId = $("#yearId").val();
			var subjectId = $("#subjectId").val();
			
					
			$(".trContainer").each(function(index, element) {
            	//alert("hi");
					var studentId = $(this).find(".number").eq(0).val() == ""?0:$(this).find(".number").eq(0).val();
					var midSubjectiveMarks = $(this).find(".number").eq(1).val() == ""?0:$(this).find(".number").eq(1).val();
					var midObjectiveMarks = $(this).find(".number").eq(2).val() == ""?0:$(this).find(".number").eq(2).val();
					var firstTutorial = $(this).find(".number").eq(3).val() == ""?0:$(this).find(".number").eq(3).val();
					var secondTutorial = $(this).find(".number").eq(4).val() == ""?0:$(this).find(".number").eq(4).val();
					var finalSubjectiveMarks = $(this).find(".number").eq(5).val() == ""?0:$(this).find(".number").eq(5).val();					
					var finalObjectiveMarks = $(this).find(".number").eq(6).val() == ""?0:$(this).find(".number").eq(6).val();
					var thirdTutorial = $(this).find(".number").eq(7).val() == ""?0:$(this).find(".number").eq(7).val();
					var fourthTutorial = $(this).find(".number").eq(8).val() == ""?0:$(this).find(".number").eq(8).val();
				midTotal = parseInt(midSubjectiveMarks)+parseInt(midObjectiveMarks)+parseInt(firstTutorial)+parseInt(secondTutorial);
				finalTotal = parseInt(finalSubjectiveMarks)+parseInt(finalObjectiveMarks)+parseInt(thirdTutorial)+parseInt(fourthTutorial);
				
				if(midTotal > 100){
					error++;
					$("#message").append("<font color='red'>The number for <b>Mid</b> out of 100 is not allowed for student: "+studentId+"</font><br />");
				}
				
				
				if(finalTotal > 100){
					error++;
					$("#message").append("<font color='red'>The number for <b>Final</b> out of 100 is not allowed for student: "+studentId+"</font><br />");
				}
				
				
				
				//alert(beforeMid);
				$(this).find(".number").each(function(index, element) {
                    //alert("Hi");
					var inputPattern = /^[0-9.]*$/i;
					if($(this).val() == ""){
					}else{
						if(!inputPattern.test($(this).val())){
							err++;
							$(this).addClass("border");
						}else{
						}
					}
               	});//find inputs

        	});//every tr
			
			//alert(err);
			
			if(err == 0 && error == 0){
				$("#message").html('');
				var update = 0;
				$(".trContainer").each(function(index, element) {
					//alert("hi");
					
					var studentId = $(this).find(".number").eq(0).val() == ""?0:$(this).find(".number").eq(0).val();
					var midSubjectiveMarks = $(this).find(".number").eq(1).val() == ""?0:$(this).find(".number").eq(1).val();
					var midObjectiveMarks = $(this).find(".number").eq(2).val() == ""?0:$(this).find(".number").eq(2).val();
					var firstTutorial = $(this).find(".number").eq(3).val() == ""?0:$(this).find(".number").eq(3).val();
					var secondTutorial = $(this).find(".number").eq(4).val() == ""?0:$(this).find(".number").eq(4).val();
					var finalSubjectiveMarks = $(this).find(".number").eq(5).val() == ""?0:$(this).find(".number").eq(5).val();					
					var finalObjectiveMarks = $(this).find(".number").eq(6).val() == ""?0:$(this).find(".number").eq(6).val();
					var thirdTutorial = $(this).find(".number").eq(7).val() == ""?0:$(this).find(".number").eq(7).val();
					var fourthTutorial = $(this).find(".number").eq(8).val() == ""?0:$(this).find(".number").eq(8).val();
					var isNew = $(this).find(".number").eq(9).val()=="1"?"Yes":"No";
					$.post('teacher/send.php', {
										ptTeacherId : teacherId,
										ptSectionId : sectionId,
										ptShiftId : shiftId,
										ptClassId : classId,
										ptYearId : yearId,
										ptSubjectId : subjectId,
										
										ptStudentId: studentId,
										ptMidSubjectiveMarks: midSubjectiveMarks, 
										ptMidObjectiveMarks: midObjectiveMarks,
										ptFirstTutorial: firstTutorial,
										ptSecondTutorial: secondTutorial,
										ptFinalObjectiveMarks: finalObjectiveMarks,
										ptFinalSubjectiveMarks: finalSubjectiveMarks,
										ptThirdTutorial: thirdTutorial,
										ptFourthTutorial: fourthTutorial,
										ptIsNew: isNew
										},
										function(data){
											//conf = data;
											//alert(data);
											
										}).done(function(html) {
											$("#resultEntry").load(location.href + " #resultEntry");
											$("#message").append(html);
										});
										
				});//every tr			
				//alert(update);
			}else{
				if(error > 0){
					
				}else{
					$("#message").html("<font color='red'>Please correct the red field</font>");
				}
			}

		});//click event
		
    });
	
	
	
		
</script>



<div class="row no-gutter">

<div id="message">
</div>


<?php
 
 
 
 
 $re = new Result();
 $estudentid="";
 $efm="";
 $esm="";
 $eom="";
 $err=0;
 $msg="";

if(isset($_POST['sub'])){
	
	if($_POST['studentid'] == 0){
      $err++;
      $estudentid.="Please insert student id.";
      }   

	 
		     
			 
			 $re->StudentId = $_POST['studentid'];
			 $re->SubjectId = $_SESSION['sid'];
			 $re->ClassId = $_SESSION['cid'];
			 $re->YearId = $_SESSION['yid'];
			 $re->TeacherId = $_SESSION['tid'];
			 $re->SectionId = $_SESSION['seid'];
			 $re->ShiftId = $_SESSION['shid'];
			 $re->FullMarks = $_POST['fm'];
			
			 if($re->Insert()){
		      $msg.="Insert successful.";
		      }
		
		       else{
		        $msg.=$re->Err;
		      }
		  Redirect("?t=result&msg={$msg}");
	   }

	
 ?>
<input type="hidden" id="teacherId" value="<?php echo $_SESSION["tid"]; ?>" />
<input type="hidden" id="sectionId" value="<?php echo $_SESSION["seid"]; ?>" />
<input type="hidden" id="shiftId" value="<?php echo $_SESSION["shid"]; ?>" />
<input type="hidden" id="yearId" value="<?php echo $_SESSION["yid"]; ?>" />
<input type="hidden" id="classId" value="<?php echo $_SESSION["cid"]; ?>" />
<input type="hidden" id="subjectId" value="<?php echo $_SESSION["sid"]; ?>" />
<form action="" method="post">

<table width="80%" class="table table-bordered" border="1" id="resultEntry" align="left">
  <tr bgcolor="#9EEDC6" style="color:white">
    <th width="144">Student Id</th>
    <th width="172">Mid Subjective<br /> Marks</th>
    <th width="172">Mid Objective<br /> Marks</th>
    <th width="119">1st Tutorial</th>
    <th width="119">2nd Tutorial</th>

    <th width="172">Final Subjecttive<br /> Marks</th>
    <th width="172">Final Objective<br /> Marks</th>
    <th width="119">3rd Tutorial</th>
    <th width="94">4th Tutorial</th>
  </tr>
  
 <tr>
 <?php 
 $acfs = new AssigningClassForStudent();
		$acfs->ClassId = $_SESSION['cid'];
		$acfs->YearId = $_SESSION['yid'];
		$acfs->ShiftId = $_SESSION['shid'];
		$acfs->SectionId = $_SESSION['seid'];  
        $r=$acfs->Select();
        if($r != ""){
        for($i=0; $i<count($r); $i++){


			$re = new Result();
			 $re->StudentId = $r[$i][0];
			 $re->SubjectId = $_SESSION["sid"];
			 $re->ClassId = $_SESSION["cid"];
			 $re->YearId = $_SESSION["yid"];
			 $re->TeacherId = $_SESSION["tid"];
			 $re->SectionId = $_SESSION["seid"];
			 $re->ShiftId = $_SESSION["shid"];
			 $resultRow = $re->Select();
			 echo "<br />";
			 //if new 
			 if(($resultRow != "") && count($resultRow)>0){
				$mSubjective =  $resultRow[0][2]==0?"":$resultRow[0][2];
				$mObjective =   $resultRow[0][3]==0?"":$resultRow[0][3];
				$firstTutorial =   $resultRow[0][4]==0?"":$resultRow[0][4];
				$secondTutorial =   $resultRow[0][5]==0?"":$resultRow[0][5];
				$fSubjective =   $resultRow[0][6]==0?"":$resultRow[0][6];
				$fObjective =   $resultRow[0][7]==0?"":$resultRow[0][7];
				$thirdTutorial =   $resultRow[0][8]==0?"":$resultRow[0][8];
				$fourthTutorial =   $resultRow[0][9]==0?"":$resultRow[0][9];
				echo "<tr class='trContainer'>";
				echo "<td class='studentId'>".'<input class="number" readonly="readonly" value="'.$r[$i][0].'" class="number" type="text" name="sm" size="10" />'."</td>";
				
				echo "<td>".'<input class="number" type="text" value="'.$mSubjective.'" name="om" size="11" placeholder="Mid Subjective" />'."</td>";
				echo "<td>".'<input class="number" type="text" value="'.$mObjective.'" name="om" size="11"placeholder="Mid Objective" />'."</td>";
				echo "<td>".'<input class="number" type="text" value="'.$firstTutorial.'" name="om" size="11" placeholder="1st Tutorial" />'."</td>";
				echo "<td>".'<input class="number" type="text" value="'.$secondTutorial.'" name="om" size="11" placeholder="Final Subjective" />'."</td>";
		   		echo "<td>".'<input class="number" type="text" value="'.$fSubjective.'" name="om" size="13" placeholder="Final Objective" />'."</td>";
		   
				echo "<td>".'<input class="number" type="text" value="'.$fObjective.'" name="two" size="11"  placeholder="2nd Tutorial"/>'."</td>";
				echo "<td>".'<input class="number" type="text" value="'.$thirdTutorial.'" name="three" size="11" placeholder="3rd Tutorial" />'."</td>";
				
			
				echo "<td>".'<input class="number" type="text" name="four" size="11" value="'.$fourthTutorial.'"  placeholder="4th Tutorial"/>
				<input class="number" type="hidden" name="checkIsNew" value="2" size="11" />'."</td>";
				echo "</tr>";
			 }else{//if is not new 
				echo "<tr class='trContainer'>";
				echo "<td class='studentId'>".'<input class="number" readonly="readonly" value="'.$r[$i][0].'" class="number" type="text" name="sm" size="10" />'."</td>";
				
				echo "<td>".'<input class="number" type="text" name="om" size="12" placeholder="Mid Subjective" />'."</td>";
				echo "<td>".'<input class="number" type="text" name="om" size="11"placeholder="Mid Objective" />'."</td>";
				echo "<td>".'<input class="number" type="text" name="om" size="11" placeholder="1st Tutorial" />'."</td>";
				echo "<td>".'<input class="number" type="text" name="om" size="11" placeholder="2nd Tutorial" />'."</td>";
		   		echo "<td>".'<input class="number" type="text" name="om" size="13" placeholder="Final Subjective" />'."</td>";
		   		echo "<td>".'<input class="number" type="text" name="two" size="11"  placeholder="Final Objective"/>'."</td>";
				echo "<td>".'<input class="number" type="text" name="three" size="11" placeholder="3rd Tutorial" />'."</td>";
				echo "<td>".'<input class="number" type="text" name="four" size="11"  placeholder="4th Tutorial"/>
				<input class="number" type="hidden" name="checkIsNew" value="1" size="11" />'."</td>";
				echo "</tr>";
			 }//end of else

 }//loop
 }//loop
 ?>
 </tr> 
</table>

<div class="row marg" style="margin-left: 70px"><td colspan="7">
	<input type="button" class="btn btn-info btn-lg" style="float:right; margin-right:54px" name="sub" value="UPLOAD" id="btn" />
</div>
</form>

</div>