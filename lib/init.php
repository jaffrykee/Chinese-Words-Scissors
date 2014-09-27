<?php
	session_start(); 
	//error_reporting(E_ERROR | E_WARNING | E_PARSE);
	header("content-type:text/html;charset=utf-8");
	error_reporting(0);
	//ini_set("display_errors","Off");

	$db_host="127.0.0.1";
	$db_name="tokemi";
	$db_user="root";
	$db_password="rootroot";
	$con=mysql_connect($db_host,$db_user,$db_password);
		if(!$con){
			die('Could not connect:'.mysql_error());
		}
		mysql_select_db($db_name, $con);
		mysql_query("Set Names UTF8");
		
	function echo_Msg($str)
	{
		$en_str=urlencode($str);
		echo "<script type='text/javascript'>window.location.href='../user/msg.php?msg=".$en_str."';</script>";
	}
?>