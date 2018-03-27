<?php
	 session_start();
     if(!isset($_SESSION['user'])) 
      	echo "<script>location.href='login.php?context=n'</script>";
?>
<?php 
$page="news";
?>

<?php
 $qry="select * from blog as b where (select count(*) from blog as x where x.blog_id > b.blog_id) < 3";

$conn=mysqli_connect("localhost","root","","trade");
$result=$conn->query($qry);

// while($row=$result->fetch_assoc())
// {
// 	//echo  "<h3>" . $row['username'] . "<h3>" . "" .  $row['blog_name'] . "<br>";
	
// 	$my_file = $row["blog_file"];
// 	$handle = fopen("blog_files/" . $my_file, 'r') or die('Cannot open file: '. "blog_files/" . $my_file);
// 	$data = fread($handle,filesize("blog_files/" .$my_file));
// 	//echo "<p style='text-size:10px;'>" . substr($data,0,200) . "..." . "</p>";
// 	//echo "<br><br>";
// }	

?>


<!DOCTYPE html>
<html>
<head>
	<title>News feeds</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body onload="scrollDiv_init();"> 

<?php 

include_once('header.php');

?>

<div class="description" style="margin-top:120px;"></div>
<div class="tih_container" style="margin-top:0px;">	

<div class="tih_content" style="margin-top:0px;">
<div class="tih_data" style="padding:50px; font-size:20px;text-align:justify; color:#333;font-family:times new roman;margin-top:0px;padding-top:0px;">
	<h3 style="">News Feeds</h3><hr>

		<?php 
		while($row=$result->fetch_assoc()) {
			$my_file = $row["blog_file"];
			$handle = fopen("blog_files/". $my_file, 'r') or die('Cannot open file: '. "blog_files/" . $my_file);
			$data = fread($handle,filesize("blog_files/" . $my_file));
			$data=substr($data,0,200);
		?> 
	<div class="newsfeeds"><a class="cardlink" href=<?php echo "blogcontent.php?blog_id=".$row['blog_id']; ?>>		
		<div class="userinfo" style=""><img src="avatar.jpg" style="width:100px;height:100px;verticle-align:center;border-radius:50%;"><?php echo $row['username']; ?> <span> &nbsp;&nbsp;&nbsp;<?php echo $row['blog_name']; ?></span></div>
		<div class="summary" style="width:90%;margin:10px auto;"><?php echo $data.'....'; ?></div>
	</a>
	</div>

		<?php } ?>

	

</div>	
</div>

<div class="tih_link">
<h1 style="font-family:times new roman">Recent Updates</h1>
<hr>
<?php
        $qry="select * from blog as b where (select count(*) from blog as x where x.blog_id > b.blog_id) < 3";
		$result=$conn->query($qry);
// $rowcount=mysqli_num_rows($result);
// echo "$rowcount";
?>
<!-- <div class="recentupdates" onmouseover="pauseDiv();" onmouseout="resumeDiv();"> -->
<marquee onmouseover="stop()" style="height 200px" onmouseout="start()" scrollamount="2" scrolldelay="1" direction="up" align="center">
<?php while($row=$result->fetch_assoc())
{
	echo "<p>".$row['username'] . " recently uploaded a blog on " . $row['blog_name'] . "<br></p>";	
}	
?>
</marquee>

		<!-- <script type="text/javascript">
			ScrollRate = 50;

			function scrollDiv_init() {
				DivElmnt = document.getElementsByClassName('recentupdates')[0];
				ReachedMaxScroll = false;
				
				DivElmnt.scrollTop = 0;
				PreviousScrollTop  = 0;
				
				ScrollInterval = setInterval('scrollDiv()', ScrollRate);
			}

			function scrollDiv() {
				
				if (!ReachedMaxScroll) {
					DivElmnt.scrollTop = PreviousScrollTop;
					PreviousScrollTop++;
					
					ReachedMaxScroll = DivElmnt.scrollTop >= (DivElmnt.scrollHeight - DivElmnt.offsetHeight);
				}
				else {
					ReachedMaxScroll = (DivElmnt.scrollTop == 0)?false:true;
					
					DivElmnt.scrollTop = PreviousScrollTop;
					PreviousScrollTop--;
				}
			}

			function pauseDiv() {
				clearInterval(ScrollInterval);
			}

			function resumeDiv() {
				PreviousScrollTop = DivElmnt.scrollTop;
				ScrollInterval    = setInterval('scrollDiv()', ScrollRate);
			}
 
</script> -->

</div>
<?php 
	$username = $_SESSION['user'];
	$qry = "select * from blog where username = '$username'";
	$result = $conn->query($qry);
	?>
<div class="youuploaded">
	<h2 style="font-family:times new roman">you uploaded</h2><hr>
	<?php 
	while ($row=$result->fetch_assoc()) 	{
			$my_file = $row["blog_file"];
			$handle = fopen("blog_files/". $my_file, 'r') or die('Cannot open file: '. "blog_files/" . $my_file);
			$data = fread($handle,filesize("blog_files/" . $my_file));
			$data=substr($data,0,200);
	?>
	<div class="userblogdiv"><a href=<?php echo "blogcontent.php?blog_id=".$row['blog_id']; ?> class="cardlink">		
		<h4 style="text-align:center"><?php echo $row['blog_name']; ?> </h4>
		<div class="summary" style="width:90%;margin:10px auto;"><?php echo $data.'....'; ?></div>
	</a>
	</div>
	<?php } ?>
</div>
</div>



<?php include_once 'footer.php'; ?> 

</body>
</html>