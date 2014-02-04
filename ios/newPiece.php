<?php
$con = mysql_connect("localhost","root","525228");
mysql_query("set names 'utf8'");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
header('Content-type: application/json;charset=utf-8');
mysql_select_db("vanilla");
$spot = $_REQUEST['spot'];
$description = $_REQUEST['description'];
$latitude = $_REQUEST['latitude'];
$longitude = $_REQUEST['longitude'];
$date = $_REQUEST['date'];
$tid = $_REQUEST['tid'];

$query = "insert into piece(date,spotname,description,latitude,longitude,tid) values('$date','$spot','$description','$latitude','$longitude','$tid')";
$result = mysql_query($query, $con);
$pid = mysql_insert_id($con);

echo "{\"pid\":\"".$pid."\"}"

?>