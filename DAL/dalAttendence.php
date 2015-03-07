<?php
class Attendence extends DB{
	public $Id;
	public $StudentId;
	public $ClassId;
	public $YearId;
	public $SectionId;
	public $ShiftId;
	public $TeacherId;
	public $Present;
	public $Absent;
	public $Date;
	
	
	
	
	
	
	public function Insert(){
		$this->Connect();
		$sql = "insert into attendence(studentid,classid,yearid,
		                   sectionid,shiftid,teacherid,present,absent) 
							
							values('".MS($this->StudentId)."',
							       '".MS($this->ClassId)."',
							       '".MS($this->YearId)."',
							       '".MS($this->SectionId)."',
							       '".MS($this->ShiftId)."',
								   '".MS($this->TeacherId)."',
								   '".MS($this->Present)."',
								   '".MS($this->Absent)."')";
							 
							
		
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
	$sql="UPDATE attendence 
					set
					      studentid='".MS($this->StudentId)."',
						  classid='".MS($this->ClassId)."',
						  yearid='".MS($this->YearId)."',
						  sectionid='".MS($this->SectionId)."',
						  shiftid='".MS($this->ShiftId)."',
						  TeacherId='".MS($this->TeacherId)."',
						  present='".MS($this->Present)."',
						  absent='".MS($this->Absent)."',
						  date='".MS($this->Date)."'
	                      
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
	$sql="delete from attendence where id='".MS($this->Id)."'";
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
	 $sql = "select * from attendence where id = '".MS($this->Id)."'";
							
							 //echo $sql;
		
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->StudentId = $d[1];
				$this->ClassId = $d[2];	
				$this->YearId = $d[3];
				$this->SectionId = $d[4];	
				$this->ShiftId = $d[5];
				$this->TeacherId = $d[6];
				$this->Present = $d[7];
				$this->Absent = $d[8];
				$this->Date = $d[9];			
			}
		}	
		
		

       
	   
	   public function Select(){
			$this->Connect();
			$a = "";
	        $sql = "select asfc.studentid, c.name, asfc.classroll, y.name,sec.name,sh.name,t.name,
			               s.name
			 
				from assigningclassforstudent as asfc, class as c, year as y, 
                        section as sec,
						shift as sh, teacher as t, student as s 
						where 
						asfc.classid = c.id 
					    and
						asfc.yearid = y.id
						and
						asfc.sectionid=sec.id
						and
						asfc.shiftid=sh.id
						and
						asfc.teacherid=t.teacherid
						and
						asfc.studentid=s.studentid";

			if($this->StudentId > 0) {
			    $sql .= " AND asfc.studentid = '".MS($this->StudentId)."'";	
			}
			
			if($this->ClassId > 0) {
			    $sql .= " AND asfc.classid = '".MS($this->ClassId)."'";	
			}
			
			if($this->YearId > 0){
				$sql .= " AND asfc.yearid = '".MS($this->YearId)."'";
			}
			if($this->ShiftId > 0){
				$sql .= " AND asfc.shiftid = '".MS($this->ShiftId)."'";
			}
			if($this->SectionId > 0){
				$sql .= " AND asfc.sectionid = '".MS($this->SectionId)."'";
			}
			$sql .= " ORDER BY asfc.studentid ASC";	
			
				//echo $sql;		
			
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}
    
	
	
	
		
		
	
		
		
		

	
}
?>