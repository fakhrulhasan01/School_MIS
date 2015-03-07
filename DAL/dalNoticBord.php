<?php
	class NoticBord extends DB{
		public $Id;
		public $Name;
		public $Description;
		public $DescriptionFile;
		public $NoticTypeId;
		public $Cdate;
		
		public function Insert() {
			$this->Connect();
			$sql = "insert into noticbord (name,description,descriptionfile,notictypeid)
								values
										('".MS($this->Name)."',
										 '".MS($this->Description)."',
										 '".MS($this->DescriptionFile)."',
										 '".MS($this->NoticTypeId)."')";
									
									echo $sql;
										
										
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		
		
		
		public function Update() {
			$this->Connect();
			$sql = "update noticbord 
						set
							name = '".MS($this->Name)."',
							description = '".MS($this->Description)."',
							descriptionfile = '".MS($this->DescriptionFile)."',
							notictypeid = '".MS($this->NoticTypeId)."'
							where id = '".($this->Id)."'";
			
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		
		
		
		public function Delete() {
			$this->Connect();
			$sql = "delete from noticbord 
						where
							id = '".MS($this->Id)."'";
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}
		
		
		
		
		public function SelectById() {
			$this->Connect();
			$sql = "select * from noticbord where	id = '".MS($this->Id)."'"; //echo $sql;
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->Name = $d[1];
				$this->Description = $d[2];
				$this->DescriptionFile = $d[3];
				$this->NoticTypeId = $d[4];
		
			}
		}	
		
		
		public function Select(){
			$this->Connect();
			$a = "";
			$sql = "select noticbord.id, noticbord.name, noticbord.description,
			        noticbord.descriptionfile,  noticbord.cdate, notictype.name 
					from noticbord, notictype
					where noticbord.notictypeid = notictype.id";
								
				
				if($this->NoticTypeId > 0){
					$sql .= " and noticbord.notictypeid = '".$this->NoticTypeId."'";
				}
				
				$sql .= " ORDER BY noticbord.id DESC";
			//echo $sql;			
				
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}
		
		
		public function Selectdetails(){
			$this->Connect();
			$a = "";
			$sql = "select  academiccalender.id, academiccalender.name,
			         academiccalender.description, academiccalender.descriptionfile, 
				         academiccalender.cdate
						 from academiccalender order by academiccalender.id desc";
								
				
				
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}
		
		
		
		
		public function SeePost(){
			$this->Connect();
			$a = "";
			$sql = "select s.id, u.name, s.name 
								from submit as s, user as u
								where s.userid=u.id";
				
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}
	}
?>