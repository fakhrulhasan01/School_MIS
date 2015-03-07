<?php
class CommonBlog extends DB{
	public $Id;
	public $StudentId;
	public $TeacherId;
	public $Description;
	public $Cdate;
	
	
	
	
	
	
	public function Insert(){
		$this->Connect();
		$sql = "insert into blog(studentid,teacherid,description) 
							
							values('".MS($this->StudentId)."',
								   '".MS($this->TeacherId)."',
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
	$sql="UPDATE blog set 
	                      studentid='".MS($this->StudentId)."',
						  teacherid='".MS($this->TeacherId)."',
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
	$sql="delete from blog where id='".MS($this->Id)."'";
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
			$sql = "select * from blog where	id = '".MS($this->Id)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->StudentId = $d[1];
				$this->TeacherId = $d[2];
				$this->Description = $d[3];
			}
		}	
		
		
		public function Select()
		{
			$this->Connect();
			$a = "";
			$sql = "select  * from  blog";
						
						
			//echo $sql;
			
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}
		
		
		
		
		

	
}
?>