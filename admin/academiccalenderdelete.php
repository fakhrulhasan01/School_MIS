
<?php
$msg="";
$ac = new AcademicCalender();
$ac->Id = $_GET['id'];
if($ac->Delete()){
	$msg.="Delete successful.";
	}else{
		$msg.=$ac->Err;
		}
		Redirect("?a=academiccalender&msg={$msg}");
?>