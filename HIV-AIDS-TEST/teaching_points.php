	/*
	 * This function is used to load the teaching points from the database and create a playlist for the player.
	 */
	
	function loadTeachingPoints(){
		var index = 0;			
		<?php 
				$tp_rows = getResourceIDs($tp_number);				
				while ($row = mysql_fetch_array($tp_rows)) { 
					$tp_AudioID = $row['AudioID'];
					$tp_ImageID = $row['ImageID'];	
		?>												
					tp_playlist[index] = '<?php echo getAudioLink($tp_AudioID); ?>';
					tp_imagelist[index++] = '<?php echo getImageLink($tp_ImageID, $Lang_ID); ?>';					
					
		<?php		
				}
				//This is the END of One Teaching Point.
				
				$tp_ID = $tp_number;  		// We require Lesson ID for fetching the Quiz resources the present Teaching Point.
				$tp_number++;					// Increment the Teaching Point to fetch the next set of Teaching Point Resources.	
		?>
					/*
					 * The following lines include the Whoosh transition sound after the Teaching Point.
					 */
					tp_playlist[index] = '<?php echo getAudioLink($Ques_whoosh_aud_id); ?>';
					tp_imagelist[index++] = '<?php echo getImageLink($Ques_img_ID, $Lang_ID); ?>';	
		
	}
	
	function loadTeachingPoint2() {
		
		var index = 0;			
		<?php 
				$tp_rows = getResourceIDs(2);				
				while ($row = mysql_fetch_array($tp_rows)) { 
					$tp_AudioID = $row['AudioID'];
					$tp_ImageID = $row['ImageID'];	
		?>												
					tp2_playlist[index] = '<?php echo getAudioLink($tp_AudioID); ?>';
					tp2_imagelist[index++] = '<?php echo getImageLink($tp_ImageID, $Lang_ID); ?>';					
					
		<?php		
				}
				//This is the END of One Teaching Point.
				
				$tp_ID = $tp_number;  		// We require Lesson ID for fetching the Quiz resources the present Teaching Point.
				$tp_number++;					// Increment the Teaching Point to fetch the next set of Teaching Point Resources.	
		?>
					/*
					 * The following lines include the Whoosh transition sound after the Teaching Point.
					 */
					tp2_playlist[index] = '<?php echo getAudioLink($Ques_whoosh_aud_id); ?>';
					tp2_imagelist[index++] = '<?php echo getImageLink($Ques_img_ID, $Lang_ID); ?>';		
		}
		
		function loadTeachingPoint3() {
		
		var index = 0;			
		<?php 
				$tp_rows = getResourceIDs(3);				
				while ($row = mysql_fetch_array($tp_rows)) { 
					$tp_AudioID = $row['AudioID'];
					$tp_ImageID = $row['ImageID'];	
		?>												
					tp3_playlist[index] = '<?php echo getAudioLink($tp_AudioID); ?>';
					tp3_imagelist[index++] = '<?php echo getImageLink($tp_ImageID, $Lang_ID); ?>';					
					
		<?php		
				}
				//This is the END of One Teaching Point.
				
				$tp_ID = $tp_number;  		// We require Lesson ID for fetching the Quiz resources the present Teaching Point.
				$tp_number++;					// Increment the Teaching Point to fetch the next set of Teaching Point Resources.	
		?>
					/*
					 * The following lines include the Whoosh transition sound after the Teaching Point.
					 */
					tp3_playlist[index] = '<?php echo getAudioLink($Ques_whoosh_aud_id); ?>';
					tp3_imagelist[index++] = '<?php echo getImageLink($Ques_img_ID, $Lang_ID); ?>';		
		}
		
		function loadTeachingPoint4() {
		
		var index = 0;			
		<?php 
				$tp_rows = getResourceIDs(4);				
				while ($row = mysql_fetch_array($tp_rows)) { 
					$tp_AudioID = $row['AudioID'];
					$tp_ImageID = $row['ImageID'];	
		?>												
					tp4_playlist[index] = '<?php echo getAudioLink($tp_AudioID); ?>';
					tp4_imagelist[index++] = '<?php echo getImageLink($tp_ImageID, $Lang_ID); ?>';					
					
		<?php		
				}
				//This is the END of One Teaching Point.
				
				$tp_ID = $tp_number;  		// We require Lesson ID for fetching the Quiz resources the present Teaching Point.
				$tp_number++;					// Increment the Teaching Point to fetch the next set of Teaching Point Resources.	
		?>
					/*
					 * The following lines include the Whoosh transition sound after the Teaching Point.
					 */
					tp4_playlist[index] = '<?php echo getAudioLink($Ques_whoosh_aud_id); ?>';
					tp4_imagelist[index++] = '<?php echo getImageLink($Ques_img_ID, $Lang_ID); ?>';		
		}
		
		function loadTeachingPoint5() {
		
		var index = 0;			
		<?php 
				$tp_rows = getResourceIDs(5);				
				while ($row = mysql_fetch_array($tp_rows)) { 
					$tp_AudioID = $row['AudioID'];
					$tp_ImageID = $row['ImageID'];	
		?>												
					tp5_playlist[index] = '<?php echo getAudioLink($tp_AudioID); ?>';
					tp5_imagelist[index++] = '<?php echo getImageLink($tp_ImageID, $Lang_ID); ?>';					
					
		<?php		
				}
				//This is the END of One Teaching Point.
				
				$tp_ID = $tp_number;  		// We require Lesson ID for fetching the Quiz resources the present Teaching Point.
				$tp_number++;					// Increment the Teaching Point to fetch the next set of Teaching Point Resources.	
		?>
					/*
					 * The following lines include the Whoosh transition sound after the Teaching Point.
					 */
					tp5_playlist[index] = '<?php echo getAudioLink($Ques_whoosh_aud_id); ?>';
					tp5_imagelist[index++] = '<?php echo getImageLink($Ques_img_ID, $Lang_ID); ?>';		
		}
		
		function loadTeachingPoint6() {
		
		var index = 0;			
		<?php 
				$tp_rows = getResourceIDs(6);				
				while ($row = mysql_fetch_array($tp_rows)) { 
					$tp_AudioID = $row['AudioID'];
					$tp_ImageID = $row['ImageID'];	
		?>												
					tp6_playlist[index] = '<?php echo getAudioLink($tp_AudioID); ?>';
					tp6_imagelist[index++] = '<?php echo getImageLink($tp_ImageID, $Lang_ID); ?>';					
					
		<?php		
				}
				//This is the END of One Teaching Point.
				
				$tp_ID = $tp_number;  		// We require Lesson ID for fetching the Quiz resources the present Teaching Point.
				$tp_number++;					// Increment the Teaching Point to fetch the next set of Teaching Point Resources.	
		?>
					/*
					 * The following lines include the Whoosh transition sound after the Teaching Point.
					 */
					tp6_playlist[index] = '<?php echo getAudioLink($Ques_whoosh_aud_id); ?>';
					tp6_imagelist[index++] = '<?php echo getImageLink($Ques_img_ID, $Lang_ID); ?>';		
		}
		
		function loadTeachingPoint7() {
		
		var index = 0;			
		<?php 
				$tp_rows = getResourceIDs(7);				
				while ($row = mysql_fetch_array($tp_rows)) { 
					$tp_AudioID = $row['AudioID'];
					$tp_ImageID = $row['ImageID'];	
		?>												
					tp7_playlist[index] = '<?php echo getAudioLink($tp_AudioID); ?>';
					tp7_imagelist[index++] = '<?php echo getImageLink($tp_ImageID, $Lang_ID); ?>';					
					
		<?php		
				}
				//This is the END of One Teaching Point.
				
				$tp_ID = $tp_number;  		// We require Lesson ID for fetching the Quiz resources the present Teaching Point.
				$tp_number++;					// Increment the Teaching Point to fetch the next set of Teaching Point Resources.	
		?>
					/*
					 * The following lines include the Whoosh transition sound after the Teaching Point.
					 */
					tp7_playlist[index] = '<?php echo getAudioLink($Ques_whoosh_aud_id); ?>';
					tp7_imagelist[index++] = '<?php echo getImageLink($Ques_img_ID, $Lang_ID); ?>';		
		}
		
		function loadTeachingPoint8() {
		
		var index = 0;			
		<?php 
				$tp_rows = getResourceIDs(8);				
				while ($row = mysql_fetch_array($tp_rows)) { 
					$tp_AudioID = $row['AudioID'];
					$tp_ImageID = $row['ImageID'];	
		?>												
					tp8_playlist[index] = '<?php echo getAudioLink($tp_AudioID); ?>';
					tp8_imagelist[index++] = '<?php echo getImageLink($tp_ImageID, $Lang_ID); ?>';					
					
		<?php		
				}
				//This is the END of One Teaching Point.
				
				$tp_ID = $tp_number;  		// We require Lesson ID for fetching the Quiz resources the present Teaching Point.
				$tp_number++;					// Increment the Teaching Point to fetch the next set of Teaching Point Resources.	
		?>
					/*
					 * The following lines include the Whoosh transition sound after the Teaching Point.
					 */
					tp8_playlist[index] = '<?php echo getAudioLink($Ques_whoosh_aud_id); ?>';
					tp8_imagelist[index++] = '<?php echo getImageLink($Ques_img_ID, $Lang_ID); ?>';		
		}
		
		function loadTeachingPoint9() {
		
		var index = 0;			
		<?php 
				$tp_rows = getResourceIDs(9);				
				while ($row = mysql_fetch_array($tp_rows)) { 
					$tp_AudioID = $row['AudioID'];
					$tp_ImageID = $row['ImageID'];	
		?>												
					tp9_playlist[index] = '<?php echo getAudioLink($tp_AudioID); ?>';
					tp9_imagelist[index++] = '<?php echo getImageLink($tp_ImageID, $Lang_ID); ?>';					
					
		<?php		
				}
				//This is the END of One Teaching Point.
				
				$tp_ID = $tp_number;  		// We require Lesson ID for fetching the Quiz resources the present Teaching Point.
				$tp_number++;					// Increment the Teaching Point to fetch the next set of Teaching Point Resources.	
		?>
					/*
					 * The following lines include the Whoosh transition sound after the Teaching Point.
					 */
					tp9_playlist[index] = '<?php echo getAudioLink($Ques_whoosh_aud_id); ?>';
					tp9_imagelist[index++] = '<?php echo getImageLink($Ques_img_ID, $Lang_ID); ?>';		
		}
		
		function loadTeachingPoint10() {
		
		var index = 0;			
		<?php 
				$tp_rows = getResourceIDs(10);				
				while ($row = mysql_fetch_array($tp_rows)) { 
					$tp_AudioID = $row['AudioID'];
					$tp_ImageID = $row['ImageID'];	
		?>												
					tp10_playlist[index] = '<?php echo getAudioLink($tp_AudioID); ?>';
					tp10_imagelist[index++] = '<?php echo getImageLink($tp_ImageID, $Lang_ID); ?>';					
					
		<?php		
				}
				//This is the END of One Teaching Point.
				
				$tp_ID = $tp_number;  		// We require Lesson ID for fetching the Quiz resources the present Teaching Point.
				$tp_number++;					// Increment the Teaching Point to fetch the next set of Teaching Point Resources.	
		?>
					/*
					 * The following lines include the Whoosh transition sound after the Teaching Point.
					 */
					tp10_playlist[index] = '<?php echo getAudioLink($Ques_whoosh_aud_id); ?>';
					tp10_imagelist[index++] = '<?php echo getImageLink($Ques_img_ID, $Lang_ID); ?>';		
		}
	
		function loadTeachingPoint11() {
		
		var index = 0;			
		<?php 
				$tp_rows = getResourceIDs(11);				
				while ($row = mysql_fetch_array($tp_rows)) { 
					$tp_AudioID = $row['AudioID'];
					$tp_ImageID = $row['ImageID'];	
		?>												
					tp11_playlist[index] = '<?php echo getAudioLink($tp_AudioID); ?>';
					tp11_imagelist[index++] = '<?php echo getImageLink($tp_ImageID, $Lang_ID); ?>';					
					
		<?php		
				}
				//This is the END of One Teaching Point.
				
				$tp_ID = $tp_number;  		// We require Lesson ID for fetching the Quiz resources the present Teaching Point.
				$tp_number++;					// Increment the Teaching Point to fetch the next set of Teaching Point Resources.	
		?>
					/*
					 * The following lines include the Whoosh transition sound after the Teaching Point.
					 */
					tp11_playlist[index] = '<?php echo getAudioLink($Ques_whoosh_aud_id); ?>';
					tp11_imagelist[index++] = '<?php echo getImageLink($Ques_img_ID, $Lang_ID); ?>';		
		}
		
		
		function loadTeachingPoint12() {
		
		var index = 0;			
		<?php 
				$tp_rows = getResourceIDs(3);				
				while ($row = mysql_fetch_array($tp_rows)) { 
					$tp_AudioID = $row['AudioID'];
					$tp_ImageID = $row['ImageID'];	
		?>												
					tp12_playlist[index] = '<?php echo getAudioLink($tp_AudioID); ?>';
					tp12_imagelist[index++] = '<?php echo getImageLink($tp_ImageID, $Lang_ID); ?>';					
					
		<?php		
				}
				//This is the END of One Teaching Point.
				
				$tp_ID = $tp_number;  		// We require Lesson ID for fetching the Quiz resources the present Teaching Point.
				$tp_number++;					// Increment the Teaching Point to fetch the next set of Teaching Point Resources.	
		?>
					/*
					 * The following lines include the Whoosh transition sound after the Teaching Point.
					 */
					tp12_playlist[index] = '<?php echo getAudioLink($Ques_whoosh_aud_id); ?>';
					tp12_imagelist[index++] = '<?php echo getImageLink($Ques_img_ID, $Lang_ID); ?>';		
		}

