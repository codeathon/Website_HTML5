<?php
	
	/*
 	* Author  --  FLIPTEAM@FRAMEHAWK.COM
 	* This files is used to close the database connection.
 	* To use this file - <?php include 'common_files/db_clos.php'; ?> (This is an example. Chage depending on the location.)
 	* The database connection variables are taken from the PHPFOG server and they need to change if other server is used.
 	*  
 	*/

	mysql_close($dbcon);	
?>