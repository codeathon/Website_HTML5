// This file is used in the AIDS Lesson. This file loads all the multimeida content from the server.
// This file is included in the file - hiv_aids_home.php in the root directory of the project.
// Authors - FLIPTEAM@FRAMEHAEK.COM



	audiojs.events.ready(function() {
    	var as = audiojs.createAll();
  	});
  	
  	function play()
	 {
	    var i=0;
		var count=3;
		var playlist=new Array(count);
		var imagelist=new Array(count);
		
        playlist[0]="http://d16nhnwd4p7mtz.cloudfront.net/files/Question 6/phrase034 HIV-ENG.mp3";
        playlist[1]="http://d16nhnwd4p7mtz.cloudfront.net/files/Question 6/phrase035 HIV-ENG (test).mp3";
        playlist[2]="http://d16nhnwd4p7mtz.cloudfront.net/files/Question 6/phrase036 HIV-ENG.mp3";
		
		imagelist[0]="http://d16nhnwd4p7mtz.cloudfront.net/files/Question 6/34. HIV_/AIDS.jpg";
        imagelist[1]="http://d16nhnwd4p7mtz.cloudfront.net/files/Question 2/10.HIV_/AIDS.jpg";
        imagelist[2]="http://d16nhnwd4p7mtz.cloudfront.net/files/Question 3_ Quiz 1/18. HIV_/AIDS.jpg";

        myAudio = new Audio();
        document.getElementById("myaudio").appendChild(myAudio);
        myAudio.preload = true;
        myAudio.controls = true;
        myAudio.src = playlist[0];
        myAudio.addEventListener('ended', playEndedHandler, false);
        myAudio.play();
        
        function playEndedHandler(e){	
			if(i<count)
			{
			 	i++;
			 	myAudio.src = playlist[i];
			 	myAudio.play();
			 	//change image
			 	document.getElementById("image").src=imagelist[i];    
			 }
		}
	 }
