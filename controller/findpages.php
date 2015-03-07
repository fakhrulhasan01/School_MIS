<?php
if(isset($_GET['a'])){
	include_once("admin/" .$_GET['a']. ".php");
	}
	
	else if(isset($_GET['ad'])){
	include_once("administration/" .$_GET['ad']. ".php");
	}

	else if(isset($_GET['t'])){
	include_once("teacher/" .$_GET['t']. ".php");
	}
    
	else if(isset($_GET['s'])){
	include_once("student/" .$_GET['s']. ".php");
	}
	
	else if(isset($_GET['v'])){
	include_once("view/" .$_GET['v']. ".php");
	}
	
	else{
	include_once("view/home.php");
	}
?>