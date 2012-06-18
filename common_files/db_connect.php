<?php

/*
 * Author  --  FLIPTEAM@FRAMEHAWK.COM
 * This files is used to initialize the database connection.
 * To use this file - <?php include 'common_files/db_connect.php'; ?> (This is an example. Chage depending on the location.)
 * The database connection variables are taken from the PHPFOG server and they need to change if other server is used.
 *  
 */


$dbhost = getenv('MYSQL_DB_HOST');
$dbuser = getenv('MYSQL_USERNAME');
$dbpass = getenv('MYSQL_PASSWORD');
$dbname = getenv('MYSQL_DB_NAME');

$dbcon = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql database.');

mysql_select_db($dbname);

?>