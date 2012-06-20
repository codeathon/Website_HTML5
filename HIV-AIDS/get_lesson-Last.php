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
		$tp_sql = "SELECT * FROM tme_teaching_point WHERE  tpname = '$tp_number'";
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
	
	$current = 1;
	
	$question_number = 1;    //This is used for retrieveing the solution for the questions asked.
	
?>

	<script type='text/javascript'>
	
		var total_tp = 12;
		var total_qu = 20;	
	/*
	 * Array Location for Teaching Point
	 */
		tp_01_pl = [];	tp_01_il = [];
		tp_02_pl = [];	tp_02_il = [];
		tp_03_pl = [];	tp_03_il = [];
		tp_04_pl = [];	tp_04_il = [];
		tp_05_pl = [];	tp_05_il = [];
		tp_06_pl = [];	tp_06_il = [];
		tp_07_pl = [];	tp_07_il = [];
		tp_08_pl = [];	tp_08_il = [];
		tp_09_pl = [];	tp_09_il = [];
		tp_10_pl = [];	tp_10_il = [];
		tp_11_pl = [];	tp_11_il = [];
		tp_12_pl = [];	tp_12_il = [];
	
	/*
	 * Array Location for Questions.
	 */
		Qu_01_pl = [];	Qu_01_il = [];
		Qu_02_pl = [];	Qu_02_il = [];
		Qu_03_pl = [];	Qu_03_il = [];
		Qu_04_pl = [];	Qu_04_il = [];
		Qu_05_pl = [];	Qu_05_il = [];
		Qu_06_pl = [];	Qu_06_il = [];
		Qu_07_pl = [];	Qu_07_il = [];
		Qu_08_pl = [];	Qu_08_il = [];
		Qu_09_pl = [];	Qu_09_il = [];
		Qu_10_pl = [];	Qu_10_il = [];
		Qu_11_pl = [];	Qu_11_il = [];
		Qu_12_pl = [];	Qu_12_il = [];
		Qu_13_pl = [];	Qu_13_il = [];
		Qu_14_pl = [];	Qu_14_il = [];
		Qu_15_pl = [];	Qu_15_il = [];
		Qu_16_pl = [];	Qu_16_il = [];
		Qu_17_pl = [];	Qu_17_il = [];
		Qu_18_pl = [];	Qu_18_il = [];
		Qu_19_pl = [];	Qu_19_il = [];
		Qu_20_pl = [];	Qu_20_il = [];
	
		
		function loadQuestions(questionID) {
			   var index = 0;			
			<?php			
				
				$quiz_rows = getQuizResourceIDs($Questions_for_TP, $tp_ID);	
				
							
				while ($q_row = mysql_fetch_array($quiz_rows)) { 
					$q_AudioID = $q_row['AudioID'];
					$q_ImageID = $q_row['ImageID'];												
			?>
					que_playlist[index] = '<?php echo getAudioLink($q_AudioID); ?>';
					que_imagelist[index++] = '<?php echo getImageLink($q_ImageID, $Lang_ID); ?>';					
					
			<?php	} // END of Quiz Portion - While Loop. ?>
		
		}
	
		
		function getLocation() {
			var i=0;
			for(i=1;i<=total_tp;i++) {
				<?php 
					$tp_number = 1;
					$tp_rows = getResourceIDs($tp_number);				
					while ($row = mysql_fetch_array($tp_rows)) { 
						$tp_AudioID = $row['AudioID'];
						$tp_ImageID = $row['ImageID'];	
				?>												
					eval("tp_"+i+"_pl" = '<?php echo getAudioLink($tp_AudioID); ?>');
					eval("tp_"+i+"_il" = '<?php echo getImageLink($tp_ImageID, $Lang_ID); ?>');	 
				<?php
					}
				?>	
			}
		} 
	 
	 /*
	 * This is the starting point of the script. It starts with execution of the intro content.
	 */
	function PlayIntro() {
	 	
	 	$('#play').hide();
	 	
	 	getLocation();
	 	alert(tp_12_pl);
	 	var playlist= [];
		var imagelist= []; 
		
		playlist[0] = '<?php echo getAudioLink($Intro_Audio_ID); ?>';
		imagelist[0] = '<?php echo getImageLink($Intro_Image_ID, $Lang_ID); ?>';
		
		$("#down").click(function() {
			alert("Hello");
		});
		
		$("#right").click(function() {					  			
		});		
		
		$("#up_question").click(function() {
			
		});
		
		
		$("#down_question").click(function() {
			
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
	<center>  		
  		 
	        	
    	<div class="img_slide_lesson">
	   		<img src='<?php echo getImageLink($Intro_Image_ID, $Lang_ID); ?>' width="600" height="450" id="image" usemap="#Map">
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
    <!-- I have added these div for testing. These links have to be replaced with the actual image.-->	
    	
    
    	


