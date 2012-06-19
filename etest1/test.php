<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AE</title>
</head>

<body>
HELLOOOO FROM ALIENVILLE
<?php

mysql_connect(
  $server = getenv('MYSQL_DB_HOST'),
  $username = getenv('MYSQL_USERNAME'),
  $password = getenv('MYSQL_PASSWORD'));
mysql_select_db(getenv('MYSQL_DB_NAME'));


$sql = "SELECT Name FROM `tme_image_table";
?>


</body>
</html>