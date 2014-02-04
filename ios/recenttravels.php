<?php 
	$con = mysql_connect("localhost","root","525228");
	if (!$con) {
	die('Could not connect:' .mysql_error() );		
	}
	mysql_query("set names 'utf8'");
	mysql_select_db("vanilla");
	header("content-type:application/json;charset=utf-8");
	$username = $_REQUEST['username'];

//	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	
//	$result = mysql_query("select t1.tid,t1.tname,t1.description from travel t1 where ( select count(*) from travel t2 where t2.tid > t1.tid and t1.uid = t2.uid and t1.uid =(select u.uid from user u where u.username=\"".$username."\")  ) <3 order by t1.tid;");
	$result = mysql_query("select t.tid,t.tname,t.description from travel t , user u where u.uid=t.uid and u.username =\"".$username."\" ");
	
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
			\"tid\":\"".$row['tid']."\",
			\"mainTitleKey\":\"".$row['tname']."\",
			\"secondaryTitleKey\":\"".$row['description']."\",
			\"imageKey\":\"".$imgurl['iurl']."\",
			},				
			");

	}
	echo("				]
		}");
	

		
 ?>