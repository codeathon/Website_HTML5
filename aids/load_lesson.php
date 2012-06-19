<?php
   
   //This page has the code for the HIV-AIDS lesson. It takes the header from header_common.
	//The database connections are also taken from common files folder.
	//Authors - FlipTeam@framehawk.com
	//Used in TME Project
		
    include 'common_files/db_connect.php';
	
	function loadAllLinks() {
		$current_teaching_point = 1;								// Specifies the current teaching point being pocessed.
		$current_question_point = 1;								// Specifies the current qquestion beign processed.		
		$tp_total_count = 12;										// Total Teaching Points
		$question_total_count = 20;									// Total Questions in the Lesson.
		$language_id = 1;											// 1 = ENGLISH Language (Default)
		
		$quiz_numbers = array(3,4,5,7,9,11,13,14,18,21);			// This array specifies the question numbers that we are using for quiz.
		$teaching_points = array();									// To store all the teaching point links.
		$questions = array();										// To store all the question links.
		$quiz = array();											// To store all the quiz links.
		
				
		while($current_teaching_point<=$tp_total_count) {
			
			// SQL to fetch all the Audio and Image IDs for the Teaching Point from the database.
			$tp_sql = "SELECT * FROM tme_teaching_point WHERE tpname LIKE '$current_teaching_point'";
			$tp_result = mysql_query($tp_sql);
			$tp_rows = mysql_fetch_array($tp_result);
			
			$tp_AudioID = $tp_row['AudioID'];
			$tp_ImageID = $tp_row['ImageID'];
			
			//Call the function to fetch all the Audio and Image Links.
			$teaching_points[0][$current_teaching_point] = getAudioLink($tp_AudioID);   	
			$teaching_points[1][$current_teaching_point] = getImageLink($tp_ImageID, $language_id);
			$teaching_points[2][$current_teaching_point] = $tp_row['order'];
			
			//Increment the current teaching point number.
			$current_teaching_point++;
		}
		
		while($current_question_point<=$question_total_count) {
			
			// SQL to fetch all the Audio and Image IDs for the Question from the database.
			$question_sql = "SELECT * FROM `tme_question` WHERE  `LessonID` = '$current_question_point'";
			$question_result = mysql_query($question_sql);
			$question_rows = mysql_fetch_array($question_result);
						
			$question_AudioID = $question_rows['AudioID'];
			$question_ImageID = $question_rows['ImageID'];
			$question_Positive = $question_rows['positive'];
			$question_Negative = $question_rows['negative'];
			
			
			//Call the function to fetch all the Audio and Image Links.
			$questions[0][$current_question_point] = getAudioLink($question_AudioID);   	
			$questions[1][$current_question_point] = getImageLink($question_ImageID, $language_id);
			$questions[2][$current_question_point] = $question_rows['order'];
			$questions[3][$current_question_point] = $question_rows['Answer'];
			$questions[4][$current_question_point] = getAudioLink($question_Positive);
			$questions[5][$current_question_point] = getAudioLink($question_Negative);
			$questions[6][$current_question_point] = $question_rows['tpname'];
			
			if (in_array($current_question_point,$people)) {
				$questions[7][$current_question_point] = 1;			// 1 - Question appears in the quiz.
			}
			
			$questions[7][$current_question_point] = 0;				// 0 - Question does not appear in the quiz.
			
			//Increment the current teaching point number.
			$current_teaching_point++;
			
		}
		
		
		$ques_rows = mysql_fetch_array($ques_result);
		
		
		
	}
		
	//This function takes in the Audio ID and return the CloudFront link to the resource.	
	function getAudioLink($AudioID) {
		$audio_sql = "SELECT * FROM  tme_audio_table WHERE  AudioID = '$AudioID'";
		$audio_query_result = mysql_query($audio_sql);
		$audio_rows = 	mysql_fetch_array($audio_query_result);
		$audio_link = $audio_rows['Name'];
		return $audio_link;
	}
	
	
	//This function takes in the Image ID and return the CloudFront link to the resource.
	function getImageLink($ImageID, $Lang) {
		$image_sql = "SELECT * FROM tme_image_table WHERE ImageID = '$ImageID' AND LanguageID = '$Lang'";
		$image_query_result = mysql_query($image_sql);
		$image_rows = mysql_fetch_array($image_query_result);
		$image_link = $image_rows['Name'];	
		return $image_link;
	}
	   
?>