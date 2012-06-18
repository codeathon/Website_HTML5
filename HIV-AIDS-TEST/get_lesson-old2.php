<?php
include 'common_files/header.php';
$dbhost = getenv('MYSQL_DB_HOST');
$dbuser = getenv('MYSQL_USERNAME');
$dbpass = getenv('MYSQL_PASSWORD');
$dbname = getenv('MYSQL_DB_NAME');

$dbcon = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql database.');
mysql_select_db($dbname); ?>

<!-- 	$intro_sql = "SELECT * FROM  tme_audio_table WHERE  AudioID =79";
	$intro_result_aud = mysql_query($intro_sql);
	$row_aud = 	mysql_fetch_array($intro_result_aud);
	$audio_name = $row_aud['Name'];
	
	$intro_sql_img = "SELECT * FROM tme_image_table WHERE ImageID =26 AND LanguageID = 1";
	$intro_result_img = mysql_query($intro_sql_img);
	$row_img = mysql_fetch_array($intro_result_img);
	$image_name = $row_img['Name'];

	$tp_sql = "SELECT * FROM tme_teaching_point WHERE  tpname = 1";
	$tp_rows = mysql_query($tp_sql);
	$tp_audio = mysql_fetch_array($tp_rows);
	$num_rows = mysql_num_rows($tp_rows);

	-->
	
	<script src="/var/fog/apps/app45917/tmeappste.phpfogapp.com/js/audio.min.js"></script>
    <link rel="stylesheet" href="./css/index2.css" media="screen">
	<script type="text/javascript">
	
	//var currentFile = "<?php echo $audio_name; ?>";
		
 	<!--	var playlist=new Array(<?php echo $num_rows; ?>);
	//	for(var i=1;i<= <?php echo $num_rows; ?>; i++) {
		//	playlist[i]="<?php echo $tp_audio['Name']; ?>";
		//}-->
	//	audiojs.events.ready(function() {
	//		var as = audiojs.createAll();
	//	});
	
	 /* <!--window.onload = function(){
        var i=0;
        myAudio = new Audio();
        document.getElementById("myaudio").appendChild(myAudio);
        myAudio.preload = true;
        myAudio.controls = true;
        myAudio.src = playlist[1];
       myAudio.addEventListener('ended', playEndedHandler, false);
        myAudio.play(); */
        /* function playEndedHandler(e){	
			if(i< <?php echo $num_rows; ?> ) {
				 i++;
				 myAudio.src = playlist[i];
				 myAudio.play();
			 }
		} */
	//}
	-->
	</script>
	<audio id="myaudio" preload="auto" type="audio/mpeg">
		<embed height="50px" width="100px" />
	</audio>
	<img src="<?php echo $row_img['Name']; ?>" title="1" id="image" alt="1blog" width="600" height="350"/>


		
