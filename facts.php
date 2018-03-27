<?php 
$page = "fact";
session_start();
?>
<?php
$qry="SELECT * FROM fact";
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
	<title>Top Facts</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php include_once('header.php'); ?>

<!--description-->
<div class="description">
  
<div class="infotitle">
  Top Facts
</div>
<div class="infocontent">
  !!..Welcome to the Top facts..!!<br>
here you can get various facts about trades, to know more you can just click the image.! 
</div>

</div>



<div style="margin-top:40px;">
<?php
while($row=$result->fetch_assoc())
{
	?>
	
<div class="card space">
  <a class="cardlink" href="factcontent.php?fact_id=<?php echo $row['fact_id']; ?>">
  <img src=<?php echo $row['fact_img'];?> alt="Avatar" style="width:100%;height:200px">
  <div class="container">
    <h4><b><?php echo $row['fact_name'];?></b></h4> 
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