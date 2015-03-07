<?php
class PhotoGallary extends DB{
	public $Id;
	public $Name;
	public $Picture;
	public $PhotoTypeId;
	
	
	public function Insert(){
		$this->Connect();
		$sql = "insert into photogallary (name, picture,phototypeid) 
							
							values('".MS($this->Name)."',
								   '".MS($this->Picture)."',								  
								   '".MS($this->PhotoTypeId)."')";
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
	$sql="UPDATE photogallary  set 
	                      name='".MS($this->Name)."',
						  picture='".MS($this->Picture)."',
						  phototypeid = '".MS($this->PhotoTypeId)."'
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
	$sql="delete from photogallary where id='".MS($this->Id)."'";
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
			$sql = "select * from photogallary where	id = '".MS($this->Id)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->Name = $d[1];
				$this->Picture = $d[2];
				$this->PhotoTypeId = $d[3];
			}
		}	
		
		public function Select()
		{
			$this->Connect();
			$a = "";
			
			$sql = "select photogallary.id, photogallary.name, photogallary.picture, phototype.name 
						from photogallary, phototype
						where photogallary.phototypeid = phototype.id";
				
			
			if($this->PhotoTypeId > 0) {
				$sql .= " AND photogallary.phototypeid = '".MS($this->PhotoTypeId)."'";	
			}
			
			$sql .= " ORDER BY phototype.name ASC";
			
			//echo $sql;				
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}

	
}
?>