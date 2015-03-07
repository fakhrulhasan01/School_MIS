<?php
class Administration extends DB{
	public $Id;
	public $Name;
	public $Picture;
	public $Description;
	public $Person;
	
	
	public function Insert(){
		$this->Connect();
		$sql = "insert into administration(name, picture,description,person) 
							
							values('".MS($this->Name)."',
								   '".MS($this->Picture)."',
								   '".MS($this->Description)."',
								   '".MS($this->Person)."')";
							
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
	$sql="UPDATE administration set 
	                      name='".MS($this->Name)."',
						  picture='".MS($this->Picture)."',
	                      description='".MS($this->Description)."',
						  person = '".MS($this->Person)."'
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
	$sql="delete from administration where id='".MS($this->Id)."'";
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
			$sql = "select * from administration where	id = '".MS($this->Id)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->Name = $d[1];
				$this->Picture = $d[2];
				$this->Description = $d[3];
				$this->Person = $d[4];
			}
		}	
		
		public function Select()
		{
			$this->Connect();
			$a = "";
			$sql = "select * from administration";
			
			if($this->Person != ""){
					$sql .= " where person = '".$this->Person."'";
				}
				
				$sql .= " ORDER BY id asc";
			//echo $sql;				
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}

	
}
?>





