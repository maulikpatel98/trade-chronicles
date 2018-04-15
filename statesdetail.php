<?php
$page="state";
session_start();
$id=$_GET["st_id"];

$qry="SELECT * FROM state WHERE st_id=$id";
$conn=mysqli_connect("localhost","root","","trade");
$result=$conn->query($qry);

$row=$result->fetch_assoc();

$my_file = $row['st_file'];
$handle = fopen($my_file, 'r') or die('Cannot open file:  '.$my_file);
$data = fread($handle,filesize($my_file));

$my_file = $row['st_contact'];
$handle1 = fopen($my_file, 'r') or die('Cannot open file:  '.$my_file);
$data1 = fread($handle1,filesize($my_file));

?>

<!DOCTYPE html>
<html>
<head>
	<title> state details</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<!--header -->

<?php include_once("header.php") ?>

<!--header completed-->

<div class="storycontainer">
	
	<div class="storytitle"><b><?php echo $row['st_name'];?></b></div>
	<div class="storycontent">
		<div class="storyimg"><img src=<?php echo $row['st_img'];?>></div>
		<div class="storydata"><?php  $dataarr = explode('#', $data);
      for($i=0;$i<count($dataarr);$i++) 
      {
      ?> 
        <p><?php echo $dataarr[$i]; ?></p> 
      <?php 
      }
     ?></div>
     <?php 
     	if(!isset($_SESSION['user']))
     	{
		echo "<p> Please Subscribe <p>"."<a href='login.php'>Please Login</a>";
    	}
    	else {
     ?>
     <div class="storydata" style="text-align:justify;">
     <hr>

     <?php  $dataarr = explode('#', $data1);
      for($i=0;$i<count($dataarr);$i++) 
      {
      ?> 
        <p><?php echo $dataarr[$i]; ?></p> 
      <?php 
      } ?>
      </div>
<?php  } ?>
	</div>

	

</div>
	
	<?php include_once('footer.php'); ?>
	
</body>
</html>