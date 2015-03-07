<?php
	class AcademicCalenderType extends DB{
		public $Id;
		public $Name;
		
		public function Insert() {
			$this->Connect();
			$sql = "insert into academiccalendertype (name)
						            values('".MS($this->Name)."')";
									echo $sql;
										
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		
		
		
		
		public function Update() {
			$this->Connect();
			$sql = "update academiccalendertype
						set
							name = '".MS($this->Name)."'							
						where
							id = '".MS($this->Id)."'";
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		
		
		
		public function Delete() {
			$this->Connect();
			$sql = "delete from academiccalendertype
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
			$sql = "select * from academiccalendertype where	id = '".MS($this->Id)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->Name = $d[1];	
			
			}
			}
		
		
		
		
		public function Select()
		{
			$this->Connect();
			$a = "";
			$sql = "select * from academiccalendertype ORDER BY id ASC";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}	
	}

?>