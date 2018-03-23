<?php 
$page = "story";
?>
<?php
$qry="SELECT * FROM storycontent";
$conn=mysqli_connect("localhost","root","","trade");
$result=$conn->query($qry);

// while($row=$result->fetch_assoc())
// {
// 	echo "<a href='storycontent.php?story_id=" . $row['story_id'] . "'" . "><img src='" . $row['story_img'] ."'></a>";
	
// }
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Story</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php include_once('header.php');?>

<!--description-->
<div class="description">
  
<div class="infotitle">
  Trade Stories
</div>
<div class="infocontent">
  !!..Welcome to the trade stories..!!<br>
here you can get articles and blogs about different trade stories, to know more you can just click the image.! 
</div>

</div>



<div style="margin-top:40px;">
<?php
while($row=$result->fetch_assoc())
{
	?>
	
<div class="card space">
  <a class="cardlink" href="storycontent.php?story_id=<?php echo $row['story_id']; ?>">
  <img src=<?php echo $row['story_img'];?> alt="Avatar" style="width:100%;height:200px">
  <div class="container">
    <h4><b><?php echo $row['story_name'];?></b></h4> 
    <p>Architect & Engineer</p> 
  </div>
  </a>
</div>

<?php
}?>
</div>


<?php include_once('footer.php');?>


</body>
</html>