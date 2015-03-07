<?php
	class HomeWelcome extends DB{
		public $Id;
		public $Name;
		public $Type;
		
		public function Insert() {
			$this->Connect();
			$sql = "insert into homewelcome (name,type)
						            values('".MS($this->Name)."',
										   '".MS($this->Type)."')";
										
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		public function Update() {
			$this->Connect();
			$sql = "update homewelcome
						set
							name = '".MS($this->Name)."',
							type = '".MS($this->Type)."'
						where
							id = '".MS($this->Id)."'";
							echo $sql;
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		public function Delete() {
			$this->Connect();
			$sql = "delete from homewelcome
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
			$sql = "select * from homewelcome where	id = '".MS($this->Id)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->Name = $d[1];
			    $this->Type = $d[2];
			
			}
			}
		public function Select()
		{
			$this->Connect();
			$a = "";
			$sql = "select * from homewelcome";
			
			if($this->Type != ""){
					$sql .= " where type = '".$this->Type."'";
				}
				
				$sql .= " ORDER BY id asc";
			
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}	
	}

?>