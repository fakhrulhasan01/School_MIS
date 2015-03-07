<?php
	class Student extends DB{
		public $StudentId;
		public $Name;
		public $Picture;
		public $ClassId;
		public $YearId;
		public $FName;
		public $MName;
		public $DateOfBitrh;
		public $Gender;
		public $Nationality;
		public $ReligionId;
		public $BloodGroupId;
		public $Mobile;
		public $Phone;
		public $Email;
		public $AlterNativeEmail;
		public $Password;
		public $NationalId;
		public $AboutStudent;
		public $PreviousInstitute;
		public $PAddress;
		public $PerAddress;
		
		
		public function Insert() {
		$this->Connect();
        $sql = "insert into student 
		(studentid, name, picture, classid, yearid, fname, mname, dateofbirth, gender, nationality,
		 religionid, bloodgroupid, mobile, phone, email, 
		 alternativeemail, password, nationalid, aboutstudent, previousinstitute, paddress, peraddress)
								
								values(
										'".($this->StudentId)."',
										'".($this->Name)."',
										'".($this->Picture)."',
										'".($this->ClassId)."',
										'".($this->YearId)."',
										'".($this->FName)."',
										'".($this->MName)."',
					                    '".($this->DateOfBirth)."',
										'".($this->Gender)."',
										'".($this->Nationality)."',
										'".($this->ReligionId)."',
										'".($this->BloodGroupId)."',
										'".($this->Mobile)."',
										'".($this->Phone)."',
										'".($this->Email)."',
										'".($this->AlterNativeEmail)."',
										'".($this->Password)."',
										'".($this->NationalId)."',
										'".($this->AboutStudent)."',
										'".($this->PreviousInstitute)."',
										'".($this->PAddress)."',
										'".($this->PerAddress)."')";
								
								echo $sql;
								
								
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		
		
		public function Update() {
			$this->Connect();
			$sql = "update student
						set
						        
							name = '".($this->Name)."',
							classroll = '".($this->ClassRoll)."',
							userid= '".($this->UserId)."',
							password = '".($this->Password)."',
							picture = '".($this->Picture)."',
							classid = '".($this->ClassId)."',
							yearid = '".($this->YearId)."',
							sectionid = '".($this->SectionId)."',
							shiftid = '".($this->ShiftId)."',
							fname = '".($this->FName)."',
							mname = '".($this->MName)."',
							dateofbirth = '".($this->DateOfBirth)."',
							gender = '".($this->Gender)."',
							nationality = '".($this->Nationality)."',
							religionid = '".($this->ReligionId)."',
							bloodgroupid = '".($this->BloodGroupId)."',
							mobile = '".($this->Mobile)."',
							phone = '".($this->Phone)."',
							email = '".($this->Email)."',
							alternativeemail = '".($this->AlterNativeEmail)."',
							nationalid = '".($this->NationalId)."',
							aboutstudent = '".($this->AboutStudent)."',
							paddress = '".($this->PAddress)."',
							peraddress = '".($this->PerAddress)."'
							
							
						where
							userid = '".($this->UserId)."'";
							//echo $sql;
					
							
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		
		
		public function Delete() {
			$this->Connect();
			$sql = "delete from student
						where
						      userid = '".($this->UserId)."'";
			if(mysql_query($sql)) {
				return true;			
			}
			$this->Err = mysql_error();
			return false;			
		}


		
		public function Login()
		{
			$this->Connect();
			$sql = "select * from student 
								where
									studentid = '".($this->StudentId)."' AND
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
			$sql = "select * from student where studentid = '".($this->StudentId)."'"; //echo $sql;
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->StudentId = $d[0];
				$this->Name = $d[1];
				$this->Picture = $d[2];
				$this->ClassId = $d[3];
				$this->YearId = $d[4];
				$this->FName = $d[5];
				$this->MName = $d[6];
				$this->DateOfBirth = $d[7];	
				$this->Gender = $d[8];
				$this->Nationality = $d[9];
				$this->ReligionId = $d[10];
				$this->BloodGroupId = $d[11];
				$this->Mobile = $d[12];
				$this->Phone = $d[13];
				$this->Email = $d[14];
				$this->AlterNativeEmail = $d[15];
				$this->Password = $d[16];
				$this->NationalId = $d[17];
				$this->AboutStudent = $d[18];
				$this->PreviousInstitute = $d[19];
				$this->PAddress = $d[20];
				$this->PerAddress = $d[21];
			}
		}
		
			
		
		public function Select(){
			$this->Connect();
			$a = "";
	        $sql = "select s.studentid, s.name, s.picture, c.name, y.name, 
			s.fname, s.mname, s.dateofbirth, s.gender, s.nationality, re.name, bl.name, 
			s.mobile, s.phone, s.email, s.alternativeemail,s.nationalid, s.aboutstudent,
			s.previousinstitute, s.paddress, s.peraddress  
			from student as s, class as c ,bloodgroup as bl, year as y,religion as re 			
			where s.classid = c.id
			      and s.yearid = y.id
				  and s.religionid = re.id
				  and s.bloodgroupid = bl.id";
			
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}
		
	
	
	
	
	
	}

?>