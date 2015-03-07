<?php
	class Teacher extends DB{
		public $TeacherId;
		public $Name;
		public $Picture;
		public $Groupp;
		public $AcademicQualification;
		public $TrainingExprience;
		public $TeachingArea;
		public $PreviousEmployment;
		public $PersonalWebpage;
		public $Phone;
	    public $Mobile;
		public $Gender;
		public $Email;
		public $Password;
		public $FName;
		public $MName;
		public $PAddress;
		public $PerAddress;
		public $WorkingDuration;
		public $Qualification;
		public $JoiningDate;
		
		public function Insert() {
		$this->Connect();
        $sql = "insert into teacher (teacherid, name, picture, groupp, academicqualification, 
					    trainingexprience, teachingarea, previousemployment, personalwebpage, 
			            phone, mobile, gender, email, password, fname, mname,paddress, 
			            peraddress,joiningdate, workingduration, qualification)  
								values( '".($this->TeacherId)."',
										'".($this->Name)."',
										'".($this->Picture)."',
										'".($this->Groupp)."',
										'".($this->AcademicQualification)."',
										'".($this->TrainingExprience)."',
										'".($this->TeachingArea)."',
										'".($this->PreviousEmployment)."',
										'".($this->PersonalWebpage)."',
										'".($this->Phone)."',
										'".($this->Mobile)."',
										'".($this->Gender)."',
										'".($this->Email)."',
										'".($this->Password)."',
										'".($this->FName)."',
										'".($this->MName)."',
										'".($this->PAddress)."',
										'".($this->PerAddress)."',
										'".($this->JoiningDate)."',
										'".($this->WorkingDuration)."',
										'".($this->Qualification)."')";
								
								echo $sql;
								
								
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		
		
		public function Update() {
			$this->Connect();
			$sql = "update teacher
						set
						        
							name = '".($this->Name)."',
							picture = '".($this->Picture)."',
							classid = '".($this->ClassId)."',
							group = '".($this->Group)."',
							academic_qualification = '".($this->AcademicQualification)."',
							training_experience = '".($this->TrainingExperience)."',
							teaching_area = '".($this->TeachingArea)."',
							previous_employment = '".($this->PreviousEmployment)."',
							persona_webpage = '".($this->PersonaWebpage)."',
							phone = '".($this->Phone)."',
							gender = '".($this->Gender)."',
							email = '".($this->Email)."',
							password = '".($this->Password)."',
							fname = '".($this->FName)."',
							mname = '".($this->MName)."',
							paddress = '".($this->PAddress)."',
							peraddress = '".($this->PerAddress)."',
							mobileno = '".($this->MobileNo)."',
							teacherid = '".($this->TeacherId)."',
							joiningdate = '".($this->JoiningDate)."',
							workingduration = '".($this->WorkingDuration)."',
							qualification = '".($this->Qualification)."'
													
						where
							id = '".($this->Id)."'";
							//echo $sql;
					
							
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		
		
		public function Delete() {
			$this->Connect();
			$sql = "delete from user
						where
						      id = '".($this->Id)."'";
			if(mysql_query($sql)) {
				return true;			
			}
			$this->Err = mysql_error();
			return false;			
		}


		
		public function Login()
		{
			$this->Connect();
			$sql = "select * from teacher 
								where
									teacherid = '".($this->TeacherId)."' AND
									password = '".($this->Password)."'";
									
			
			$sql = mysql_query($sql);
			if(mysql_num_rows($sql) > 0) {
				while($d = mysql_fetch_row($sql)) {
					$this->Id = $d[0];
					return true;
				}				
			}	
			return false;						
		}
		
		
		
		
		public function SelectById() {
			$this->Connect();
			$sql = "select * from teacher where teacherid = '".($this->TeacherId)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				
				$this->TeacherId = $d[0];
				$this->Name = $d[1];
				$this->Picture = $d[2];
				$this->Group = $d[3];
				$this->AcademicQualification = $d[4];
				$this->TrainingExprience = $d[5];
				$this->TeachingArea = $d[6];
				$this->PreviousEmployment = $d[7];
				$this->PersonalWebpage = $d[8];
				$this->Phone = $d[9];
				$this->Mobile = $d[10];
				$this->Gender = $d[11];
				$this->Email = $d[12];
				$this->Password = $d[13];
				$this->FName = $d[14];
				$this->MName = $d[15];
				$this->PAddress = $d[16];
				$this->PerAddress = $d[17];
				$this->JoiningDate = $d[18];	
				$this->WorkingDuration = $d[19];
				$this->Qualification = $d[20];
			}
		}
		
		
		
		
		
		
		
		public function Select(){
			$this->Connect();
			$a = "";
	        $sql = "select * from teacher";
			
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}
		
		
		
		
		public function Select_teacher(){
			$this->Connect();
			$a = "";
	        $sql = "select teacher.id, teacher.name, class.name 
						from teacher, class
						where teacher.classid = class.id";
						
				if($this->ClassId > 0) {
			    $sql .= " AND teacher.classid = '".MS($this->ClassId)."'";	
			}
			$sql .= " ORDER BY teacher.id ASC";	
			
		
			
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}
		
		
		
		
		
	}



?>