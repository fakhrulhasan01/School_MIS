<?php
class DB{
	
	public $Err;
	
	public function Connect(){
		mysql_connect("localhost", "root", "");
		mysql_select_db("finalproject");
	} 
}
?>


