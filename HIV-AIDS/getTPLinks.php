<?php
    // This file returns the link to 
    
    include '../common_files/db_connect.php';
	
	$AudString = "";
	$ImgString = "";
	
	$tp_number = $_GET['tp_number'];
	$Lang_ID = $_GET['lang'];
	
	$tp_rows = getResourceIDs($tp_number);	
				
	while ($row = mysql_fetch_array($tp_rows)) { 
			$tp_AudioID = $row['AudioID'];
			$tp_ImageID = $row['ImageID'];
			$aud_link  = getAudioLink($tp_AudioID);
			$img_link = getImageLink($tp_ImageID, $Lang_ID);
			$AudString = $AudString.";".$aud_link;
			$ImgString = $ImgString.";".$img_link;
			 
	}
	
	echo ("$AudString,$ImgString");
	
	//This function takes in the Audio ID and return the CloudFront link to the resource.	
	function getAudioLink($AudioID) {
		$aud_sql = "SELECT * FROM  tme_audio_table WHERE  AudioID = '$AudioID'";
		$aud_result = mysql_query($aud_sql);
		$row_aud = 	mysql_fetch_array($aud_result);
		$audio_link = $row_aud['Name'];
		return $audio_link;
	}
	
	//This function takes in the Teaching Point Number of the lesson and return the corresponding Resource IDs.
	function getResourceIDs ($tp_number) {
		$tp_sql = "SELECT * FROM tme_teaching_point WHERE  tpname = '$tp_number'";
		$res_rows = mysql_query($tp_sql);
		return $res_rows;
	}
	
	//This function takes in the Image ID and return the CloudFront link to the resource.
	function getImageLink($ImageID, $Lang) {
		$img_sql = "SELECT * FROM tme_image_table WHERE ImageID = '$ImageID' AND LanguageID = '$Lang'";
		$img_result = mysql_query($img_sql);
		$row_img = mysql_fetch_array($img_result);
		$image_link = $row_img['Name'];	
		return $image_link;
	}	
    
?>