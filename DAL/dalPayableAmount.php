<?php
class PayableAmount extends DB{
	public $ClassId;
	public $YearId;
	public $ShiftId;
    public $PayOrPaidAmountTypeId;
	public $Amount;
	public $Date;
	
	
	
	
	
	
	public function Insert(){
		$this->Connect();
		$sql = "insert into payableamount(classid,yearid,shiftid,payorpaidamounttypeid,amount,date) 
							
							values('".MS($this->ClassId)."',
								    '".MS($this->YearId)."',
									'".MS($this->ShiftId)."',
								    '".MS($this->PayOrPaidAmountTypeId)."',
									'".MS($this->Amount)."',
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
	
	
	public function Update($ClassId, $YearId, $ShiftId){
	$this->Connect();
	$sql="UPDATE payableamount set 
	                      classid='".MS($this->ClassId)."',
						  yearid='".MS($this->YearId)."',
						  shiftid='".MS($this->ShiftId)."',
						  payorpaidamounttypeid='".MS($this->PayOrPaidAmountTypeId)."',
						  amount='".MS($this->Amount)."',
						  date='".MS($this->Date)."'
	                      
						  where classid='".($ClassId)."'
						  and
						  yearid='".($YearId)."'
						  and
						  shiftid='".($ShiftId)."'";
		
		               echo $sql;
		
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
			$sql = "select c.name,y.name,sh.name, pop.name,pay.amount,pay.date,c.id,y.id,sh.id
			from class as c, year as y,shift as sh,payorpaidamounttype as pop,payableamount as pay
			where 
			pay.classid=c.id
			and
			pay.payorpaidamounttypeid=pop.id
			and
			pay.yearid=y.id
			and
			pay.shiftid=sh.id
			
			order by pay.classid";
						
				
							 
			
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
			$sql = "select paid.id,sum(paid.amount)	from paidamount as paid	where paid.id=paid.id";
			
			
		
			//echo $sql;
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}
		
		
		
		

	
}
?>