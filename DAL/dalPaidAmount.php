<?php
class PaidAmount extends DB{
    public $Id;
	public $StudentId;
	public $ClassId;
	public $DayId;
	public $MonthId;
	public $YearId;
	public $ShiftId;
	public $SectionId;
	public $PayOrPaidAmountTypeId;
	public $Amount;
	public $SlNo;
	public $Date;
	
	
	
	
	
	
	public function Insert(){
		$this->Connect();
		
		$sql = "insert into paidamount(studentid,classid,dayid,monthid,yearid,shiftid,
		       sectionid,payorpaidamounttypeid,amount,slno,date) 
							
							values ('".MS($this->StudentId)."',
							        '".MS($this->ClassId)."',
							        '".MS($this->DayId)."',
									'".MS($this->MonthId)."',
								    '".MS($this->YearId)."',
									'".MS($this->ShiftId)."',
									'".MS($this->SectionId)."',
								    '".MS($this->PayOrPaidAmountTypeId)."',
									'".MS($this->Amount)."',
									'".MS($this->SlNo)."',
									'".MS($this->Date)."')";
							 
							 //echo $sql;
							
		
		if(mysql_query($sql)){
			return true;
		}
		else{
			$this->Err = mysql_error();
			return false;
		}
	}
	
	
	public function Update($classid, $yearid, $shiftid){
	$this->Connect();
	$sql="UPDATE payableamount set 
	                      classid='".MS($this->ClassId)."',
						  yearid='".MS($this->YearId)."',
						  shiftid='".MS($this->ShiftId)."',
						  payorpaidamounttypeid='".MS($this->PayOrPaidAmountTypeId)."',
						  amount='".MS($this->Amount)."',
						  date='".MS($this->Date)."'
	                      
						  where classid='".$classid."'
						  and
						  yearid='".$yearid."'
						  and
						  shiftid='".$shiftid."'";
		
		//echo $sql;
		if(mysql_query($sql)){
			
		return true;	
		}
		else{
		$this->Err = mysql_error();
		return false;
		}
		
	 } 
	 
	 
	public function Delete(){
	$this->Connect();
	$sql="delete from aboutus where id='".MS($this->Id)."'";
	if(mysql_query($sql)){
		return true;
	 }
	 else{
		$this->Err = mysql_error();
		return false;
	  }
	
	}
	
	
		public function SelectById() {
			$this->Connect();
			$sql = "select * from payableamount where 
			classid = '".MS($this->ClassId)."' 
			and 
			yearid = '".MS($this->YearId)."'
			and
			shiftid = '".MS($this->ShiftId)."'"; 
			//echo $sql;
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->ClassId = $d[0];
				$this->YearId = $d[1];
				$this->ShiftId = $d[2];
			    $this->PayOrPaidAmountTypeId = $d[3];
				$this->Amount =$d[4];
				$this->Date =$d[5];
			}
		}	
		
		
		public function Select()
		{
			$this->Connect();
			$a = "";
			$sql = "select p.studentid,c.name,y.name,sh.name,se.name,pop.name,p.amount,
			        p.date,p.slno,sum(p.amount)
			from paidamount as p, class as c, year as y,shift as sh,
			section as se,payorpaidamounttype as pop
			where 
			p.classid=c.id
			and
			p.payorpaidamounttypeid=pop.id
			and
			p.yearid=y.id
			and
			p.shiftid=sh.id
			and
			p.sectionid=se.id
			
			order by p.classid";
						
				
							 
			
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
			$sql = "select p.id,sum(p.amount)	from paidamount as p	where p.id = p.id";
			
			if($this->MonthId != ""){
				$sql .= " AND p.monthid = '".MS($this->MonthId)."'";
			    }
			if($this->YearId != ""){
				$sql .= " AND p.yearid = '".MS($this->YearId)."'";
			    }
			if($this->DayId != ""){
				$sql .= " AND p.dayid = '".MS($this->DayId)."'";
			    }
			
				
			//echo $sql;
			//echo "<br />";

			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}	
	
		
	
	public function Select1()
		{
			$this->Connect();
			$a = "";
			$sql = "select sum(pay.amount) from payableamount as pay where pay.id = pay.id";
						
			if($this->ClassId != ""){
				$sql .= " AND pay.classid = '".MS($this->ClassId)."'";
			}
						
				$sql .= " GROUP BY pay.classid";
			
							 
			
			//echo $sql;
			
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}
	
		
		
		
		
		

	
}
?>