<?php 
	$con = mysql_connect("localhost","root","525228");
	if (!$con) {
	die('Could not connect:' .mysql_error() );		
	}
	mysql_query("set names 'utf8'");
	mysql_select_db("vanilla");
	header("content-type:application/json;charset=utf-8");
//	$tid = $_REQUEST['tid'];
	$desc = $_REQUEST['secondaryTitleKey'];
	$name = $_REQUEST['mainTitleKey'];
	$scenename = $_REQUEST['sceneryname'];
	$persons = $_REQUEST['persons'];
	$uid = $_REQUEST['uid'];
	
//	echo()
	$result = mysql_query("insert into travel(sceneryname,description,tname,persons,uid)values(
	\"".$scenename."\",\"".$desc."\",\"".$name."\",".$persons.",".$uid.");");
	if($result){
	$newid = mysql_insert_id();
	echo("{
			\"result\":\"success\",
			\"tid\":\"".$newid."\"
			}");
			}
	else {
	echo("{
			\"result\":\"fail\",
			}");
	}
?>