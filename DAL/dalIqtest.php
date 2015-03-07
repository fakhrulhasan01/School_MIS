<?php
	class Iqtest extends DB{
		public $Id;
		public $QuestionNo;
		public $SubjectNameId;
		public $Question;
		public $Option1;
		public $Option2;
		public $Option3;
		public $Option4;
		public $Answer;
		
		public function Insert() {
			$this->Connect();
			$sql = "insert into iqtest(questionno,subjectnameid,question,option1,option2 
							   ,option3,option4,answer)
						            values(
										   '".MS($this->QuestionNo)."',
										   '".MS($this->SubjectNameId)."',
										   '".MS($this->Question)."',
										   '".MS($this->Option1)."',
										   '".MS($this->Option2)."',
										   '".MS($this->Option3)."',
										   '".MS($this->Option4)."',
										   '".MS($this->Answer)."')";
									//echo $sql;
										
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		public function Update() {
			$this->Connect();
			$sql = "update iqtest
						set
							questionno = '".MS($this->QuestionNo)."',
							subjectnameid = '".MS($this->SubjectNameId)."',
							Question = '".MS($this->Question)."',
							option1 = '".MS($this->Option1)."',
							option2 = '".MS($this->Option2)."',
							option3 = '".MS($this->Option3)."',
							option4 = '".MS($this->Option4)."',
							answer = '".MS($this->Answer)."'
						where
							id = '".MS($this->Id)."'";
							//echo $sql;
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		
		
		public function Delete() {
			$this->Connect();
			$sql = "delete from iqtest
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
			$sql = "select * from iqtest where	id = '".MS($this->Id)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->QuestionNo = $d[1];
				$this->SubjectNameId = $d[2];
				$this->Question = $d[3];
				$this->Option1 = $d[4];
				$this->Option2 = $d[5];
				$this->Option3 = $d[6];
				$this->Option4 = $d[7];
				$this->Answer = $d[8];
			
			}
			}
		public function Select()
		{
			$this->Connect();
			$a = "";
			$sql = "select iqtest.id, iqtest.questionno,subject_question.subjectname,
			             iqtest.question, iqtest.option1,
			        iqtest.option2,iqtest.option3, iqtest.option4, iqtest.answer
						from iqtest, subject_question
						where iqtest.subjectnameid = subject_question.id order by id";
			
			
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$a[] = $d;	
			}
			return $a;
		}	
	
	
	
	
	
    
	
	    public function Result_check($data) {
        if (1 == 1) {
            if ($data[subject] == 'php'){
                $sql = "SELECT * FROM tbl_php WHERE qus_no ='$data[serial1]'";
                $sql2 = "SELECT * FROM tbl_php WHERE qus_no ='$data[serial2]'";
                $sql3 = "SELECT * FROM tbl_php WHERE qus_no ='$data[serial3]'";
                $sql4 = "SELECT * FROM tbl_php WHERE qus_no ='$data[serial4]'";
                $sql5 = "SELECT * FROM tbl_php WHERE qus_no ='$data[serial5]'";
            }
            
        }
        $sql = mysql_query($sql);
        // echo $sql;
        $sql2 = mysql_query($sql2);
        $sql3 = mysql_query($sql3);
        $sql4 = mysql_query($sql4);
        $sql5 = mysql_query($sql5);
        $i=0;
        while ($row = mysql_fetch_assoc($sql)) {
            if ($data[0] == $row['answer']) {
                $i=$i+1;
               //echo 'true' . '</br>';
            } //else {
                //echo 'false';
           // }
        }
        while ($row1 = mysql_fetch_assoc($sql2)) {
            if ($data[1] == $row1['answer']) {
                $i=$i+1;
                //echo 'true' . '</br>';
            } //else {
               // echo 'false' . '</br>';
            //}
        }
        while ($row2 = mysql_fetch_assoc($sql3)) {
            if ($data[2] == $row2['answer']) {
                $i=$i+1;
                //echo 'true' . '</br>';
            } //else {
               // echo 'false' . '</br>';
            //}
        }
        while ($row3 = mysql_fetch_assoc($sql4)) {
            if ($data[3] == $row3['answer']) {
                $i=$i+1;
                //echo 'true' . '</br>';
            }// else {
                //echo 'false' . '</br>';
            //}
        }
        while ($row4 = mysql_fetch_assoc($sql5)) {
            if ($data[4] == $row4['answer']) {
                $i=$i+1;
                //echo 'true' . '</br>';
            } //else {
               // echo 'false' . '</br>';
           // }
           //$subject=$row4['subject'];
        }
        //return $i;
        $subject=$data[subject];
         header("Location:user_View_Qus2.php?ms=$i&subject=$subject");
    }
	


	
	
}
	
	
	
	
	

?>