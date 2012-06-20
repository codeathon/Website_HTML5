<?php
   
   //This page has the code for the HIV-AIDS lesson. It takes the header from header_common.
	//The database connections are also taken from common files folder.
	//Authors - FlipTeam@framehawk.com
	//Used in TME Project
		
    include 'common_files/db_connect.php';
	
	// Global variables declaration
	$intro_audio_link = "";
	$intro_image_link = "";
	$whoosh_transition_audio_link = "";
	$whoosh_transition_image_link = "";
	$teaching_points = array();									// To store all the teaching point links.
	$questions = array();										// To store all the question links.
	$quiz = array();											// To store all the quiz links.
	$total_questions = array();
	
	
	$language_code = "ENG";  	// This is for testing only. This needs to be passed from the UI.
	
	$current_teaching_point = 1;								// Specifies the current teaching point being pocessed.
	$current_question_point = 1;								// Specifies the current question beign processed.
						
		
	// Get the Total Teaching Points.
	$get_distinct_tp_slq = "SELECT COUNT( DISTINCT tpname ) as c FROM  tme_teaching_point";

	$get_distinct_tp_result =  mysql_query($get_distinct_tp_slq);
	$get_distinct_tp_rows = mysql_fetch_array($get_distinct_tp_result);			
	$tp_total_count = $get_distinct_tp_rows['c'];										
		
	// Get the Total Questions.
	$get_distinct_question_slq = "SELECT COUNT( DISTINCT LessonID ) as c FROM tme_question";

	$get_distinct_question_result =  mysql_query($get_distinct_tp_slq);
	$get_distinct_question_rows = mysql_fetch_array($get_distinct_tp_result);			
	$question_total_count = $get_distinct_question_rows['c'];
				
		
	// Get the Language ID from the Database.
	$get_language_id_slq = "SELECT * FROM tme_language WHERE Language LIKE '$language_code'";

	$get_language_id_result =  mysql_query($get_language_id_slq);
	$get_language_id_rows = mysql_fetch_array($get_language_id_result);			
	$language_id = $get_language_id_rows['LanguageID'];
	
	
	// Load the Whoosh Transition Content.			
	$whoosh_transition_audio_link = getAudioLink(56); 
	$whoosh_transition_image_link = getImageLink(22, $language_id);
	
		
	// Load all the Intro Content.
	$get_intro_slq = "SELECT * FROM tme_intro_table WHERE  `LanguageID` = '$language_id'");

	$get_intro_result =  mysql_query($get_intro_slq);
	$get_intro_rows = mysql_fetch_array($get_intro_result);			
	$intro_audio_link = getAudioLink($get_intro_rows['AudioID']); 
	$intro_image_link = getImageLink($get_intro_rows['ImageID'], $language_id);
			
	// Declaring the variables. 		
	$index = 0;							// Used in the second while loop. For loading all the quiz-es.

	while($current_teaching_point<=$tp_total_count) {
				
		// SQL to fetch all the Audio and Image IDs for the Teaching Point from the database.
		$tp_sql = "SELECT * FROM tme_teaching_point WHERE tpname LIKE '$current_teaching_point'";
		$tp_result = mysql_query($tp_sql);
		$j = 1;
		
		while($tp_rows = mysql_fetch_array($tp_result)){
									
			//Call the function to fetch all the Audio and Image Links.
			$teaching_points[$current_teaching_point][$j][0] = getAudioLink($tp_rows['AudioID']);   	
			$teaching_points[$current_teaching_point][$j][1] = getImageLink($tp_rows['ImageID'], $language_id);
			$teaching_points[$current_teaching_point][$j][2] = $tp_rows['order'];			
			$j++;
			
		}
					
		$total_questions[$current_teaching_point] = --$j;	
					
		//Increment the current teaching point number.		
		$current_teaching_point++;		
			
	}	
		
	// End of While Loop.
		
	while($current_question_point<=$question_total_count) {
			
	// SQL to fetch all the Audio and Image IDs for the Question from the database.
		$question_sql = "SELECT * FROM `tme_question` WHERE  `LessonID` = '$current_question_point'";
		$question_result = mysql_query($question_sql);
		$question_rows = mysql_fetch_array($question_result);
			
		//Call the function to fetch all the Audio and Image Links.
		if($question_rows['tpname']!=0) {
			$questions[$current_question_point][0] = getAudioLink($question_rows['AudioID']);   	
			$questions[$current_question_point][1] = getImageLink($question_rows['ImageID'], $language_id);
			$questions[$current_question_point][2] = $question_rows['order'];
			$questions[$current_question_point][3] = $question_rows['Answer'];
			$questions[$current_question_point][4] = getAudioLink($question_rows['positive']);
			$questions[$current_question_point][5] = getAudioLink($question_rows['negative']);
			$questions[$current_question_point][6] = $question_rows['tpname'];
		}
		else if ($question_rows['tpname']==0) {
			$quiz[$index] = 	$current_question_point;		// Store the Question Number for the Quiz.	
			$index++;	
		}
						
		//Increment the current question number.
		$current_question_point++;
						
	}		// End of While Loop.
		
		
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
<script type='text/javascript'>
	
	// Global Variables.
	var current_teaching_point = 1;
	var current_question = 1;
	var total_questions = <?php echo json_encode($total_questions); ?>;
	var teaching_points = <?php echo json_encode($teaching_points); ?>;
	var questions = <?php echo json_encode($questions); ?>;
	
	
	/* 
	 * This function is used to load the teaching points from the database and create a playlist for the player.
	 */	
	function load() {
		alert(total_questions[1]);
	}
		
	
</script>
</center>	
	<!--<?php include 'common_files/top_ribbon.php'; ?>-->
	<center>  		
  		 
	        	
    	<div class="img_slide_lesson">
	   		<img src='<?php echo $intro_image_link; ?>' width="600" height="450" id="image" usemap="#Map">
	   		<map name="Map" id="Map"> 
				 <area shape="poly" coords="450,325" href="#" alt="right" />
  					<area shape="poly" coords="451,325,467,314,484,314,499,319,514,326,523,336,515,346,498,357,477,362,463,357,452,348" href="#" alt="right" id="right"/>
  
  					<area shape="poly" coords="436,421,424,406,413,387,409,370,424,351,437,356,447,354,456,362,462,373,456,397" href="#" alt="down"  id="down" />	  
		    </map>
		    
		    <map name="Map2" id="Map2">
  				<area shape="poly" coords="460,206,460,204,451,189,447,172,451,159,461,141,472,122,481,102,492,90,502,104,513,126,523,143,532,165,535,181,531,191,519,206,492,196" href="#" alt="Up" id="up_question"/>
  
  				<area shape="poly" coords="492,376,476,351,460,320,449,293,451,274,459,259,466,256,478,260,492,264,503,262,514,254,524,261,530,270,535,284,529,309,513,337" href="#" alt="Down" id="down_question"/>
  
			</map>
		    
		    </div> 
	    
	    <div class="audio_lesson"> 	
	    	<div class="audio_js_player" style="display: none;">
	      		<audio id="myaudio">
	      			HTML5 audio not supported
				</audio>
			</div>
    		<button id="play" onclick="load();"> <img src="images/play_icon.png" width="128" height="128" alt="" id=""/> </button>
    		
    	</div> 
    <br/>	
    
   </div>
   
<?php
	// Closee all the database connections.
	include 'common_files/db_close.php';
?>