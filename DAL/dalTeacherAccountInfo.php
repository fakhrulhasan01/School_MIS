<?php
	class TeacherAccountInfo extends DB{
		public $Id;
		public $TeacherId;
		public $PaidAmount;
		public $TypeTeacherId;
		public $DayId;		
		public $MonthId;
		public $YearId;
		
		public function Insert() {
			$this->Connect();
			$sql = "insert into teacheraccountinfo (teacherid, paidamount, typeteacherid, 
			                                        dayid, monthid, yearid)
						            values('".MS($this->TeacherId)."',
									       '".MS($this->PaidAmount)."',
										   '".MS($this->TypeTeacherId)."',
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
			$sql = "update teacheraccountinfo
						set
							teacherid = '".MS($this->TeacherId)."',
							paidamount = '".MS($this->PaidAmount)."',
							typeteacherid = '".MS($this->TypeTeacherId)."',
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
			$sql = "delete from teacheraccountinfo
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
			$sql = "select * from teacheraccountinfo where id = '".MS($this->Id)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->TeacherId = $d[1];
				$this->PaidAmount = $d[2];
				$this->TypeTeacherId = $d[3];
				$this->DayId = $d[4];
				$this->MonthId = $d[5];
				$this->YearId = $d[6];	
				}
			}
		
		
		
		
		public function Select()
		{
			$this->Connect();
			$a = "";
			$sql = "select tainfo.id, d.name, m.name, y.name, tainfo.teacherid, t.name, tt.name,
			             tainfo.paidamount  
				    from teacheraccountinfo as tainfo, typeteacher as tt,day as d,month as m,
					year as y,teacher as t
				    
					where tainfo.dayid = d.id
					      and
						  tainfo.monthid = m.id
						  and
						  tainfo.yearid = y.id
						  and
						  tainfo.typeteacherid = tt.id
						  and 
						  tainfo.teacherid=t.teacherid
					
					      ORDER BY tainfo.monthid ASC";
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
			$sql = "select t.id,sum(t.paidamount)  from teacheraccountinfo as t where t.id=t.id";
			
			if($this->MonthId !=""){
			$sql .= " AND t.monthid ='".$this->MonthId."'";	
			}
			if($this->YearId != ""){
			$sql .= " AND t.yearid = '".$this->YearId."'";
			}
			if($this->DayId != ""){
			$sql .= " AND t.dayid = '".$this->DayId."'";
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