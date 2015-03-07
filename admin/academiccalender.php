<div class="row no-gutter">
<?php
$a = new AcademicCalender();
$ty = new AcademicCalenderType();


$msg="";
$err=0;
$ename="";
$etypeid="";

if(isset($_POST['sub'])){
 
    if($_POST['name']==""){
      $err++;
      $ename .="Please enter name of title.";
      }
    else if(strlen($_POST['name'])<3){
	  $err++;
	  $ename.="Name  must be three character.";
	  }
	
	
	if($_POST['typeid']==0){
      $err++;
      $etypeid .="Please select a tpye.";
      }
    
	echo $err;
	if($err==0){
	$a->Name = $_POST['name'];
	$a->Description = CreateFile($_POST['des']);

	$a->AcademicCalenderTypeId = $_POST['typeid'];
   
   
   if(($_FILES['desfile']['type'] == "application/msword")
											||
				($_FILES['desfile']['type']  ==	"application/vnd.openxmlformats-officedocument.wordprocessingml.document")
											||
				($_FILES['desfile']['type']  ==	"application/octet-stream")
											||
				($_FILES['desfile']['type'] == "application/pdf")
											||
				($_FILES['desfile']['type'] == "application/vnd.ms-powerpoint")
											||
				($_FILES['desfile']['type'] == "application/vnd.openxmlformats-officedocument.presentationml.presentation")				
				){
					$a->DescriptionFile = UploadDocFile($_FILES['desfile']);
				}else{
					$a->DescriptionFile = "";					
				}
	
	if($a->Insert()){
	$msg .="Insert successful.";
	Redirect("?a=academiccalender&msg={$msg}");
	}
	else{
		$msg .=$a->Err;
	}
	
	
  }
}
 

 
?>


  


<center><h1>

Academic Calender
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</h1></center>
<form action="" method="post" enctype="multipart/form-data">
<table width="900" border="0" align="center">
  
  <tr>
    <td width="192">Name</td>
    <td width="541"><input type="text" name="name" /></td>
    <td width="153"><?php mer($ename);?></td>
  </tr>
  
  
  <tr>
    <td>Description</td>
    <td><textarea name="des" rows="10" cols="40"></textarea></td>
    <td></td>
  </tr>
  
  <tr>
    <td>DescriptionFile</td>
    <td><input type="file" name="desfile" />If you want to upload file please select it.</td>
    <td></td>
  </tr>
  
  
  <tr>
    <td>Type</td>
    <td>
    
  <select name="typeid">
    <option value="0">Select One Type</option>
    <?php
    $r = $ty->Select();
	SelectFunction($r);
	?>
    </select>
    </td>
    <td><?php mer($etypeid);?></td>
  </tr>
 
  <tr>
    <td><input type="reset" name="reset" value="Reset" /></td>
    <td><input type="submit" name="sub"  value="Insert" /></td>
    <td>&nbsp;</td>
  </tr>
 


</table>


</form>

<div class="col-lg-12">
                                
                                    <h6>Condensed Table</h6>
                                    <br />
                                    <table class="table table-condensed">
                                        <thead>
                                            <tr>
                                                <th width="108">Name</th>
                                                <th width="423">Description</th>
                                                <th width="158">Description File</th>
                                                <th width="112">Post Date</th>
                                                 <th width="131">Type Of Calender</th>
                                                <th width="55">Edit</th>
                                                <th width="63">Delete</th>
                                                </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <tr>
                                                 <?php 
										$r = $a->Select();
										Table($r, "academiccalender");
										?>
									        </tr>
                                             
                                        </tbody>
                                    </table>

                                </div>
                            
</div>