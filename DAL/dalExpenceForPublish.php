<?php
	class ExpenceForPublish extends DB{
		public $Id;
		public $Amount;
		public $ExpenceForPublishTypeId;
		public $DayId;		
		public $MonthId;
		public $YearId;
		
		public function Insert() {
			$this->Connect();
			$sql = "insert into expenceforpublish (amount,expenceforpublishtypeid,dayid,monthid,yearid)
						            values('".MS($this->Amount)."',
									       '".MS($this->ExpenceForPublishTypeId)."',
									       '".MS($this->DayId)."',
									       '".MS($this->MonthId)."',
									       '".MS($this->YearId)."')";
										
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
			
			
			
			
		public function Update() {
			$this->Connect();
			$sql = "update expenceforpublish
						set
							amount = '".MS($this->Amount)."',
							expenceforpublishtypeid = '".MS($this->ExpenceForPublishTypeId)."',
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
			$sql = "delete from expenceforpublish
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
			$sql = "select * from expenceforpublish where id = '".MS($this->Id)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->Amount = $d[1];
				$this->ExpenceForPublishTypeId = $d[2];
				$this->DayId = $d[3];
				$this->MonthId = $d[4];
				$this->YearId = $d[5];	
				}
			}
		
		
		
		
		public function Select()
		{
			$this->Connect();
			$a = "";
			$sql = "select exp.id, exp.amount, expt.name, d.name, m.name, y.name
			              from expenceforpublish as exp,expenceforpublishtype as expt,
						  day as d, month as m, year as y
						  where 
						  exp.expenceforpublishtypeid=expt.id
						  and
						  exp.dayid=d.id
						  and
						  exp.monthid=m.id
						  and
						  exp.yearid=y.id";
						  
						  if($this->MonthId !=""){
							$sql .= " AND exp.monthid = '".$this->MonthId."'";
							}
							if($this->YearId !=""){
							$sql .= " AND exp.yearid = '".$this->YearId."' ";
							}
							if($this->DayId !=""){
							$sql .= " AND exp.dayid = '".$this->DayId."' ";
							}
							
						  $sql .=" ORDER BY exp.monthid ASC";
			
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
			$sql = "select exp.id,sum(exp.amount) from expenceforpublish as exp where exp.id = exp.id";
			
			if($this->MonthId !=""){
			$sql .= " AND exp.monthid = '".$this->MonthId."'";
			}
			if($this->YearId !=""){
			$sql .= " AND exp.yearid = '".$this->YearId."' ";
			}
			if($this->DayId !=""){
			$sql .= " AND exp.dayid = '".$this->DayId."' ";
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