<div class="row no-gutter">



<?php
 $s = new Subject();
 $c = new Classs();
 $y = new Year();
 $se = new Section();
 $sh = new Shift();
 $t = new Teacher();

 if(isset($_POST['sub'])){
	 echo"You have selected.</br>";
	 $_SESSION['sid'] = $_POST['subjectid'];
	 $s->Id=$_SESSION['sid']; 
			 $s->SelectById();
			 if($_SESSION['sid'] == $s->Id){
			 echo "<b>Subject</b>&nbsp;=&nbsp;".$s->Name."</br>";
			 
			 }else{
				 echo "You have on selected any subject";
				 }
	 
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
		  echo '<a href="?t=result"><b>Go Ahead</b></a>';
		  echo '<b>&nbsp;Or&nbsp;</b>';
		  
          echo '<a href="?v=resultchecklogout"><b>Back</b></a>'; 
		  
 
 }

?> 


<script language="JavaScript"><!--
function setOptions(chosen) {
	var selbox = document.myform.subjectid;
	//alert(chosen);		
	selbox.options.length = 0;
	if (chosen == "") {
	  	selbox.options[selbox.options.length] = new Option('Please select one of the options above first', '0');	 
	}	
	<?php 
		$r = $c->Select();
		for($i=0; $i<count($r); $i++){
	?>	
		if(chosen == <?php echo $r[$i][0]; ?>){
			<?php 
				$s->ClassId = $r[$i][0];
				$rr = $s->Select();
				if($rr != ""){
					for($j=0; $j<count($rr); $j++){
			?>
						selbox.options[selbox.options.length] = new Option("<?php echo $rr[$j][1]; ?>", "<?php echo $r[$j][0]; ?>");		
		//alert("hi");
			<?php }//end inner loop
			}else{?>
			selbox.options[selbox.options.length] = new Option("No subject under this class", "");		
			<?php }?>
		}
	<?php }//end outer loop?>
}
//--></script>



<form action="" method="post" name="myform">
<?php if(isset($_SESSION['cid'])||
        (isset($_SESSION['yid']))){}else{?>


<table width="40%" border="0" align="center">
<center>If you want to entry paid amount then select below option or <a href="?t=result">click here</a> to go check paid amount page</center>

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
		    <select name="subjectid" class="form-control">
            	<option value="">Select Subject</option>
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