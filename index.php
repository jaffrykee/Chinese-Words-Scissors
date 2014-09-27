<?php
	include_once("lib/init.php");
	if($_SESSION['user']!=NULL)
	{
		echo "<script type='text/javascript'>window.location.href='talk/index.htm';</script>";
	}
	else
	{
		echo "<script type='text/javascript'>window.location.href='user/login.htm';</script>";
	}
?>