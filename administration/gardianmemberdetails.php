<div class="main_body">

<div class="left_col_gardianmember_details_in">
<?php 
$g = new GardianMember();
$g->Id = $_GET['id'];
$g->SelectById();
?>

<div class="left_col_gardianmember_details_in_box">

<div class="left_col_gardianmember_details_in_box_header">
<h1><center>International School & College</center></h1>
<br/>
<center>Personal Information Of Our Gardian Member</center>
</div>

<div class="left_col_gardianmember_details_in_img">
<img src="images/<?php echo $g->Picture;?>" height="200" width="240"></div>
<div class="left_col_gardianmember_details_in_name">&nbsp;<?php echo $g->Name;?></div>
<div class="left_col_gardianmember_details_in_designation"></div>
<div class="left_col_gardianmember_details_in_des"><?php FileRead("files/".$g->Description);?></div>
</div>


</div>
</div>