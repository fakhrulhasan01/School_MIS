<?php
	class Subject extends DB{
		public $Id;
		public $Name;
		public $ClassId;
		
		public function Insert() {
			$this->Connect();
			$sql = "insert into subject (name, classid)
						            values('".MS($this->Name)."',
									       '".MS($this->ClassId)."')";
										
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
			
			
			
			
		public function Update() {
			$this->Connect();
			$sql = "update subject
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
			$sql = "delete from subject
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
			$sql = "select * from subject where id = '".MS($this->Id)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->Name = $d[1];	
				}
			}
		
		
		
		
		public function Select()
		{
			$this->Connect();
			$a = "";
			$sql = "select s.id,s.name,c.name from subject as s,class as c
			              where s.classid=c.id";
			if($this->ClassId != ""){
				$sql .= " and s.classid = '".$this->ClassId."'";
			}
			$sql .= " ORDER BY s.id ASC";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}	
	}

?>