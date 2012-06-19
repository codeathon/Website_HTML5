 <?php
	
	//This page has the code for the HIV-AIDS lesson. It takes the header from header_common.
	//The database connections are also taken from common files folder.
	//Authors - FlipTeam@framehawk.com
	//Used in TME Project
		
    include 'common_files/db_connect.php';
		
	//This function takes in the Audio ID and return the CloudFront link to the resource.	
	function getAudioLink($AudioID) {
		$aud_sql = "SELECT * FROM  tme_audio_table WHERE  AudioID = '$AudioID'";
		$aud_result = mysql_query($aud_sql);
		$row_aud = 	mysql_fetch_array($aud_result);
		$audio_link = $row_aud['Name'];
		return $audio_link;
	}
	
	//This function takes in the Image ID and return the CloudFront link to the resource.
	function getImageLink($ImageID, $Lang) {
		$img_sql = "SELECT * FROM tme_image_table WHERE ImageID = '$ImageID' AND LanguageID = '$Lang'";
		$img_result = mysql_query($img_sql);
		$row_img = mysql_fetch_array($img_result);
		$image_link = $row_img['Name'];	
		return $image_link;
	}
	
	//This function takes in the Teaching Point Number of the lesson and return the corresponding Resource IDs.
	function getResourceIDs ($tp_number) {

	//	$tp_sql = "SELECT * FROM tme_teaching_point WHERE tpname = 2";
	  $tp_sql = "SELECT * FROM `tme_teaching_point` GROUP BY `AudioID` ORDER BY `tpid` ASC ";
	//	$tp_sql = "SELECT * FROM tme_teaching_point ORDER BY tpid ASC GROUP BY AudioID";

		$res_rows = mysql_query($tp_sql);
		return $res_rows;
	}
	
	//This function takes in the Lesson ID and returns the corresponding Quiz Resource IDs.
	function getQuizResourceIDs ($Quiz_lesson_id, $tp_id) {
		$Quiz_sql = "SELECT * FROM  `tme_question` WHERE  `LessonID` = '$Quiz_lesson_id' AND  `tpname` = '$tp_id' ORDER BY  `order` ASC ";
		$Q_res_rows = mysql_query($Quiz_sql);
		return $Q_res_rows;
	}
	
	function getDistinctQuestions($tp_id) {
		$question_sql = "SELECT DISTINCT LessonID FROM tme_question WHERE tpname = '$tp_id' ORDER BY LessonID ASC";
		$question_rows = mysql_query($question_sql);
		return $question_rows;		 
	}
	
	
	function checkAnswer() {
		$answer_sql = "SELECT DISTINCT  `Answer` FROM  `tme_question` WHERE  `LessonID` =1";
		$answer_rows = mysql_query($answer_sql);
		$ans = mysql_fetch_array($answer_rows);
		$right_ans = $ans['Answer'];
		return $right_ans;
	}
	
	//These variables set the lesson Language and the Intro Audio and Image links.
	$Lang_ID = 1;							// Language ID - 1 -ENGLISH
	$Intro_Audio_ID = 79;
	$Intro_Image_ID = 112;
	
	//Utility Variables - Question Mark, Right Answer, Wrong Answer
	$Ques_img_ID = 22;
	$Ques_whoosh_aud_id = 56;
	$tp_ID = 1;	//Current TP Number for the Questions
	
	//Variable to hold the current Teaching point Number.
	$tp_number = 1;							//Starts from 1.
	
	
	$Questions_for_TP = 1;	
	// Variable to detect current status -
	// 1 = teaching point
	// 2 = question
	
	$current = 1;
	
	$question_number = 1;    //This is used for retrieveing the solution for the questions asked.
	
?> 	
	<script type='text/javascript'>
	
	var tp_playlist = [];
	var tp_imagelist = [];
	var tp2_playlist = [];
	var tp2_imagelist = [];
	var tp3_playlist = [];
	var tp3_imagelist = [];
	var tp4_playlist = [];
	var tp4_imagelist = [];
	var tp5_playlist = [];
	var tp5_imagelist = [];
	var tp6_playlist = [];
	var tp6_imagelist = [];
	var tp7_playlist = [];
	var tp7_imagelist = [];
	var tp8_playlist = [];
	var tp8_imagelist = [];
	var tp9_playlist = [];
	var tp9_imagelist = [];
	var tp10_playlist = [];
	var tp10_imagelist = [];
	var tp11_playlist = [];
	var tp11_imagelist = [];
	var tp12_playlist = [];
	var tp12_imagelist = [];
	var que_playlist = [];
	var que_imagelist = [];
	var que2_playlist = [];
	var que2_imagelist = [];
	var que3_playlist = [];
	var que3_imagelist = [];
	var que4_playlist = [];
	var que4_imagelist = [];
	var que5_playlist = [];
	var que5_imagelist = [];
	var que6_playlist = [];
	var que6_imagelist = [];
	var que7_playlist = [];
	var que7_imagelist = [];
	var rt_playlist = [];
	var wr_playlist = [];
	var rt_imagelist = [];
	var wr_imagelist = [];
	var tp_num = 1;
	var quiz_num = 1;
	var current_pointer = 1;
	var sub_pointer = 1;

	<?php include 'HIV-AIDS/teaching_points.php'; ?>
	
	/*
	 * This function is used to load the Questions after each teaching point, from the database.
	 */	
	function loadQuestions() {
			   var index = 0;			
		<?php		
				
				//Fetch the Question
				$quiz_rows = getQuizResourceIDs(1, 1);	
				
							
				while ($q_row = mysql_fetch_array($quiz_rows)) { 
					$q_AudioID = $q_row['AudioID'];
					$q_ImageID = $q_row['ImageID'];												
		?>
					que_playlist[index] = '<?php echo getAudioLink($q_AudioID); ?>';
					que_imagelist[index++] = '<?php echo getImageLink($q_ImageID, $Lang_ID); ?>';					
					
		<?php	} // END of Quiz Portion - While Loop. ?>
		
	}
	
	function loadQuestions2() {
			   var index = 0;			
		<?php		
				
				//Fetch the Question
				$quiz_rows = getQuizResourceIDs(2, 1);	
				
							
				while ($q_row = mysql_fetch_array($quiz_rows)) { 
					$q_AudioID = $q_row['AudioID'];
					$q_ImageID = $q_row['ImageID'];												
		?>
					que2_playlist[index] = '<?php echo getAudioLink($q_AudioID); ?>';
					que2_imagelist[index++] = '<?php echo getImageLink($q_ImageID, $Lang_ID); ?>';					
					
		<?php	} // END of Quiz Portion - While Loop. ?>
		
	}
	
	function loadQuestions3() {
			   var index = 0;			
		<?php		
				
				//Fetch the Question
				$quiz_rows = getQuizResourceIDs(1, 2);	
				
							
				while ($q_row = mysql_fetch_array($quiz_rows)) { 
					$q_AudioID = $q_row['AudioID'];
					$q_ImageID = $q_row['ImageID'];												
		?>
					que3_playlist[index] = '<?php echo getAudioLink($q_AudioID); ?>';
					que3_imagelist[index++] = '<?php echo getImageLink($q_ImageID, $Lang_ID); ?>';					
					
		<?php	} // END of Quiz Portion - While Loop. ?>
		
	}	
	/*
	 * This function is used to load the new Map for the image.
	 */
	function changeMap(mapName){
		if (document.all) document.all.image.setAttribute('useMap', mapName) 
		else if (document.getElementById) document.getElementById('image').useMap = mapName; 
	}
		
	function loadRightMessage() {
		var index = 0;
		
		/*
		 * The Aud ID and Img ID correspond to the correct sound and img.
		 */
		rt_playlist[index] = '<?php echo getAudioLink(151); ?>';
		rt_imagelist[index++] = '<?php echo getImageLink(100, $Lang_ID); ?>';
		
		rt_playlist[index] = '<?php echo getAudioLink(58); ?>';
		rt_imagelist[index++] = '<?php echo getImageLink(100, $Lang_ID); ?>';					
					
	}
	
	function loadWrongMessage() {
		var index = 0;
		
		/*
		 * The Aud ID and Img ID correspond to the correct sound and img.
		 */
		wr_playlist[index] = '<?php echo getAudioLink(53); ?>';
		wr_imagelist[index++] = '<?php echo getImageLink(23, $Lang_ID); ?>';
		
		wr_playlist[index] = '<?php echo getAudioLink(52); ?>';
		wr_imagelist[index++] = '<?php echo getImageLink(23, $Lang_ID); ?>';					
					
	}	
	
	/*
	 * This function is used to load the Quiz from the database.
	 */	
	
	
	function onCorrectClick() {
		loadRightMessage();
		if(current_pointer == 1) {
		//sub_pointer
			loadQuestions2(); 
			var new_playlist = rt_playlist.concat(que2_playlist);
			var new_imglist = rt_imagelist.concat(que2_imagelist);	
		}	
  		StartPlayer(new_playlist, new_imglist, "false"); 
	}
	
	function onWrongClick() {
		<?php $tp_number--; ?>
		changeMap('#Map2');		
		loadWrongMessage();					
		loadTeachingPoints(); 			
		loadQuestions();
		var new_playlist = wr_playlist.concat(tp_playlist, que_playlist );
		var new_imglist = wr_imagelist.concat(tp_imagelist, que_imagelist);
  		StartPlayer(new_playlist, new_imglist, "false"); 
	}
	
	/*
	 * This is the starting point of the script. It starts with execution of the intro content.
	 */
	function PlayIntro() {
	 	
	 	$('#play').hide();
	 	
	 	var playlist= [];
		var imagelist= []; 
		
		playlist[0] = '<?php echo getAudioLink($Intro_Audio_ID); ?>';
		imagelist[0] = '<?php echo getImageLink($Intro_Image_ID, $Lang_ID); ?>';
		
		$("#down").click(function() {
			alert("Hello");
		});
		
		$("#right").click(function() {
			changeMap('#Map2');							
			loadTeachingPoints(); 			
			loadQuestions();
			var new_playlist = tp_playlist.concat(que_playlist);
			var new_imglist = tp_imagelist.concat(que_imagelist);
  			StartPlayer(new_playlist, new_imglist, "false");  					  			
		});		
		
		$("#up_question").click(function() {
			var right_answer = <?php echo checkAnswer(); ?>;
			if(right_answer == 1) {				
				onCorrectClick();
			} else {
				onWrongClick();
			}
		});
		
		
		$("#down_question").click(function() {
			var right_answer = <?php echo checkAnswer(); ?>;
			if(right_answer == 2) {
				onCorrectClick();
			} else {
				onWrongClick();
			}
		});	
		
		StartPlayer(playlist, imagelist, "true");
		
	 }
	 
	 /*
	  * This is a generic function which starts the player. This takes in the argument of Playlist and ImageList.
	  */
	 function StartPlayer(playlist, imagelist, pauseVariable) {	 	
	 	
	 	var i=0;
	 		 		 	
	 	myAudio = new Audio();
        document.getElementById("myaudio").appendChild(myAudio);
        myAudio.preload = true;
        myAudio.controls = true;
        document.getElementById("image").src=imagelist[0];
        myAudio.src = playlist[0];
        myAudio.addEventListener('ended', playEndedHandler, false);        
        myAudio.play();
        
	 	function playEndedHandler(e){	
			if(i < playlist.length)
			{
				if(pauseVariable=="true") {
					myAudio.pause();
				}
				else {					
			 		i++; 
			 		myAudio.src = playlist[i];
			 		myAudio.play();
			 		//change image
			 		if(i < playlist.length) {
					 	document.getElementById("image").src=imagelist[i];
					 }
				}    
			 }
		}	 	
	 }	
	</script>
	
	</center>	
	<?php include 'common_files/top_ribbon.php'; ?>
	<html><head>
	<style type="text/css">
	.under
	{
	position:center;

	z-index:-1;
	}

	.over
	{
	position:center;

	z-index:-1;
	}
	</style> </head><body>
	<center>  		
  	
	        	
    	<div class="img_slide_lesson">
			<img src = '/images/TV_FRAME.png' class="under">
	   		<img src='<?php echo getImageLink($Intro_Image_ID, $Lang_ID); ?>' width="600" height="450" id="image" usemap="#Map" class="over">
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
    		<button id="play" onclick="PlayIntro();"> <img src="images/play_icon.png" width="128" height="128" alt="" id=""/> </button>
    		
    	</div> 
    <br/>	
    
   </div>    
   <div id="common_div" style="width:1px; height:1px; overflow:hidden;"></div>
   </body></html>
    <!-- I have added these div for testing. These links have to be replaced with the actual image.-->	
    	
    
    	
