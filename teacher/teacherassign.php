<div class="main_body">
<?php 
$c = new Classs();
$t = new TeacherAssign();
$err=0;
$msg="";
if(isset($_POST['sub'])){
	
	if($_POST['classid']==""){
		$err++;
		$eclass.="Please select class name";
		}
		if($err==0){
		$t->TeacherId = $_SESSION['tcid'];
		$t->ClassId = $_POST['classid'];
		if($t->Insert()){
			$msg.="Insert successful";
			}
			else{
			$msg.=$t->Err;	
			}
		}
		Redirect("?t=teacherassign&msg={$msg}");
		
	}
	//echo $err;
?>
<form action="" method="post">
<table width="540" border="1">
  <tr>
    <td width="140">Select Class Name</td>
    <td width="146">
	<select name="classid">
    <option value="0">Select One</option>
    <?php
    $r = $c->Select();
	SelectFunction($r);
	?>
    </select></td>
    <td width="232">&nbsp;</td>
  </tr>
  <tr>
    <td><input type="reset" name="reset" value="Reset" /></td>
    <td><input type="submit" name="sub" value="Insert" /></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</div>