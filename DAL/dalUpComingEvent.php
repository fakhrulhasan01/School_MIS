<?php
class UpComingEvent extends DB{
	public $Id;
	public $Name;
	public $Date;
	public $Time;
	public $Description;
	
	
	public function Insert(){
		$this->Connect();
		$sql = "insert into upcomingevent (name, date,time, description) 
							
							values('".MS($this->Name)."',
								   '".MS($this->Date)."',
								   '".MS($this->Time)."',
								   '".MS($this->Description)."')";
							
							echo $sql;
							
		
		if(mysql_query($sql)){
			return true;
		}
		else{
			$this->Err = mysql_error();
			return false;
		}
	}
	
	
	public function Update(){
	$this->Connect();
	$sql="UPDATE upcomingevent  set 
	                      name='".MS($this->Name)."',
						  date='".MS($this->Date)."',
						  time='".MS($this->Time)."',
						  description = '".MS($this->Description)."'
	                      where id='".MS($this->Id)."'";
						  
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
	$sql="delete from upcomingevent where id='".MS($this->Id)."'";
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
			$sql = "select * from upcomingevent where	id = '".MS($this->Id)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->Name = $d[1];
				$this->Date = $d[2];
				$this->Time = $d[3];
				$this->Description = $d[4];
			}
		}	
		
		public function Select()
		{
			$this->Connect();
			$a = "";
			
			$sql = "select * from upcomingevent";
				
			
			
			//echo $sql;				
			
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}

	
}
?>