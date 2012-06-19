
<?php 
echo "This is a ttesst pages.";
?>

<?php include 'common_files/db_connect.php'; ?>
<?php

$currentNumber = 1;
$currentType = 'tme_teaching_point';
//tme_question
while($currentNumber < 10)
{
	
	$myQuery = "SELECT * FROM '$currentType' WHERE tpname = '$currentNumber'";
	$result = mysql_query($myQuery);
	$i = 1;
	
	while($row = mysql_fetch_array($result))
	{
	
		$AudioID = $row['AudioID'];
	
		$myQuery2 = "SELECT * FROM  '$currentType' WHERE  AudioID = '$AudioID' ";
		$result2 = mysql_query($myQuery2);//  or die($myQuery2."<br/><br/>".mysql_error());
		$row2 = mysql_fetch_array($result2);
		$AudioName = $row2['Name'];
	
		echo $AudioName;

				
  		$ImageID = $row2['ImageID'];
		
		$myQuery4 = "SELECT * FROM  tme_image_table WHERE  ImageID = '$ImageID' ";
		$result4 = mysql_query($myQuery4);
		$row4 = mysql_fetch_array($result4);
		
		$images[$i] =  $row4['Name'];
		$audios[$i] = $AudioName;
		$i++;
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
		 
		$currentNumber++;
	}
}


mysql_close($dbcon);
?> 
