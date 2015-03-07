<?php
class SchoolContact extends DB{
	public $Id;
	public $Name;
	public $Description;
	public $Telephone;
	public $Mobile;
	public $Fax;
	
	
	
	
	
	
	public function Insert(){
		$this->Connect();
		$sql = "insert into schoolcontact(name,description,teln,mobn,fax) 
							
							values('".MS($this->Name)."',
								   '".MS($this->Description)."',
								   '".MS($this->Telephone)."',
								   '".MS($this->Mobile)."',
								   '".MS($this->Fax)."')";
							 
							// echo $sql;
							
		
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
	$sql="UPDATE schoolcontact set 
	                      name='".MS($this->Name)."',
	                      description='".MS($this->Description)."',
						  teln='".MS($this->Telephone)."',
						  mobn='".MS($this->Mobile)."',
						  fax='".MS($this->Fax)."'
	                      where id='".MS($this->Id)."'";
						  
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
	$sql="delete from schoolcontact where id='".MS($this->Id)."'";
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
			$sql = "select * from schoolcontact where	id = '".MS($this->Id)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->Name = $d[1];
				$this->Description = $d[2];
				$this->Telephone = $d[3];
				$this->Mobile = $d[4];
				$this->Fax = $d[5];
			}
		}	
		
		
		public function Select()
		{
			$this->Connect();
			$a = "";
			$sql = "select * from schoolcontact";
							 
						
			//echo $sql;
			
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}
		
		
		
		
		

	
}
?>