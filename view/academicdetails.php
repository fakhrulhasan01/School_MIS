<div class="row no-gutter">
<?php
$data=0;
$j=0;
$act = new AcademicCalenderType();
$act->Id = $_GET['id'];
$act->SelectById();
?>

<div class="row small k-equal-height">
<table class="table table-bordered"> 
 <tr class="info">
    <td width="193">Name</td>
    <td width="497">Description</td>
    <td width="138">Description File</td>
    <td width="169">Post Date</td>
  </tr>
       <?php 
											$a= new AcademicCalender();
											$a->AcademicCalenderTypeId = $_GET['id'];
											$r=$a->Select();
											if($r !==""){
												for($i=0; $i<count($r); $i++){
									        ?>
	  
      
       <tr>
                <td><?php echo $r[$i][1];?></td>
                <td><?php FileRead("files/".$r[$i][2]);?></td>
                <td>
					<?php 
						if(substr($r[$i][3], -4) == ".pdf"){
							echo "<a href='largefiles/".$r[$i][3]."'>
							<img src='img/pdf.jpeg' width='22' height='20'/></a>";
				
				}else if((substr($r[$i][3], -4) == ".doc") || (substr($r[$i][3], -4) == "docx")){
				
						echo "<a href='largefiles/".$r[$i][3]."'>
						<img src='img/doc.png' width='22' height='20'/></a>";
						}				
					?>
                </td>
                <td><?php echo $r[$i][4];?></td>
             </tr>
<?php }}?>

</table>




</div>

</div>