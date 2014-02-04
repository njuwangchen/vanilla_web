<?php
$con = mysql_connect("localhost","root","525228");
mysql_query("set names 'utf8'");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
header('Content-type: application/json;charset=utf-8');

$travelid = $_REQUEST['tid'];

mysql_select_db("vanilla", $con);

$result = mysql_query("select * from piece where tid = $travelid");

echo "{\"pieces\":[";

$images = array();
while ($row = mysql_fetch_array($result)) {
	echo "{";
	echo "\"date\":\"".$row['date']."\",";
	echo "\"spot\":\"".$row['spotname']."\",";
	echo "\"description\":\"".$row['description']."\",";
	echo "\"latitude\":".$row['latitude'].",";
	echo "\"longitude\":".$row['longitude'].",";
	
	$pid = $row['pid'];
	echo "\"pid\":".$pid.",";
	
	echo "\"images\":[";
	$img_result = mysql_query("select * from image where pid = $pid");
	while ($img = mysql_fetch_array($img_result)) {
		$imgurl = $img['imgurl'];
		echo "\"$imgurl\",";
	}
	echo "]";
	echo "},";
}

echo "]}";

?>