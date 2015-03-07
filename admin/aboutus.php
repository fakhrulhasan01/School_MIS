<div class="row no-gutter">
<?php
$ab = new AboutUs();
$msg="";
$err=0;
$epicture="";
$edescription="";
$ename ="";
if(isset($_POST['sub'])){
	
	/*if($_POST['pic']==""){
		$err++;
		$epicture.="Please insert a picture.";
	   }
	*/   
	
	    if($_POST['des']==""){
			$err++;
			$edescription.="Please enter descriotion.";
			}
		else if(strlen($_POST['des'])<5){
			$err++;
			$edescription.="description must be five character.";
			}
		
		if($_POST['name']==""){
			$err++;
			$ename.="Please enter Name.";
			}
		else if(strlen($_POST['name'])<5){
			$err++;
			$ename.="name must be five character.";
			}
		
		
		echo $err;
	   
	   if($err==0){
		$ab->Picture = UploadPicture($_FILES['pic']);
		$ab->Description = CreateFile($_POST['des']);
		$ab->Name = $_POST['name'];
		if($ab->Insert()){
		$msg.="Insert successful.";
		}
		else{
		$msg.=$ab->Err;
		}
		//Redirect("?a=aboutus&msg={$msg}");
	   }
	}

?>
<form action="" method="post" enctype="multipart/form-data">
<table width="619" border="1" align="center">

<h1><center>About Us &nbsp; &nbsp;
<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
	}
?>
</center></h1>
  <tr>
    <td width="111">Picture</td>
    <td width="210"><input type="file" name="pic" /></td>
    <td width="284"><?php mer($epicture);?></td>

  </tr>
  <tr>
    <td width="111">Name</td>
    <td width="210"><input type="text" name="name" /></td>
    <td width="284"><?php mer($ename);?></td>

  </tr>
  
  <tr>
    <td width="111">Description</td>
    <td width="210"><textarea name="des" rows="10" cols="30"></textarea></td>
    <td width="284"><?php mer($edescription);?></td>

  </tr>
  
  <tr>
  
    <td><input type="reset" name="reset" /></td>
    <td><input type="submit" name="sub" value="Insert" /></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
<br>
<br>
<br>
<br>

                            
                            
                            
                                <div class="col-lg-12">
                                
                                    <h6>Condensed Table</h6>
                                    <br />
                                    <table class="table table-condensed">
                                        <thead>
                                            <tr>
                                                <th width="8">Picture</th>
                                                <th width="75">Description</th>
                                                <th width="74">Name</th>
                                                <th width="68">Edit</th>
                                                <th width="68">Delete</th>
                                                </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <tr>
                                                 <?php 
												 $r=$ab->Select();
												 Table($r,"aboutus");
												 ?>
									        </tr>
                                             
                                        </tbody>
                                    </table>

                                </div>
                            
                            
</div>