<div class="row no-gutter">
<?php
	 
	 $c = new Classs();
     $y = new Year();
     $se = new Section();
     $sh = new Shift();
     $pop = new PayOrPaidAmountType();
 
	      
	 
	
 

   
     if(isset($_POST['sub'])){
		 
    echo"You have selected.</br>";
	 $_SESSION['cid'] = $_POST['classid'];
	 $c->Id=$_SESSION['cid']; 
			 $c->SelectById();
			 if($_SESSION['cid'] == $c->Id){
			 echo "<b>Class</b>&nbsp;=&nbsp;".$c->Name."</br>";
			 
			 }else{
				 echo "Other Class";
				 }
     $_SESSION['yid'] = $_POST['yearid'];
	 $_SESSION['yid'];
	      $y->Id=$_SESSION['yid'];
		  $y->SelectById();
		  if($_SESSION['yid'] == $y->Id){
		  echo "<b>Year</b>&nbsp;=&nbsp;" .$y->Name."</br>";
		  }else{}  
     
	 $_SESSION['seid'] = $_POST['sectionid'];
	  $_SESSION['seid'];
	     $se->Id=$_SESSION['seid'];
		 $se->SelectById();
		 if($_SESSION['seid'] == $se->Id){
		 echo "<b>Section</b>&nbsp;=&nbsp;".$se->Name."</br>";
		 }else{}  
    
	 $_SESSION['shid'] = $_POST['shiftid'];
	
	   $_SESSION['shid'];
	 $sh->Id=$_SESSION['shid'];
	  $sh->SelectById();
	 if($_SESSION['shid'] == $sh->Id){
	 echo "<b>Shift</b>&nbsp;=&nbsp;".$sh->Name."</br>";
	}else{}  
     
	 $_SESSION['popid'] = $_POST['popid']; 
	  $_SESSION['popid'];
	 $pop->Id=$_SESSION['popid'];
		  $pop->SelectById();
		  if($_SESSION['popid'] == $pop->Id){
		  echo "<b>Amount Type</b>&nbsp;=&nbsp;".$pop->Name."</br>";
		  }else{}
		  echo "<b>Are you sure? You want to entry this.</b>";
		  echo '<a href="?ad=paidamount"><b>Go Ahead</b></a>';
		  echo '<b>&nbsp;Or&nbsp;</b>';
		  
          echo '<a href="?v=selectpaidamountlogout"><b>Back</b></a>'; 
		  
    
	 
	 }
	
?> 

<form action="" method="post">
<?php if(isset($_SESSION['cid'])||
        (isset($_SESSION['yid']))){}else{?>
<center>If you want to entry paid amount then select below option or <a href="?ad=paidamount">click here</a> to go check paid amount page</center>
<table width="40%" border="0" align="center">

<h1><center>Select Class,Year  &nbsp; &nbsp;
</center></h1>
   
  
  <tr>
    <td height="41"><strong>Class</strong></td>
    <td>
    <select name="classid" id="inp">
    <option value="0">Select One Class</option>
    <?php
    $r = $c->Select();
	SelectFunction($r);
	?>
    </select>
    </td>
    <td></td>
  </tr> 
  
  
 
  <tr>
    <td height="41"><strong>Year Name</strong></td>
    <td>
    <select name="yearid" id="inp">
    <option value="0">Select One Year Name</option>
    <?php
    $r = $y->Select();
	SelectFunction($r);
	?>
    </select>
    </td>
    <td></td>
  </tr> 
  <tr>
    <td height="41"><strong>Section Name</strong></td>
    <td>
    <select name="sectionid" id="inp">
    <option value="0">Select One Year Name</option>
    <?php
    $r = $se->Select();
	SelectFunction($r);
	?>
    </select>
    </td>
    <td></td>
  </tr> 
  <tr>
    <td height="41"><strong>Shift Name</strong></td>
    <td>
    <select name="shiftid" id="inp">
    <option value="0">Select One Year Name</option>
    <?php
    $r = $sh->Select();
	SelectFunction($r);
	?>
    </select>
    </td>
    <td></td>
    </tr> 
    
    <tr>
    <td height="41"><strong>Type</strong></td>
    <td>
    <select name="popid" id="inp">
    <option value="0">Select One Type</option>
    <?php
    $r = $pop->Select();
	SelectFunction($r);
	?>
    </select>
    </td>
    <td></td>
    </tr>   

    <tr>
    <td></td>
    <td><input type="submit" name="sub" value="Go" /></td>
  </tr>
</table>
<?php }?>
</form>



</div>