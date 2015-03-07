<div class="row no-gutter">
<?php 
$cuu = new ContactUsUser();
?>



                                
                                    <h4>User Massages</h4>
                                    <br />
                                    <table class="table table-hover table table-bordered ">
  <tr class="info">
    <td width="85">Name</td>
    <td width="111">Email</td>
    <td width="134">Contact Number</td>
    <td width="117">Location</td>
    <td width="155">Message Subject</td>
    <td width="296">Message</td>
    <td width="50">Delete</td>
  </tr>
  
  <tr>
  <?php 
  $r=$cuu->Select();
  Table($r,"showusermessage");
  ?>
    
  </tr>
</table>

</div>