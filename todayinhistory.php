<?php 
$page = "todayinhistory";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Today In History</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

<?php include_once('header.php');?>

<div class="description">
<div class="infotitle">
  <span style="color:maroon;"><?php echo date('d');?></span><sup style="color:maroon">th</sup>  <span style="font-family:Times new roman;">March Today In <span style="color:maroon">History</span></span>
  <hr style="color:maroon">
</div>
<div class="infocontent">
</div>
</div>

<?php

$date=date('d');
$month=date('m');
$qry="select * from today_in_history where tih_date='$date' and tih_month='$month'";
$conn=mysqli_connect("localhost","root","","trade");
$result=$conn->query($qry);
$row=$result->fetch_assoc();

//echo $id;

if(isset($_GET["tih_id"]))
{
	
$id =$_GET["tih_id"];
$qry1="select * from today_in_history where tih_id=$id";

$conn1=mysqli_connect("localhost","root","","trade");
$result1=$conn1->query($qry1);
$row1=$result1->fetch_assoc();

$my_file = 'tih_files/'.$row1["tih_file"];
$title = $row1["tih_name"];
$handle = fopen($my_file, 'r') or die('Cannot open file:'.$my_file);
$data = fread($handle,filesize($my_file));
} else{
      $init_file = 'tih_files/'.$row['tih_file'];
      $title = $row['tih_name'];
			$handle = fopen($init_file, 'r') or die('Cannot open file:'.$init_file);
			$data = fread($handle,filesize($init_file));
		}?>

<div class="tih_container">	

<div class="tih_content">

<!--code for video only when page initialized-->
<!-- ?php if (isset($init_file)) {
  echo '<div class="tih_video" style="text-align:center; padding:0px 15px;">
  <video style="width:100%;" src="tih_video.mp4" controls></video>
</div>';

}? -->

<div class="tih_data" style="padding:50px; font-size:20px;text-align:justify; color:#333;font-family:times new roman;">
	<h1 style="text-align:center;"><?php echo $title ?></h1>
	<?php echo "$data";?>
</div>	
</div>

<div class="tih_link">
<h1 style="font-family:times new roman">Also In This Day</h1>
<hr>
<?php
	$result2=$conn->query($qry);
	while($row2=$result2->fetch_assoc())
{	echo "<h4>".$row2["tih_name"]."</h4>";
	echo  "<a href='todayinhistory.php?tih_id=" .$row2['tih_id']. "'>" . $row2["tih_name"] . "</a><br></li>";
}
?>
</div>
</div>

<?php include_once('footer.php');?>

</body>
</html>