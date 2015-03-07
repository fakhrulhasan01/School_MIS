<?php
class AboutUs extends DB{
	public $Id;
	public $Picture;
	public $Description;
    public $Name;
	
	
	
	
	
	
	public function Insert(){
		$this->Connect();
		$sql = "insert into aboutus(picture, description, name) 
							
							values('".MS($this->Picture)."',
								    '".MS($this->Description)."',
									'".MS($this->Name)."')";
							 
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
	$sql="UPDATE aboutus set 
	                      picture='".MS($this->Picture)."',
						  description='".MS($this->Description)."',
						  name='".MS($this->Name)."'
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
			$sql = "select * from aboutus where	id = '".MS($this->Id)."'"; //echo $sql;
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->Picture = $d[1];
				$this->Description = $d[2];
			    $this->Name = $d[3];
			}
		}	
		
		
		public function Select()
		{
			$this->Connect();
			$a = "";
			$sql = "select * from aboutus";
						
				
							 
			
			//echo $sql;
			
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}
		
		
		
		
		

	
}
?>