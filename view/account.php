<div class="row no-gutter">
<?php
if(isset($_GET['msg'])){
		echo "<center>".$_GET['msg']."</center>";
			}		
?>	
    <form action="?v=checkstudentaccount" method="post">
    <div id="adlog">
    <table width="220" border="0" align="center">
    		<tr>
            	<th>
                <B><center>Student Login</center></B></th>
            </tr>
  			<tr>
    			<td><center>User Id</center></td>
  			</tr> 
   			<tr>
    			<td><center><input type="text" name="studentid" /></center></td>
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

</div>