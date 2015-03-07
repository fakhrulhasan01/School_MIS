<?php
	class Expence extends DB{
		public $Id;
		public $Amount;
		public $ExpenceTypeId;
		public $DayId;		
		public $MonthId;
		public $YearId;
		
		public function Insert() {
			$this->Connect();
			$sql = "insert into expence (amount, expencetypeid, dayid, monthid, yearid)
						            values('".MS($this->Amount)."',
									       '".MS($this->ExpenceTypeId)."',
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
			$sql = "update expence
						set
							amount = '".MS($this->Amount)."',
							expencetypeid = '".MS($this->ExpenceTypeId)."',
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
			$sql = "delete from expence
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
			$sql = "select * from expence where id = '".MS($this->Id)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->Amount = $d[1];
				$this->ExpenceTypeId = $d[2];
				$this->DayId = $d[3];
				$this->MonthId = $d[4];
				$this->YearId = $d[5];	
				}
			}
		
		
		
		
		public function Select()
		{
			$this->Connect();
			$a = "";
			
			$sql = "select ex.id,ex.amount,ext.name,d.name,m.name,y.name,m.id
			              from expence as ex,expencetype as ext,day as d,month as m,year as y
						  where 
						  ex.expencetypeid=ext.id
						  and 
						  ex.dayid = d.id
						  and 
						  ex.monthid = m.id
						  and
						  ex.yearid = y.id"; 
						  
						  if($this->MonthId !=""){
						  $sql .= " AND ex.monthid = '".$this->MonthId."'";
							}
						  if($this->YearId !=""){
							$sql .= " AND ex.yearid = '".$this->YearId."' ";
							}
						  if($this->DayId !=""){
							$sql .= " AND ex.dayid = '".$this->DayId."' ";
							}
							
			                //echo $sql;
		                 	//echo "<br />";
						  
						  $sql .= " ORDER BY ex.monthid ASC";
			
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}	
		
		public function SelectMonth()
		{
			$this->Connect();
			$a = "";
			
			$sql = "select sum(amount)
			              from expence where 
						  yeay='2015' and month='Jan'";
						  			
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
			$sql = "select ex.id,sum(ex.amount) from expence as ex where ex.id = ex.id";
			
			if($this->MonthId !=""){
			$sql .= " AND ex.monthid = '".$this->MonthId."'";
			}
			if($this->YearId !=""){
			$sql .= " AND ex.yearid = '".$this->YearId."' ";
			}
			if($this->DayId !=""){
			$sql .= " AND ex.dayid = '".$this->DayId."' ";
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