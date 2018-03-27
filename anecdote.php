<?php 
$page = "anecdote";
session_start();
?>
<?php
$qry="SELECT * FROM anecdote";
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
	<title>Anecdote</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php include_once('header.php'); ?>

<!--description-->
<div class="description">
  
<div class="infotitle">
  Anecdotes
</div>
<div class="infocontent">
  !!..Welcome to the Anacdotes..!!<br>
here you can get various short stories and incidents about trades, to know more you can just click the image.! 
</div>

</div>



<div style="margin-top:40px;">
<?php
while($row=$result->fetch_assoc())
{
	?>
	
<div class="card space">
  <a class="cardlink" href="anecdotecontent.php?an_id=<?php echo $row['an_id']; ?>">
  <img src=<?php echo $row['an_img'];?> alt="Avatar" style="width:100%;height:200px">
  <div class="container">
    <h4><b><?php echo $row['an_name'];?></b></h4> 
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