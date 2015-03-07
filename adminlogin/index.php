<style type="text/css">
#top-div{
	height:42px;
	width:457px;
	text-align:center;
	color:#000;
	font-size:24px;
	background-color:#8DFF9B;
	padding:8px 0px 0px 0px;
	margin:0px 0px 0px 0px;
}
#midle-div{
	background-color:#8DFF9B;
	height:200px;
	width:457px;
}
#midle-div-border{
	background-color:#bbbbbb;
	height:200px;
	width:200px;
	margin:0px 0px 0px 0px;
	float:left;
	position:relative;
}
#midle-div-login{
	background-color:#bbbbbb;
	height:200px;
	width:257px;
	float:left;
	position:relative;
	margin:7px 68px 16px 102px
}
#down-div{
    height:50px;
	width:457px;
	background-color:#8DFF9B;
	margin:0px 0px 0px 0px;
}
#border{
	border: 4px #5386FD;
	margin:50px 0px 0px 300px;
}
</style>
<table width="450" id="border" align="center">
  <tr>
    <td>
    <div id="top-div">Admen Login</div>
    <div id="midle-div">
   
    <div id="midle-div-login">
    <?php if(isset($_SESSION['adid'])){
	if(isset($_GET['msg'])){
		echo "<center>".$_GET['msg']."</center>";
			}
		
	echo "<h3><a href='?v=logout'><center>Logout</center></a></h3>";
}else{?>

    <form action="../?v=checkadministration" method="post" >
    <div id="adlog">
    <table width="200" border="0" align="center">
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
    
    </div>
    <div id="down-div"></div>
    
    </div>
    </td>
  </tr>
</table>

