<style type="text/css">
#main-border{
	height:auto;
	width:450px;
}
#top-div{
	height:42px;
	width:457px;
	text-align:center;
	color:#063;
	font-size:24px;
	background-color:#EB683D;
	padding:8px 0px 0px 0px;
	margin:-5px 0px 0px -4px;
}
#midle-div{
	background-color:#FFFFFF;
	height:200px;
	width:400px;
}
#midle-div-border{
	background-color:#EB683D;
	height:30px;
	width:200px;
	margin:50px 0px 0px 125px;
}
#midle-div-login{
	background-color:#F1F1F1;
	height:130px;
	width:200px;
	margin:0px 0px 0px 125px;
}
#down-div{
    height:50px;
	width:457px;
	background-color:#EB683D;
	margin:0px 0px -4px -4px;
}
#border{
	border: 3px #EB683D solid;
	margin:100px 0px 0px 400px;
}
</style>
<table width="450" id="border" align="center">
  <tr>
    <td>
    <div id="main-border">
    <div id="top-div">Teacher Login</div>
    <div id="midle-div">
    <div id="midle-div-border"></div>
    
    <div id="midle-div-login">
    <?php if(isset($_SESSION['tcid'])){
	if(isset($_GET['msg'])){
		echo "<center>".$_GET['msg']."</center>";
			}
		
	echo "<h3><a href='?v=logout'><center>Logout</center></a></h3>";
}else{?>

    <form action="../?v=checkteacher" method="post">
    <div id="adlog">
    <table width="200" border="0" align="center">
  			<tr>
    			<td><center>User Id</center></td>
  			</tr> 
   			<tr>
    			<td><center><input type="text" name="teacherid" /></center></td>
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

