<?php
class News extends DB{
	public $Id;
	public $HeadLine;
	public $Description;
	public $Picture;
	
	
	public function Insert(){
		$this->Connect();
		$sql = "insert into news (headline, description,picture) 
							
							values('".MS($this->HeadLine)."',
								   '".MS($this->Description)."',								  
								   '".MS($this->Picture)."')";
							
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
	$sql="UPDATE news  set 
	                      headline='".MS($this->HeadLine)."',
						  description='".MS($this->Description)."',
						  picture = '".MS($this->Picture)."'
	                      where id='".MS($this->Id)."'";
						  
						 // echo $sql;
		
		
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
	$sql="delete from news where id='".MS($this->Id)."'";
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
			$sql = "select * from news where	id = '".MS($this->Id)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->HeadLine = $d[1];
				$this->Description = $d[2];
				$this->Picture = $d[3];
			}
		}	
		
		public function Select()
		{
			$this->Connect();
			$a = "";
			
			$sql = "select * from news";
				
			
			
			//echo $sql;				
			
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}

	
}
?>