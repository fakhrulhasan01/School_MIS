<?php
	class AssigningSubjectAndTeacher extends DB{
		public $SubjectId;
		public $ClassId;
		public $TeacherId;
		
		public function Insert() {
			$this->Connect();
			$sql = "insert into assigningsubjectandteacher (subjectid, classid,teacherid)
								values
										('".MS($this->SubjectId)."',
										'".MS($this->ClassId)."',
										'".MS($this->TeacherId)."')";
										
								echo $sql;		
			
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		public function Update() {
			$this->Connect();
			$sql = "update assigningsubjectandteacher
						set
							subjectid = '".MS($this->SubjectId)."',
							classid = '".MS($this->ClassId)."',
							teacherid = '".MS($this->TeacherId)."'
						where
							classid = '".MS($this->ClassId)."'
							AND 
							subjectid = '".MS($this->SubjectId)."'
							AND
							teacherid = '".MS($this->TeacherId)."'";
							
							echo $sql;
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
	
	
	public function Delete() {
			$this->Connect();
			$sql = "delete from assigningsubjectandteacher
						
						where
							classid = '".MS($this->ClassId)."'
							AND 
							subjectid = '".MS($this->SubjectId)."'
							AND
							teacherid = '".MS($this->TeacherId)."'";
			
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}
		
		
		
		public function SelectById() {
			$this->Connect();
			$sql = "select * from assigningsubjectandteacher
			                  where 
							  classid = '".MS($this->ClassId)."' 
							  AND 
							  subjectid = '".MS($this->SubjectId)."'
							  AND
							  teacherid = '".MS($this->TeacherId)."'";
		
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->SubjectId = $d[1];	
				$this->ClassId = $d[2];
			    $this->TeacherId = $d[3];
			}
		
		}
			
		
		public function Select(){
			$this->Connect();
			$a = "";
			$sql = "select assigningsubjectandteacher.subjectid, 
			              subject.name, class.name, teacher.name
						from assigningsubjectandteacher, subject,class,teacher 
										 
						where 
						  assigningsubjectandteacher.subjectid = subject.id
						  and assigningsubjectandteacher.classid = class.id
						  and assigningsubjectandteacher.teacherid=teacher.id
						  order by assigningsubjectandteacher.classid";
			//echo $sql;
			
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}	
	}

?>