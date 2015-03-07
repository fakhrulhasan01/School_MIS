<?php 
include_once("../controller/function.php");
include_once("../DAL/DbConnect.php");
include_once("../DAL/dalResult.php");
include_once("../DAL/dalAttendence.php");



if(isset($_POST["ptIsNew"])){
			$re = new Result();
			$checkRows = $re->CheckExisting($_POST['ptStudentId'], $_POST['ptClassId'], $_POST['ptSubjectId'], $_POST['ptYearId']);
			//echo count($checkRows);
			//echo $checkRows;
			
			/*if(($_POST['ptMidSubjectiveMarks'] == 0) && ($_POST['ptMidObjectiveMarks'] == 0) && 
			   ($_POST['ptFirstTutorial'] == 0) && ($_POST['ptSecondTutorial'] == 0) && 
			   ($_POST['ptFinalObjectiveMarks'] == 0) && ($_POST['ptFinalSubjectiveMarks'] == 0) && 
			   ($_POST['ptThirdTutorial'] == 0) && ($_POST['ptFourthTutorial'] == 0)){
					//echo "Blank Rows for Student: <b>".$_POST['ptStudentId']."</b><br />";   
			   }else{*/
						 $re->StudentId = $_POST['ptStudentId'];
						 $re->SubjectId = $_POST['ptSubjectId'];
						 $re->ClassId = $_POST['ptClassId'];
						 $re->YearId = $_POST['ptYearId'];
						 $re->TeacherId=$_POST['ptTeacherId'];
						 $re->SectionId=$_POST['ptSectionId'];
						 $re->ShiftId = $_POST['ptShiftId'];
						 $re->MidSubjectiveMarks = $_POST['ptMidSubjectiveMarks'];
						 $re->MidObjectiveMarks = $_POST['ptMidObjectiveMarks'];
						 $re->FirstTutorial = $_POST['ptFirstTutorial'];
						 $re->SecondTutorial = $_POST['ptSecondTutorial'];
						 $re->FinalObjectiveMarks = $_POST['ptFinalObjectiveMarks'];
						 $re->FinalSubjectiveMarks = $_POST['ptFinalSubjectiveMarks'];
						 $re->ThirdTutorial = $_POST['ptThirdTutorial'];
						 $re->FourthTutorial = $_POST['ptFourthTutorial'];
						
						 if(($_POST["ptIsNew"] == "No") && $checkRows>0){
							if($re->Update()){
								echo "Updated for Student: <b>".$_POST['ptStudentId']."</b><br />";
							}else{
								echo "Failed to Update for Student: <b>".$_POST['ptStudentId']."</b><br />";
							}
						 }else{
							if($re->Insert()){
								echo "Added result for Student: <b>".$_POST['ptStudentId']."</b><br />";
							}else{
								echo "Failed to Add for Student: <b>".$_POST['ptStudentId']."</b><br />";
							}
						 }
														
			   
}else if(isset($_POST["ptPresent"])){
	$at = new Attendence();
	$at->ClassId = $_POST["ptClassId"];
	$at->YearId = $_POST["ptYearId"];
	$at->SectionId = $_POST["ptSectionId"];
	$at->ShiftId = $_POST["ptShiftId"];
	$at->TeacherId = $_POST["ptTeacherId"];
	$at->StudentId = $_POST["ptStudentId"];
	$at->Present = $_POST["ptPresent"];
	$at->Absent = $_POST["ptAbsent"];
	
	if($at->Insert()){
		echo "<font color='green'>Attendance is inserted for ".$_POST["ptStudentId"]."</font><br />";
	}else{
		echo "<font color='red'>Attendance insertion failed for ".$_POST["ptStudentId"]."</font><br />";
	}
}


?>