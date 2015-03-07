<div class="row no-gutter">

<?php if(isset($_SESSION['adcid'])){
	if(isset($_GET['msg'])){
		echo "<center>".$_GET['msg']."</center>";
			}
		
	echo "<h3><a href='?v=logout'><center>Logout</center></a></h3>";
}else{?>

    <form action="?v=checkadminclarklogin" method="post">
    <div id="adlog">
    <table width="220" border="0" align="center">
    		<tr>
            	<th>
                <B><center>ADMIN CLARK LOGIN</center></B></th>
            </tr>
  			<tr>
    			<td><center>User Id</center></td>
  			</tr> 
   			<tr>
    			<td><center><input type="text" name="userid" /></center></td>
  			</tr> 
   			<tr>
    			<td><center>Password</center></td>
  			</tr>
  			<tr>
    			<td><center><input type="password" name="password" /></center></td>
  			</tr>
  			<tr>
    			<td><center><input type="submit" name="sub" value="Login" /></center></td>
  			</tr>
            
            
  			
		</table>
       </div>
	</form>
    <?php }?>
</div>