<?php
	class ContactUsUser extends DB{
		public $Id;
		public $Name;
		public $Email;
		public $ContactNumber;
		public $Location;
		public $MessageSubject;
		public $Message;

		
		public function Insert() {
			$this->Connect();
			$sql = "insert into  contactususer
			                      (name,email,contactnumber,location,messagesubject,message)
						            values(
										   '".MS($this->Name)."',
										   '".MS($this->Email)."',
										   '".MS($this->ContactNumber)."',
										   '".MS($this->Location)."',
										   '".MS($this->MessageSubject)."',
										   '".MS($this->Message)."')";
									//echo $sql;
										
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		public function Update() {
			$this->Connect();
			$sql = "update contactususer
						set
							name = '".MS($this->Name)."',
							email = '".MS($this->Email)."',
							contactnumber = '".MS($this->ContactNumber)."',
							location = '".MS($this->Location)."',
							messagesubject = '".MS($this->MessageSubject)."',
							message = '".MS($this->Message)."'
						where
							id = '".MS($this->Id)."'";
							//echo $sql;
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		
		
		public function Delete() {
			$this->Connect();
			$sql = "delete from contactususer
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
			$sql = "select * from contactususer where	id = '".MS($this->Id)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->Name = $d[1];
				$this->Email = $d[2];
				$this->ContactNumber = $d[3];
				$this->Location = $d[4];
				$this->MessageSubject = $d[5];
				$this->Message = $d[6];
				
			}
			}
		public function Select()
		{
			$this->Connect();
			$a = "";
			$sql = "select * from contactususer";
			
			
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}	
	
	
	
	
	
    
	


	
	
}
?>