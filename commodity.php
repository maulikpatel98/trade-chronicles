<?php
$page="story";
session_start();
if(isset($_GET['st']))
$id=$_GET["st"];
if(isset($_GET['cn']))
$id=$_GET["cn"];

$qry="SELECT * FROM commodities WHERE cm_id=$id";
$conn=mysqli_connect("localhost","root","","trade");
$result=$conn->query($qry);

$row=$result->fetch_assoc();

$my_file = $row['cm_file'];
$handle = fopen($my_file, 'r') or die('Cannot open file:  '.$my_file);
$data = fread($handle,filesize($my_file));

?>

<!DOCTYPE html>
<html>
<head>
	<title>commodities</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<!--header -->

<?php include_once("header.php") ?>

<!--header completed-->


	<div class="storytitle"><b><?php echo $row['cm_name'];?></b></div>
	<div class="storycontent">
		<div class="storyimg"><img src=<?php echo $row['cm_img'];?>></div>
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

	
	
	
	<?php include_once('footer.php'); ?>
	
</body>
</html>