
<?php
	class Waiver extends DB{
		public $Id;
		public $StudentId;
		public $Persent;
		
		public function Insert() {
			$this->Connect();
			$sql = "insert into waiver (studentid,persent)
						            values('".MS($this->StudentId)."',
										   '".MS($this->Persent)."')";
									
									echo $sql;
										
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
			
			
			
			
		public function Update() {
			$this->Connect();
			$sql = "update waiver
						set
							userid = '".MS($this->UserId)."',
							persent = '".MS($this->Persent)."'
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
			$sql = "delete from waiver
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
			$sql = "select * from waiver where id = '".MS($this->Id)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->StudentId = $d[1];				
				$this->Persent = $d[2];	
				}
			}
		
		
		
		
		public function Select()
		{
			$this->Connect();
			$a = "";
			
			$sql = "select sum(w.persent) from waiver as w where w.id = w.id";
						
			if($this->StudentId != ""){
				$sql .= " AND w.studentid = '".MS($this->StudentId)."'";
			}
						
				$sql .= " GROUP BY w.studentid";
			
			
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}	
	}

?>