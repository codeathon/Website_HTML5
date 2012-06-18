<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>TME</title>
	<link rel="stylesheet" type="text/css" href="css/960_files/reset.css" />
	<link rel="stylesheet" type="text/css" href="css/960_files/text.css" />
	<link rel="stylesheet" type="text/css" href="css/960_files/960.css" />
	<link rel="stylesheet" type="text/css" href="css/index.css" />	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script>
		$(".content").click(function(){
		 window.location=$(this).find("a").attr("href");
		 return false;
		});	
   </script>
   
   

<?php
	//This is a common header file.
	//This uses 960.gs CSS framework and it is necessary for all the pages that use this file 
	//to make use of that frame work.
	//This framework has been used for constructing the home page.
	//Authors - FlipTeam@framehawk.com
	//Used in TME Project
?>