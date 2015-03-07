<?php
class GardianMember extends DB{
	public $Id;
	public $Name;
	public $Picture;
	public $Designation;
	public $Description;
	
	
	public function Insert(){
		$this->Connect();
		$sql = "insert into gardianmember (name, picture,designation,description) 
							
							values('".MS($this->Name)."',
								   '".MS($this->Picture)."',
								   '".MS($this->Designation)."',
								   '".MS($this->Description)."')";
							//echo $sql;
							
		
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
	$sql="UPDATE gardianmember set 
	                      name='".MS($this->Name)."',
						  picture='".MS($this->Picture)."',
	                      designation='".MS($this->Designation)."',
						  description='".MS($this->Description)."'
	                      where id='".MS($this->Id)."'";
		
		
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
	$sql="delete from gardianmember where id='".MS($this->Id)."'";
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
			$sql = "select * from gardianmember where	id = '".MS($this->Id)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->Name = $d[1];
				$this->Picture = $d[2];
				$this->Designation = $d[3];
				$this->Description = $d[4];
				
			}
		}	
		
		public function Select()
		{
			$this->Connect();
			$a = "";
			$sql = "select * from gardianmember";
			
		
			//echo $sql;
			
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}

	
}
?>