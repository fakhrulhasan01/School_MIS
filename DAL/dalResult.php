<?php
	class Result extends DB{
		public $StudentId;
		public $SubjectId;
		public $ClassId;
		public $YearId;			
		public $TeacherId;
		public $SectionId;
		public $ShiftId;
		public $MidSubjectiveMarks;
		public $MidObjectiveMarks;
		public $FirstTutorial;
		public $SecondTutorial;
		public $FinalSubjectiveMarks;
		public $FinalObjectiveMarks;
		public $ThirdTutorial;
		public $FourthTutorial;
		
		
		public function Insert() {
		$this->Connect();
        $sql = "insert into result (studentid, classid, subjectid, yearid, teacherid, sectionid, 
						            shiftid, midsubjectivemarks, midobjectivemarks, firsttutorial,
						            secondtutorial, finalsubjectivemarks, finalobjectivemarks,
								    thirdtutorial, fourthtutorial)
		
								
								values(
										'".($this->StudentId)."',
										'".($this->ClassId)."',
										'".($this->SubjectId)."',
										'".($this->YearId)."',
										'".($this->TeacherId)."',
										'".($this->SectionId)."',
										'".($this->ShiftId)."',
										'".($this->MidSubjectiveMarks)."',
										'".($this->MidObjectiveMarks)."',
										'".($this->FirstTutorial)."',
										'".($this->SecondTutorial)."',
										'".($this->FinalSubjectiveMarks)."',
										'".($this->FinalObjectiveMarks)."',
										'".($this->ThirdTutorial)."',
										'".($this->FirstTutorial)."')";
								
								//echo $sql;
								
								
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		
		
		public function Update() {
			$this->Connect();
			$sql = "update result
						set
						    midsubjectivemarks = '".($this->MidSubjectiveMarks)."',
							midobjectivemarks = '".($this->MidObjectiveMarks)."',
						    firsttutorial = '".($this->FirstTutorial)."',
							secondTutorial = '".($this->SecondTutorial)."',
							finalsubjectivemarks = '".($this->FinalSubjectiveMarks)."',
							finalobjectivemarks = '".($this->FinalObjectiveMarks)."',
							thirdtutorial = '".($this->ThirdTutorial)."',
							fourthtutorial = '".($this->FourthTutorial)."'
					
						where
							
							studentid = '".$this->StudentId."' 
							AND
							classid = '".$this->ClassId."' 
							AND
							subjectid = '".$this->SubjectId."'
							AND
							yearid = '".$this->YearId."'";
							
							//echo $sql;
					
							
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		
		
		public function Delete() {
			$this->Connect();
			$sql = "delete from result
						where
						      id = '".($this->Id)."'";
			if(mysql_query($sql)) {
				return true;			
			}
			$this->Err = mysql_error();
			return false;			
		}


		
		
		
		
		public function SelectById() {
			$this->Connect();
			$sql = "select * from result where studentid = '".($this->StudentId)."'"; //echo $sql;
			if($this->ClassId != ""){
				$sql .= " and classid = '".($this->ClassId)."'";
			}
			if($this->SubjectId != ""){
				$sql .= " and subjectid = '".($this->SubjectId)."'";
			}
			if($this->ShiftId != ""){
				$sql .= " and shiftid = '".($this->ShiftId)."'";
			}
			
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->SubjectId = $d[1];
				$this->ExamNameId = $d[2];
				$this->TeacherId = $d[3];
				$this->UserId = $d[4];
				$this->FullMarks = $d[5];
				$this->SubjectiveMarks = $d[6];
				$this->ObjectiveMarks = $d[7];
			}
		}
		
		
 	     public function Select(){
			$this->Connect();
			$a = "";
	        $sql = "select sb.id, sb.name, r.MidSubjectivemarks, r.MidObjectivemarks, r.firsttutorial, 
					r.secondtutorial,r.FinalSubjectivemarks, r.FinalObjectivemarks, r.thirdtutorial,
			       r.fourthtutorial, r.subjectid, r.sectionid, 
			  (r.MidSubjectivemarks+r.MidObjectivemarks+r.firsttutorial+r.secondtutorial),
			  (r.FinalSubjectivemarks+r.FinalObjectivemarks+r.thirdtutorial+r.fourthtutorial), r.classid
			  from result as r, subject as sb
						where
						r.subjectid = sb.id";
				
				if($this->StudentId != ""){
				$sql .= " AND r.studentid = '".MS($this->StudentId)."'";
			    }
				
				if($this->SubjectId != ""){
				$sql .= " AND r.subjectid = '".MS($this->SubjectId)."'";
			    }
				
				if($this->YearId != ""){
					$sql .= " AND r.yearid = '".MS($this->YearId)."'";
				}
				if($this->ShiftId != ""){
					$sql .= " AND r.shiftid = '".MS($this->ShiftId)."'";
				}
				if($this->SectionId != ""){
					$sql .= " AND r.sectionid = '".MS($this->SectionId)."'";
				}
				if($this->ClassId != ""){
					$sql .= " AND r.classid = '".MS($this->ClassId)."'";
				}
				$sql .= " ORDER BY sb.name ASC";	
			
				//echo $sql;		  
				
			
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}
		
		
		public function CheckExisting($studentId, $classId, $subjectId, $yearId){
			$this->Connect();
			$sql = "SELECT * FROM result WHERE studentid = '".$studentId."' AND classid = '".$classId."' AND subjectid = '".$subjectId."' AND yearid = '".$yearId."'";
			//echo $sql;
			$sql = mysql_query($sql);
			return mysql_num_rows($sql);
		}
		
		
		
		
		public function SelectTotal($studentId, $examId){
			$this->Connect();
			$a = "";
	        $sql = "select sum(result.subjectivemarks+result.objectivemarks) from result, student 
					where 
					result.userid = student.userid			
						and 
					student.userid='".$studentId."'";
			if($examId != ""){
				$sql .= " and result.examnameid = '".$examId."'";
			}
			
			//echo $sql;
			$sql = mysql_query($sql);

			while($d = mysql_fetch_row($sql)) {
				$a = $d[0];
			}
			return $a;
		}
		
		
		
		
		public function SelectMaxMarks($subjectId, $sectionId, $classId){
			$this->Connect();
			$a = "";
	        $sql = "select max(MidSubjectivemarks+MidObjectivemarks+FirstTutorial+SecondTutorial) AS MID, max(FinalSubjectivemarks+FinalObjectivemarks+ThirdTutorial+FourthTutorial) AS FINAL 
			from result WHERE SubjectId = SubjectId";
			
			if($subjectId != ""){
				$sql .= " AND result.SubjectId = '".$subjectId."'";
			}			
			if($sectionId != ""){
				$sql .= " AND result.SectionId = '".$sectionId."'";
			}			
			if($classId != ""){
				$sql .= " AND result.ClassId = '".$classId."'";
			}
			
			//echo $sql;
			$sql = mysql_query($sql);

			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;
			}
			return $a;
		}
		
		
		
		
	
}

?>