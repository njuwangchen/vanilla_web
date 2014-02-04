 <?php 
$con = mysql_connect("localhost","root","525228");
 if (!$con)
   {
   die('Could not connect: ' . mysql_error());
   }
mysql_query("set names 'utf8'");
mysql_select_db("vanilla", $con);
header("Content-Type:application/json; charset=utf-8");
$username = $_POST['username'];

 $result = mysql_query("SELECT * FROM user
 WHERE username='$username'");
 
// var_dump($result);
 
 $row = mysql_fetch_array($result);
 
//var_dump($row);
 
 echo "{
 			\"user\":
 				{
 					\"username\":\"".$row['username']."\",
 					\"brief\":\"".$row['description']."\",
 					\"email\":\"".$row['email']."\", 
 					\"phone\":\"".$row['phone']."\",
 					\"headImageKey\":\"".$row['headportrait']."\",
 					\"place\":\"".$row['location']."\",
 					
 				}
 }";
 
 ?>