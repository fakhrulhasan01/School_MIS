<?php
class ClassMaterial extends DB{
	public $Id;
	public $ClassId;
	public $ClassMaterialTypeId;
	public $DocFile;
	public $AssigningTeacherId;
	public $Description;

	
	
	
	
	
	public function Insert(){
		$this->Connect();
		$sql = "insert into classmaterial
		        (classid, classmaterialtypeid, docfile, assigningteacherid,description) 
							
							values('".MS($this->ClassId)."',
							       '".MS($this->ClassMaterialTypeId)."',
								   '".MS($this->DocFile)."',
								   '".MS($this->AssigningTeacherId)."',
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
	$sql="UPDATE classmaterial set 
	                      classmaterialtypeid='".MS($this->ClassMaterialTypeId)."',
	                      docfile='".MS($this->DocFile)."',
					      assigningteacherid='".MS($this->AssigningTeacherId)."',
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
	$sql="delete from classmaterial where id='".MS($this->Id)."'";
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
			$sql = "select * from classmaterial where	id = '".MS($this->Id)."'"; echo $sql;
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->ClassMaterialTypeId = $d[1];
				$this->DocFile = $d[2];
				$this->AssigningTeacherId = $d[3];
				$this->Description = $d[4];
			}
		}	
		
		
		public function Select()
		{
			$this->Connect();
			$a = "";
			$sql = "select cl.id,clt.name,cl.docfile, cl.description,cl.cdate,c.name, t.name 
			        from 
					classmaterial as cl,classmaterialtype as clt, assigningteacher as at,
					class as c,teacher as t
					  
					  where cl.classmaterialtypeid = clt.id
					  and
					  cl.assigningteacherid = at.teacherid
					  and at.teacherid = t.teacherid
					  and 
					  cl.classid = at.classid
					  and
					  at.classid = c.id
					  group by cl.id";
						
				if($this->ClassId > 0) {
			    $sql .= " AND cl.classid = '".MS($this->ClassId)."'";	
			}
			$sql .= " ORDER by cl.id ASC";	
			
						 
			
			//echo $sql;
			
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}
		
		
		
		
		

	
}
?>
