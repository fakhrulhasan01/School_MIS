<?php
	class AcademicCalender extends DB{
		public $Id;
		public $Name;
		public $Description;
		public $DescriptionFile;
		public $AcademicCalenderTypeId;
		public $Cdate;
		
		public function Insert() {
			$this->Connect();
			$sql = "insert into academiccalender (name,description,descriptionfile,
												  academiccalendertypeid)
								values
										('".MS($this->Name)."',
										 '".MS($this->Description)."',
										 '".MS($this->DescriptionFile)."',
										 '".MS($this->AcademicCalenderTypeId)."')";
									
									echo $sql;
										
										
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		
		
		
		public function Update() {
			$this->Connect();
			$sql = "update academiccalender 
						set
							name = '".MS($this->Name)."',
							description = '".MS($this->Description)."',
							descriptionfile = '".MS($this->DescriptionFile)."',
							academiccalendertypeid = '".MS($this->AcademicCalenderTypeId)."'
							where id = '".($this->Id)."'";
			
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		
		
		
		public function Delete() {
			$this->Connect();
			$sql = "delete from academiccalender 
						where
							id = '".MS($this->Id)."'";
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}
		
		
		
		
		public function SelectById() {
			$this->Connect();
			$sql = "select * from academiccalender where	id = '".MS($this->Id)."'"; //echo $sql;
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->Name = $d[1];
				$this->Description = $d[2];
				$this->DescriptionFile = $d[3];
				$this->AcademicCalenderTypeId = $d[4];
		
			}
		}	
		
		
		public function Select(){
			$this->Connect();
			$a = "";
			$sql = "select academiccalender.id,academiccalender.name,academiccalender.description,
			        academiccalender.descriptionfile,academiccalender.cdate, academiccalendertype.name 
					from academiccalender, academiccalendertype
					where academiccalender.academiccalendertypeid = academiccalendertype.id";
								
				
				if($this->AcademicCalenderTypeId > 0){
	$sql .= " and academiccalender.academiccalendertypeid = '".$this->AcademicCalenderTypeId."'";
				}
				
				$sql .= " ORDER BY id DESC";
			//echo $sql;			
				
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}
		
		
		public function Selectdetails(){
			$this->Connect();
			$a = "";
			$sql = "select  academiccalender.id, academiccalender.name,
			         academiccalender.description, academiccalender.descriptionfile, 
				         academiccalender.cdate
						 from academiccalender order by academiccalender.id desc";
								
				
				
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}
		
		
		
		
		public function SeePost(){
			$this->Connect();
			$a = "";
			$sql = "select s.id, u.name, s.name 
								from submit as s, user as u
								where s.userid=u.id";
				
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}
	}
?>