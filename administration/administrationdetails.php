<div class="row no-gutter">

<div id="left_col_administration_details">
<?php 
$ad = new Administration();
$ad->Id = $_GET['id'];
$ad->SelectById();
?>

<div id="left_col_administration_details_des" style="border=2px; color:rgb(); font-size:19px; font-family: sans-serif;">
<div id="left_col_administration_details_img">
<img src="images/<?php echo $ad->Picture;?>" height="218" width="190"></div>
<div id="left_col_administration_details_name" style="color: peru"; ><?php echo $ad->Name;?></div>
<?php echo FileRead("files/" . $ad->Description);?>
</div>

</div>
</div>