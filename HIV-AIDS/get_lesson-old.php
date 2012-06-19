<html>
<body onload="player()">
</body>
<head>
<script type="text/javascript">

<?php
	//Include the database connection variables.

$dbhost = getenv('MYSQL_DB_HOST');
$dbuser = getenv('MYSQL_USERNAME');
$dbpass = getenv('MYSQL_PASSWORD');
$dbname = getenv('MYSQL_DB_NAME');

$dbcon = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql database.');

mysql_select_db($dbname);

	include 'common_files/header.php';
	
	
	$intro_sql = "SELECT * FROM  tme_audio_table WHERE  AudioID =79";


	$tp_solution = array();
	
	$i = 1;
	$temp = 1;
	
	$intro_result_aud = mysql_query($intro_sql);

	$intro_sql_img = "SELECT * FROM tme_image_table WHERE ImageID =26 AND LanguageID = 1";
	$intro_result_img = mysql_query($intro_sql_img);
	$temp = 0;
<<<<<<< HEAD
	//displayAudImgIntro($intro_result_img, $intro_result_aud);
=======
	displayAudImgIntro($intro_result_img, $intro_result_aud);
>>>>>>> a62ec8156c0c27a2319d7e6d908c9957e49859a7
	displayAudImgTP();
	?>


	<?
	function displayAudImgIntro($result_img, $result_aud) {
				$row_img = 	mysql_fetch_array($result_img);
				$row_aud = mysql_fetch_array($result_aud);
				?>
				<div id"video">
					<img src="<?php echo $row_img['Name']; ?>" title="1" id="image" alt="1blog" width="600" height="350"/>
					<audio id="audio" onended="displayAudImgTP()" controls preload>
					<source src="<?php echo $row_aud['Name']; ?>" type="audio/mpeg" />
					<embed height="50px" width="100px" src="<?php echo $row['Name']; ?>" />
					</audio>		
				</div>
	<?} 
	function displayAudImgTP() {
		$tp_sql = "SELECT * FROM tme_teaching_point WHERE  tpname = 1";
		$tp_rows = mysql_query($tp_sql);
		$num_rows = mysql_num_rows($tp_rows);
		$i = 0;
<<<<<<< HEAD
		$intro_sql_img = 'SELECT * FROM tme_image_table WHERE ImageID ="$tp_img" AND LanguageID = 1';
		$intro_sql_aud = 'SELECT * FROM  tme_audio_table WHERE  AudioID ="$tp_audio"';

=======
		
>>>>>>> a62ec8156c0c27a2319d7e6d908c9957e49859a7
		while($row = mysql_fetch_array($tp_rows)) {
				$tp_img = $row["ImageID"];
				$tp_audio = $row["AudioID"];
												
				$intro_sql_img = "SELECT * FROM tme_image_table WHERE ImageID = '$tp_img' AND LanguageID = 1";
				$intro_sql_aud = "SELECT * FROM tme_audio_table WHERE AudioID ='$tp_audio'";
				
				$intro_result_img = mysql_query($intro_sql_img);
				$intro_result_aud = mysql_query($intro_sql_aud);
								
				++$i;
				$JavaScript = "<script> $('#video').empty() </script>"; 
				displayAudImgIntro($intro_result_img,$intro_result_aud);
				
			}
	}
	?>
	</html>
