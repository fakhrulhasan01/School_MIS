<div class="row no-gutter">



<?php
 $c = new Classs();
 $y = new Year();
 $se = new Section();
 $sh = new Shift();
 $t = new Teacher();

 if(isset($_POST['sub'])){
	 echo"You have selected.</br>";
	     $_SESSION['cid'] = $_POST['classid'];
	     $c->Id=$_SESSION['cid']; 
			 $c->SelectById();
			 if($_SESSION['cid'] == $c->Id){
			 echo "<b>Class</b>&nbsp;=&nbsp;".$c->Name."</br>";
			 
			 }else{
				 echo "You have on selected any class";
			 }
 

 
	 $s = $_SESSION['tcid'];
     $_SESSION['tid']= $s;
	 $t->TeacherId= $_SESSION['tid'];
	 $t->SelectById();
	 if($_SESSION['tid']==$t->TeacherId){
		echo "<b>Teacher</b>&nbsp;=&nbsp;".$t->Name."</br>"; 
		 }else{}
		 
	 $_SESSION['yid'] = $_POST['yearid'];
     $y->Id=$_SESSION['yid'];
	 $y->SelectById();
	 if($_SESSION['yid']==$y->Id){
		 echo "<b>Year</b>&nbsp;=&nbsp;".$y->Name."</br>";
		 }
		 else{
		echo "You have on selected any year";	 
		} 
	

 
	 $_SESSION['seid'] = $_POST['sectionid'];
	 $se->Id=$_SESSION['seid'];
	 $se->SelectById();
	 if($_SESSION['seid']==$se->Id){
		echo "<b>Section</b>&nbsp;=&nbsp;".$se->Name."</br>"; 
		 }
		 else{
			 echo "You have on selected any section";
			 } 

	 $_SESSION['shid'] = $_POST['shiftid'];
	 $sh->Id=$_SESSION['shid'];
	 $sh->SelectById();
	 if($_SESSION['shid']==$sh->Id){
		 echo "<b>Shift</b>&nbsp;=&nbsp;".$sh->Name."</br>"; 
		 }
		 else{
		 echo "You have on selected any shift";
		 }
		  echo "<b>Are you sure? You want to entry this.</b>";
		  echo '<a href="?t=attendence"><b>Go Ahead</b></a>';
		  echo '<b>&nbsp;Or&nbsp;</b>';
		  
          echo '<a href="?v=attendencechecklogout"><b>Back</b></a>'; 
		  
 
 }

?> 



<form action="" method="post" name="myform">
<?php if(isset($_SESSION['cid'])||
        (isset($_SESSION['yid']))){}else{?>


<table width="40%" border="0" align="center">
<center>If you want to entry paid amount then select below option or <a href="?t=attendence">click here</a> to go check paid amount page</center>

<h1><center>Select Subject,Class,ExamName,Year  &nbsp; &nbsp;
</center></h1>

<div class="row">
 

	<div class="col-lg-12 marg">
    	<div class="col-lg-2">
        </div>
        <div class="col-lg-3">
		    <select name="classid" class="form-control" 
            onchange="setOptions(document.myform.classid.options
                             [document.myform.classid.selectedIndex].value);">
            	<option value="">Select Class</option>
                <?php 
					$rowClass = $c->Select();
					SelectFunction($rowClass);
				?>
            </select>
        </div>
    </div>
 	 
<div class="col-lg-12 marg">
    	<div class="col-lg-2">
        </div>
        <div class="col-lg-3">
		    <select name="yearid" class="form-control">
            	<option value="">Select year</option>
                <?php 
					$rowYear = $y->Select();
					SelectFunction($rowYear);
				?>
            </select>
        </div>
    </div>

<div class="col-lg-12 marg">
    	<div class="col-lg-2">
        </div>
        <div class="col-lg-3">
		    <select name="sectionid" class="form-control">
            	<option value="">Select Section</option>
                <?php 
					$rowSection = $se->Select();
					SelectFunction($rowSection);
				?>
            </select>
        </div>
    </div>

<div class="col-lg-12 marg">
    	<div class="col-lg-2">
        </div>
        <div class="col-lg-3">
		    <select name="shiftid" class="form-control">
            	<option value="">Select Shift</option>
                <?php 
					$rowShift = $sh->Select();
					SelectFunction($rowShift);
				?>
            </select>
        </div>
    </div>
  

	<div class="col-lg-12 marg">
    	<div class="col-lg-2">
        </div>
        <div class="col-lg-3">
		    <input type="submit" name="sub" class="btn btn-info btn-md" style="margin-left:228px" value="GO" />
        </div>
    </div>

</div>
<?php }?>
</form>




</div>