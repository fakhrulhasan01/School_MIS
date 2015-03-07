<div class="row no-gutter">

<div class="left_col_photogallary_details" id="p">
<div class="left_col_photogallary_details_box">
<div class="left_col_photogallary_details_header">
<h1><center>International School & College</center></h1>
<br/>
<center>Photo Gallary of uor school</center>
</div>
<?php 
$g= new PhotoGallary();
$r=$g->Select();
if($r !==""){
	for($i=0; $i<count($r); $i++){
?>
<div class="left_col_photogallary_box">
<div class="left_col_photogallary_details_img">
<img src="images/<?php echo $r[$i][2];?>" width="200" height="190" /></div>
<div class="left_col_photogallary_details_name"><?php echo $r[$i][1];?></div>
<div class="left_col_photogallary_details_des"></div>
</div>
<?php }}?>


</div>

</div>


</div>