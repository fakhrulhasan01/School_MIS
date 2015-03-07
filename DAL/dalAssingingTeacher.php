<?php
class AssigningTeacher extends DB{
	public $Id;
	public $ClassId;
	public $TeacherId;
	
	
	
	
	
	
	public function Insert(){
		$this->Connect();
		$sql = "insert into assigningteacher(classid, TeacherId) 
							
							values('".MS($this->ClassId)."',
								   '".MS($this->TeacherId)."')";
							 
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
	$sql="UPDATE assigningteacher 
					set
					    classid='".MS($this->ClassId)."',
						  TeacherId='".MS($this->TeacherId)."'
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
	$sql="delete from assigningteacher where id='".MS($this->Id)."'";
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
			$sql = "select * from assigningteacher where	id = '".MS($this->Id)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->TeacherId = $d[1];
				$this->ClassId = $d[2];			
			}
		}	
		
		

       
	   
	   public function Select(){
			$this->Connect();
			$a = "";
	        $sql = "select assigningteacher.classId, assigningteacher.TeacherId, teacher.name, 
			                             class.name 
						from assigningteacher, class, teacher
							where 
						assigningteacher.classid = class.id 
							and
						assigningteacher.teacherid = teacher.teacherid";

			if($this->ClassId > 0) {
			    $sql .= " AND assigningteacher.classid = '".MS($this->ClassId)."'";	
			}
			
			if($this->TeacherId > 0){
				$sql .= " AND assigningteacher.teacherid = '".MS($this->TeacherId)."'";
			}
			$sql .= " ORDER BY assigningteacher.id ASC";	
			
									//echo $sql;		
			
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}
		
		
		
		
		
		

	
}
?>