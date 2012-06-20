<?php
	
	//This page has the code for the HIV-AIDS lesson. It takes the header from header_common.
	//The database connections are also taken from common files folder.
	//Authors - FlipTeam@framehawk.com
	//Used in TME Project
		
    include 'common_files/db_connect.php';
	
?>
    <table width="100" border="0">
    <tr>
      	<td>
		   <audio id="myaudio">
      			HTML5 audio not supported
		   </audio>
    	   <button id="play" onclick="play();">
      			Play
    	   </button>
	  	</td>
    </tr>
	<tr>
    	<td>
    		<img src="http://d16nhnwd4p7mtz.cloudfront.net/files/Question 6/34. HIV_/AIDS.jpg" width="600" height="400" id="image"/>
    	</td>
    </tr>
  </table>
  </body>
</html>
    
<?php
    //Close the database
  	include 'common_files/db_close.php';
?>
    


