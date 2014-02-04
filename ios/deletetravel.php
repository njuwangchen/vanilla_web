<?php 
	$con = mysql_connect("localhost","root","525228");
	if (!$con) {
	die('Could not connect:' .mysql_error() );		
	}
	mysql_query("set names 'utf8'");
	mysql_select_db("vanilla");
//	header("content-type:application/json;charset=utf-8");
	$tid = $_REQUEST['tid'];
	
	$result = mysql_query("delete from travel where tid =".$tid);
//	echo("delete successfully");
?>