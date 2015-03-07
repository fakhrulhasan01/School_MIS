<div class="main_body">
<?php
$iq = new Iqtest();
$sq = new SubjectQuestion();
$msg="";
$err=0;
$equestionno="";
$esubjectnameid="";
$equestion="";
$eoption1="";
$eoption2="";
$eoption3="";
$eoption4="";
$eanswer="";
if(isset($_POST['sub'])){
	
	  if($_POST['qno']==""){
		$err++;
		$equestionno.="Please insert a  question no.";
	    }
	  
	  
	  if($_POST['subjectnameid']==0){
		$err++;
		$esubjectnameid.="Please select a subject.";
	    }
	  
	  
	  
	  if($_POST['q']==""){
		$err++;
		$equestion.="Please insert question.";
	    }
	  else if(strlen($_POST['q'])<3){
	   $err++;
	   $equestion.="Question name must be three character.";
	   }
	  
	  
	  
	  if($_POST['op1']==""){
		$err++;
		$eoption1.="Please insert answer.";
	    }
	  else if(strlen($_POST['op1'])<3){
	   $err++;
	   $eoption1.="answer name must be three character.";
	   }
	  
	  
	  if($_POST['op2']==""){
		$err++;
		$eoption2.="Please insert answer.";
	    }
	  else if(strlen($_POST['op2'])<3){
	   $err++;
	   $eoption2.="answer name must be three character.";
	   }
	  
	  if($_POST['op3']==""){
		$err++;
		$eoption3.="Please insert answer.";
	    }
	  else if(strlen($_POST['op3'])<3){
	   $err++;
	   $eoption3.="answer name must be three character.";
	   }
	  
	  if($_POST['op4']==""){
		$err++;
		$eoption4.="Please insert answer.";
	    }
	  else if(strlen($_POST['op4'])<3){
	   $err++;
	   $eoption4.="answer name must be three character.";
	   }
	  
	  if($_POST['can']==""){
		$err++;
		$eanswer.="Please insert correct answer.";
	    }
	   
	   if($err==0){
		$iq->QuestionNo=$_POST['qno'];
		$iq->SubjectNameId=$_POST['subjectnameid'];
		$iq->Question=$_POST['q'];
		$iq->Option1=$_POST['op1'];
		$iq->Option2=$_POST['op2'];
		$iq->Option3=$_POST['op3'];
		$iq->Option4=$_POST['op4'];
		$iq->Answer=$_POST['can'];
		if($iq->Insert()){
		$msg.="Insert successful.";
		}
		else{
		$msg.=$iq->Err;
		}
		Redirect("?t=iqtest&msg={$msg}");
	   }
	}

?>
<form action="" method="post">
<table width="596" border="0" align="center">

<h1><center>IQ Test  &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  <tr>
    <td width="172">QestionNo</td>
    <td width="240"><input type="text" name="qno" placeholder="Question No"/></td>
    <td width="170"><?php mer($equestionno);?></td>
  </tr>
   <tr>
    <td width="172">Subject</td>
    
    <td>
    <select name="subjectnameid">
    <option value="0">Select One</option>
    <?php
    $r = $sq->Select();
	SelectFunction($r);
	?>
    </select>
    </td> <td width="170"><?php mer($esubjectnameid);?></td>
  </tr>
  
    <tr>
    <td width="172">Question</td>
    <td width="240"><input type="text" name="q" placeholder="Questin"/></td>
    <td width="170"><?php mer($equestion);?></td>
  </tr>
    <tr>
    <td width="172">Option1</td>
    <td>
    <input type="text" name="op1" placeholder="option1" required="required" autocomplete="off" />
    </td>
    <td width="170"><?php mer($eoption1);?></td>
  </tr>
    <tr>
    <td width="172">Option2</td>
    <td width="240">
    <input type="text" name="op2" placeholder="option2" required="required" autocomplete="off" />
    </td>
    <td width="170"><?php mer($eoption2);?></td>
  </tr>
  
      <tr>
    <td width="172">Option3</td>
    <td width="240">
    <input type="text" name="op3" placeholder="option3" required="required" autocomplete="off" />
    </td>
    <td width="170"><?php mer($eoption3);?></td>
  </tr>
      <tr>
    <td width="172">Option4</td>
    <td width="240">
    <input type="text" name="op4" placeholder="option4" required="required" autocomplete="off" />
    </td>
    <td width="170"><?php mer($eoption4);?></td>
  </tr>
    <tr>
    <td width="172">Correct Answer</td>
    <td width="240">
    <input type="text" name="can" placeholder="answer" required="required" autocomplete="off" />
    </td>
    <td width="170"><?php mer($eanswer);?></td>
  </tr>
  
  <tr>
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Insert" /></td>
  </tr>
</table>
</form>

<table width="100%" border="1">
  <tr id="iq">
    <th width="82">Question No</th>
    <th width="131">Subject</th>
    <th width="150">Question</th>
    <th width="112">Option1</th>
    <th width="99">Option2</th>
    <th width="117">Option3</th>
    <th width="108">Option4</th>
    <th width="131">Answer</th>
    <th width="41">Edit</th>
    <th width="61">Delete</th>
  </tr>
 
  <tr>
 <?php 
 $r=$iq->Select();
 Table($r,iqtest);
 ?>
  </tr>
  
</table>


</div>