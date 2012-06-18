
<?php 
echo "This is a ttesst pages.";
?>

<?php include 'common_files/db_connect.php'; ?>
<?php

$currentNumber = 2;
$currentType = 'T';

$myQuery = "";

	
	$myQuery = "SELECT * FROM tme_teaching_point ";
	//$myQuery += $currentNumber;

	$result = mysql_query($myQuery);
	

	while($row = mysql_fetch_array($result))
  	{
  			
  	a:	$AudioID = $row['AudioID'];
		
  		$ImageID = $row['ImageID'];
		$ImageOrder =  $row['order']; 
		
  		$myQuery2 = "SELECT * FROM  tme_audio_table WHERE  AudioID = '$AudioID' ";
		$result2 = mysql_query($myQuery2);//  or die($myQuery2."<br/><br/>".mysql_error());
		
		$row2 = mysql_fetch_array($result2);
		
		$AudioName = $row2['Name'];
		
		$myQuery4 = "SELECT * FROM  tme_image_table WHERE  ImageID = '$ImageID' ";
		$result4 = mysql_query($myQuery4);
		$row4 = mysql_fetch_array($result4);
		
		
		
		$images[1] =  $row4['Name'];
		$imagesStart[1] = 0;
		$i=2;
		
		$row = mysql_fetch_array($result);
			
		While ($row['order'] > $ImageOrder )
		{
		
		//	$row = mysql_fetch_array($result);
		/*	if( $row['order'] < $ImageOrder)
			{
				
				echo $AudioName;
				for($j=1; $j<$i; ++$j)
				{
					echo "<br />";
					echo $images[$j];
				 	echo "<br />";
					echo $imagesStart[$j];
					$j++;
				}
				echo "<br />";
				echo "****";
				goto a;
			}
			*/	
			$ImageID = $row['ImageID'];
		
			$myQuery3 = "SELECT * FROM  tme_image_table WHERE  ImageID ='$ImageID'  ";
			$result3 = mysql_query($myQuery3);
			$row3 = mysql_fetch_array($result3);
			
	
			$images[$i] =  $row3['Name'];
			$imagesStart[$i] = $row3['start'];
		
			$i++;
			$ImageOrder =  $row['order']; 
		
			$row = mysql_fetch_array($result);
			if ($row['order'] < $ImageOrder)
			$myBool = True;
		
		}
		//Play(AudioName, images, imagesStart)
		
		for($j=1; $j<$i; ++$j)
		{
			echo "<br />";
			echo $images[$j];
		 	echo "<br />";
			echo $imagesStart[$j];
			$j++;
		}
		echo "<br />";
		echo "****";
		$i++;
		if($myBool == True )
			goto a;
 	 }

mysql_close($dbcon);
?> 
