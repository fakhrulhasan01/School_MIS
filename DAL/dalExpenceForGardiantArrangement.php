<?php
	class ExpenceForGardiantArrangement extends DB{
		public $Id;
		public $Amount;
		public $ExpenceGardiantArrangementTypeId;
		public $DayId;		
		public $MonthId;
		public $YearId;
		
		public function Insert() {
			$this->Connect();
			$sql = "insert into expenceforgardiantarrangement(amount,
			                     expenceforgardiantarrangementid, dayid, monthid, yearid)
						            values('".MS($this->Amount)."',
									       '".MS($this->ExpenceGardiantArrangementTypeId)."',
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
			$sql = "update expenceforgardiantarrangement
				set
				amount = '".MS($this->Amount)."',
				expenceforgardiantarrangementid = '".MS($this->ExpenceGardiantArrangementTypeId)."',
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
			$sql = "delete from expenceforgardiantarrangement
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
			$sql = "select * from expenceforgardiantarrangement where id = '".MS($this->Id)."'";
			//echo $sql;
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->Amount = $d[1];
				$this->ExpenceGardiantArrangementTypeId = $d[2];
				$this->DayId = $d[3];
				$this->MonthId = $d[4];
				$this->YearId = $d[5];	

				}
			}
		
		
		
		
		public function Select()
		{
			$this->Connect();
			$a = "";
			$sql = "select exg.id,exg.amount,exgt.name, d.name,m.name,y.name
			       from expenceforgardiantarrangement as exg,expenceforgardiantarrangementtype as exgt,
				   day as d, month as m, year as y 
						  where 
						  exg.expenceforgardiantarrangementid=exgt.id
						  and 
						  exg.dayid = d.id
						  and 
						  exg.monthid = m.id
						  and
						  exg.yearid = y.id";
						 
						  if($this->YearId !=""){
						  $sql .= " AND exg.yearid = '".MS($this->YearId)."' ";
						  }
						 
						  if($this->MonthId !=""){
						  $sql .= " AND exg.monthid = '".MS($this->MonthId)."' ";
						  }
						 
						  if($this->DayId !=""){
						  $sql .= " AND exg.dayid = '".MS($this->DayId)."' ";
						  }
						  



						  
						  $sql .=" ORDER BY exg.monthid ASC";
						  
						  //echo $sql;
			
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
			$sql = "select exg.id,sum(exg.amount) 
			 from expenceforgardiantarrangement as exg where exg.id=exg.id";
			
			if($this->MonthId !=""){
			$sql .= " AND exg.monthid = '".$this->MonthId."'";
			}
			if($this->YearId !=""){
			$sql .= " AND exg.yearid = '".$this->YearId."' ";
			}
			if($this->DayId !=""){
			$sql .= " AND exg.dayid = '".$this->DayId."' ";
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