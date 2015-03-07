<?php
	class Earn extends DB{
		public $Id;
		public $Amount;
		public $EarnTypeId;
		public $DayId;		
		public $MonthId;
		public $YearId;
		
		public function Insert() {
			$this->Connect();
			$sql = "insert into earn (amount, earntypeid, dayid, monthid, yearid)
						            values('".MS($this->Amount)."',
									       '".MS($this->EarnTypeId)."',
									       '".MS($this->DayId)."',
									       '".MS($this->MonthId)."',
									       '".MS($this->YearId)."')";
										   
										   //echo $sql;
										
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
			
			
			
			
		public function Update() {
			$this->Connect();
			$sql = "update earn
						set
							amount = '".MS($this->Amount)."',
							earntypeid = '".MS($this->EarnTypeId)."',
							dayid = '".MS($this->DayId)."',
							monthid = '".MS($this->MonthId)."',
							yearid = '".MS($this->YearId)."'							
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
			$sql = "delete from earn
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
			$sql = "select * from earn where id = '".MS($this->Id)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->Amount = $d[1];
				$this->EarnTypeId = $d[2];
				$this->DayId = $d[3];
				$this->MonthId = $d[4];
				$this->YearId = $d[5];	
				}
			}
		
		
		
		
		public function Select()
		{
			$this->Connect();
			$a = "";
			$sql = "select en.id, en.amount, ent.name, d.name, m.name, y.name
			              from earn as en,earntype as ent, day as d, month as m, year as y 
						  
						  where 
						  en.earntypeid=ent.id
						  and 
						  en.dayid = d.id
						  and 
						  en.monthid = m.id
						  and
						  en.yearid = y.id"; 
						  
						  if($this->YearId !=""){
						  $sql .= " AND en.yearid = '".MS($this->YearId)."'";
						  }
						  
						  if($this->MonthId !=""){
						  $sql .= " AND en.monthid = '".MS($this->MonthId)."'";
						  }
						  
						  if($this->DayId!=""){
						  $sql .= " AND en.dayid = '".MS($this->DayId)."'";
						  }
						  
						  $sql .=" ORDER BY en.monthid ASC";
						  
						//echo $sql;  
			            //echo "<br />";
			
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}
		
		public function SelectAmount()
		{
			$this->Connect();
			$a = "";
			$sql = "select en.id,sum(en.amount)	from earn as en	where en.id = en.id";
			
			if($this->MonthId != ""){
				$sql .= " AND en.monthid = '".MS($this->MonthId)."'";
			    }
			if($this->YearId != ""){
				$sql .= " AND en.yearid = '".MS($this->YearId)."'";
			    }
			if($this->DayId != ""){
				$sql .= " AND en.dayid = '".MS($this->DayId)."'";
			    }
			
			//echo $sql;
			//echo "<br />";
			
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}	
	
		
		
		
		
			
	}

?>