<?php
$con = mysql_connect("localhost","root","525228");
mysql_query("set names 'utf8'");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
header('charset=utf-8');
mysql_select_db("vanilla");

$pid = $_REQUEST['pid'];

$result = mysql_query("delete from piece where pid = '$pid'");

if ($result) {
	echo "delete succeeded!";
}

?>