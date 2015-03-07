<?php
class ClassBlog extends DB{
	public $Id;
	public $StudentId;
	public $TeacherId;
	public $ClassId;
	public $Description;
	public $Cdate;
	
	
	
	
	
	
	public function Insert(){
		$this->Connect();
		$sql = "insert into classblog(studentid, teacherid,classid,description) 
							
							values('".MS($this->StudentId)."',
								   '".MS($this->TeacherId)."',
								   '".MS($this->ClassId)."',
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
	$sql="UPDATE classblog set 
	                      studentid='".MS($this->StudentId)."',
	                      teacherid='".MS($this->TeacherId)."',
						  classid='".MS($this->ClassId)."',
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
	$sql="delete from classblog where id='".MS($this->Id)."'";
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
			$sql = "select * from classblog where	id = '".MS($this->Id)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->StudentId = $d[1];
				$this->TeacherId = $d[2];
				$this->ClassId = $d[3];
				$this->Description = $d[4];
			}
		}	
		
		
		public function Select()
		{
			$this->Connect();
			$a = "";
			$sql = "select * from classblog";
			 
			 if($this->ClassId >0){
					$sql .= " where classid = '".$this->ClassId."'";
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