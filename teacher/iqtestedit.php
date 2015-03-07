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
$ecanswer="";
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
		$iq->Id = $_POST['id'];   
		$iq->QuestionNo = $_POST['qno'];
		$iq->SubjectNameId = $_POST['subjectnameid'];
		$iq->Question = $_POST['q'];
		$iq->Option1 = $_POST['op1'];
		$iq->Option2 = $_POST['op2'];
		$iq->Option3 = $_POST['op3'];
		$iq->Option4 = $_POST['op4'];
		$iq->Answer = $_POST['can'];
		if($iq->Update()){
		$msg.="Update successful.";
		}
		else{
		$msg.=$iq->Err;
		}
		Redirect("?t=iqtest&msg={$msg}");
	   }
	}
	
	$iq->Id = $_GET['id'];
	$iq->SelectById();

?>
<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
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
    <td width="240"><input type="text" name="qno" value="<?php echo $iq->QuestionNo;?>" /></td>
    <td width="170"><?php mer($equestionno);?></td>
    </tr>
    
    <tr>
    <td width="172">Subject</td>
    <td>
    <select name="subjectnameid">
    <option value="0">Select One</option>
    <?php
    $r = $sq->Select();
	SelectedFunction($r,$iq->SubjectNameId);
	?>
    </select>
    </td> <td width="170"><?php mer($esubjectnameid);?></td>
    </tr>
  
    <tr>
    <td width="172">Question</td>
    <td width="240"><input type="text" name="q" value="<?php echo $iq->Question;?>" /></td>
    <td width="170"><?php mer($equestion);?></td>
    </tr>
    
    <tr>
    <td width="172">Option1</td>
    <td width="240"><input type="text" name="op1" value="<?php echo $iq->Option1;?>" /></td>
    <td width="170"><?php mer($eoption1);?></td>
  
  
    </tr>
    <tr>
    <td width="172">Option2</td>
    <td width="240"><input type="text" name="op2" value="<?php echo $iq->Option2;?>" /></td>
    <td width="170"><?php mer($eoption2);?></td>
  </tr>
  
      <tr>
    <td width="172">Option3</td>
    <td width="240"><input type="text" name="op3" value="<?php echo $iq->Option3;?>" /></td>
    <td width="170"><?php mer($eoption3);?></td>
  </tr>
      <tr>
    <td width="172">Option4</td>
    <td width="240"><input type="text" name="op4" value="<?php echo $iq->Option4;?>" /></td>
    <td width="170"><?php mer($eoption4);?></td>
  </tr>
    <tr>
    <td width="172">Correct Answer</td>
    <td width="240"><input type="text" name="can" value="<?php echo $iq->Answer;?>" /></td>
    <td width="170"><?php mer($eanswer);?></td>
  </tr>
  
  <tr>
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Update" /></td>
  </tr>
</table>
</form>



</div>