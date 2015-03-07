<?php
class AssigningClassForStudent extends DB{
	public $StudentId;
	public $ClassId;
	public $ClassRoll;
	public $YearId;
	public $SectionId;
	public $ShiftId;
	public $TeacherId;
	
	
	
	
	
	
	public function Insert(){
		$this->Connect();
		$sql = "insert into assigningclassforstudent(studentid,classid,classroll,yearid,
		                   sectionid,shiftid,teacherid) 
							
							values('".MS($this->StudentId)."',
							       '".MS($this->ClassId)."',
							       '".MS($this->ClassRoll)."',
							       '".MS($this->YearId)."',
							       '".MS($this->SectionId)."',
							       '".MS($this->ShiftId)."',
								   '".MS($this->TeacherId)."')";
							 
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
	 $sql = "select * from assigningclassforstudent where	
	                  studentid = '".MS($this->StudentId)."'";

			if($this->ClassId !="") {
			    $sql .= " AND classid = '".MS($this->ClassId)."'";	
			}
			if($this->YearId > 0){
				$sql .= " AND yearid = '".MS($this->YearId)."'";
			}
			if($this->ShiftId > 0){
				$sql .= " AND shiftid = '".MS($this->ShiftId)."'";
			}
			if($this->SectionId > 0){
				$sql .= " AND sectionid = '".MS($this->SectionId)."'";
			}
							 //echo $sql;
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->StudentId = $d[0];
				$this->ClassId = $d[1];	
				$this->ClassRoll = $d[2];
				$this->YearId = $d[3];
				$this->SectionId = $d[4];	
				$this->ShiftId = $d[5];
				$this->TeacherId = $d[6];			
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
    
	
	public function SelectClassRoll(){
			$this->Connect();
			$a = "";
	        $sql = "select asfc.classroll from assigningclassforstudent as asfc";

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
			$sql .= " ORDER BY asfc.classroll ASC";	
			
									echo $sql;		
			
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}
	
	
		
		
	
		
		
		

	
}
?>