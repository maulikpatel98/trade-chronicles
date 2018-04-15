<?php
$page="story";
session_start();
$id=$_GET["story_id"];

$qry="SELECT * FROM storycontent WHERE story_id=$id";
$conn=mysqli_connect("localhost","root","","trade");
$result=$conn->query($qry);

$row=$result->fetch_assoc();

$my_file = $row['story_file'];
$handle = fopen($my_file, 'r') or die('Cannot open file:  '.$my_file);
$data = fread($handle,filesize($my_file));

?>

<!DOCTYPE html>
<html>
<head>
	<title>Article</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<!--header -->

<?php include_once("header.php") ?>

<!--header completed-->

<div class="storycontainer">
	
	<div class="storytitle"><b><?php echo $row['story_name'];?></b></div>
	<div class="storycontent">
		<div class="storyimg"><img src=<?php echo $row['story_img'];?>></div>
		<div class="storydata">
		<?php  
		$dataarr = explode('#', $data);
      for($i=0;$i<count($dataarr);$i++) 
      {
      ?> 
        <p><?php echo $dataarr[$i]; ?></p> 
      <?php 
      }
     ?>
     </div>
	</div>

	<div class="prev_next">

	<?php
	if((--$id)>0)
	{?>
	
	<a style="color:maroon; text-decoration:none; float:left;" href="storycontent.php?story_id=<?php echo $id;?>">&lt;&lt;Prev</a>
	<?php
	}
	$qry1="SELECT * FROM storycontent";
	$result1=$conn->query($qry1);
	$num_rows = mysqli_num_rows($result1);
	if( (++$id) < $num_rows )
	{ ?>

		<a style="color:maroon; text-decoration:none; float:right;" href="storycontent.php?story_id=<?php echo ++$id;?>">Next&gt;&gt;</a>
	<?php } ?>
	</div>
	<div class="likes" style="text-align:center;margin-top:20px;">
		<a href="like.php?story_id=<?php echo $_GET['story_id'];?>" style="text-align:center;text-decoration:none;color:maroon;" >like this</a>
	</div>
</div>
	
	<?php include_once('footer.php'); ?>
	
</body>
</html>