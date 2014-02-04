<?php	
	$con = mysql_connect("localhost","root","525228");
	mysql_query("set names 'utf8'");
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }
	  
	header("Content-type: text/html; charset=utf-8");
	
	if ((($_FILES["image"]["type"] == "image/gif")
|| ($_FILES["image"]["type"] == "image/jpeg")
|| ($_FILES["image"]["type"] == "image/pjpeg")))
  {
  if ($_FILES["image"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["image"]["error"] . "<br />";
    }
  else
    {
    echo "Upload: " . $_FILES["image"]["name"] . "<br />";
    echo "Type: " . $_FILES["image"]["type"] . "<br />";
    echo "Size: " . ($_FILES["image"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["image"]["tmp_name"] . "<br />";

    if (file_exists("../images/" . $_FILES["image"]["name"]))
      {
      echo $_FILES["image"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["image"]["tmp_name"],
      "../images/" . $_FILES["image"]["name"]);
      echo "Stored in: " . "../images/" . $_FILES["image"]["name"];
      }
    }
  }
else
  {
  echo "Invalid file";
}
	mysql_select_db("vanilla",$con);
	$imgurl = $_REQUEST['imgurl'];
	$pid = $_REQUEST['pid'];
	$result = mysql_query("insert into image(imgurl,pid) values('$imgurl','$pid')");
	
  ?>