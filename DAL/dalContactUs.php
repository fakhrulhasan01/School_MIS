<?php
	class ContactUs extends DB{
		public $Id;
		public $Description;
		
		public function Insert() {
			$this->Connect();
			$sql = "insert into contactus (description)
						            values('".MS($this->Description)."')";
										
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
			
			
			
			
		public function Update() {
			$this->Connect();
			$sql = "update contactus
						set
							description = '".MS($this->Description)."'							
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
			$sql = "delete from contactus
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
			$sql = "select * from contactus where id = '".MS($this->Id)."'"; echo $sql;
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->Description = $d[1];	
				}
			}
		
		
		
		
		public function Select()
		{
			$this->Connect();
			$a = "";
			$sql = "select * from contactus ORDER BY id ASC";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}	
	}

?>