<?php 
	$con = mysql_connect("localhost","root","525228");
	if (!$con) {
	die('Could not connect:' .mysql_error() );		
	}
	mysql_query("set names 'utf8'");
	mysql_select_db("vanilla");
	header("content-type:application/json;charset=utf-8");
	$username = $_REQUEST['username'];

	
	$result = mysql_query("select travel.tname ,travel.description,travel.tid from travel,user where username ='$username'and user.uid = travel.uid");
	
	echo("{
			\"travels\":[");
	
	while ($row = mysql_fetch_array($result)) {
//	var_dump($row);
	
	$tid = $row['tid'];
//	var_dump($tid);
	$image = mysql_query("select i.imgurl as iurl from image i ,piece p where p.tid = $tid and i.pid = p.pid ");
//	var_dump($image);
	$imgurl = mysql_fetch_array($image);
	echo("{
			\"mainTitleKey\":\"".$row['tname']."\",
			\"secondaryTitleKey\":\"".$row['description']."\",
			\"imageKey\":\"".$imgurl['iurl']."\",
			\"tid\":\"".$row['tid']."\",
			},				
			");

	}
	echo("				]
		}");
	

		
 ?>