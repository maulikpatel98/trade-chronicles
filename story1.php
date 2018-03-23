
<?php
$qry="SELECT * FROM storycontent";
$conn=mysqli_connect("localhost","root","","trade");
$result=$conn->query($qry);

while($row=$result->fetch_assoc())
{
	echo "<a href='storycontent.php?story_id=" . $row['story_id'] . "'" . "><img src='" . $row['story_img'] ."'></a>";
	
}
	?>