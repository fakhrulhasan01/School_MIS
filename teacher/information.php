<tr>
    <td height="41"><strong>Class</strong></td>
    <?php 
		//echo $_SESSION['tcid']; 
			
				$assignTeacher = new AssigningTeacher();
				$assignTeacher->TeacherId = $_SESSION['tcid'];
				$classList = $assignTeacher->Select();
		?>
    <td>
    <select name="classid" id="inp">
    <option value="0">Select One Class</option>
     <?php
				for($i=0; $i<count($classList); $i++){
					echo "<option value='".$classList[$i][0]."'>".$classList[$i][3]."</option>";
				}
            ?>
       </select>
    </td>
    <td><?php mer($eclassid);?></td>
  </tr> 
  
  
  CREATE TABLE `teacher` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(25) NOT NULL,
  `picture` varchar(40) NOT NULL,
  `classid` int(10) NOT NULL,
  `groupp` varchar(20) NOT NULL,
  `academicqualification` varchar(30) NOT NULL,
  `trainingexprience` varchar(30) NOT NULL,
  `teachingarea` varchar(50) NOT NULL,
  `previousemployment` varchar(50) NOT NULL,
  `personalwebpage` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `paddress` varchar(20) NOT NULL,
  `peraddress` varchar(20) NOT NULL,
  `mobileno` varchar(20) NOT NULL,
  `teacherid` varchar(10) NOT NULL,
  `joiningdate` varchar(20) default NULL,
  `workingduration` varchar(10) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `unique_key_teacher` (`teacherid`),
  KEY `classid` (`classid`)
)



CREATE TABLE `assigningteacher` (
  `id` int(10) NOT NULL auto_increment,
  `teacherid` int(10) NOT NULL,
  `classid` int(10) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `teacherid` (`teacherid`),
  KEY `classid` (`classid`)
)


CREATE TABLE `result` (
  `id` int(10) NOT NULL auto_increment,
  `subjectid` int(10) NOT NULL,
  `examnameid` int(10) NOT NULL,
  `teacherid` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `fullmarks` varchar(5) NOT NULL,
  `subjectivemarks` varchar(4) NOT NULL,
  `objectivemarks` varchar(4) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `examnameid` (`examnameid`),
  KEY `userid` (`userid`),
  KEY `teacherid` (`teacherid`),
  KEY `subjectid` (`subjectid`)
)