<?php
$page="blog";
session_start();
if(!isset($_SESSION['user']))
echo "<script>location.href='login.php?context=b'</script>";
$id=$_GET["blog_id"];

$qry="SELECT * FROM blog WHERE blog_id=$id";
$conn=mysqli_connect("localhost","root","","trade");
$result=$conn->query($qry);

$row=$result->fetch_assoc();

$my_file = $row['blog_file'];
$username = $row['username'];
$handle = fopen('blog_files/'.$my_file, 'r') or die('Cannot open file:  '.$my_file);
$data = fread($handle,filesize('blog_files/'.$my_file));
?>

<!DOCTYPE html>
<html>
<head>
	<title>Blog</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<!--header -->

<?php include_once 'header.php'; ?>

<!--header completed-->

<div class="storycontainer">
	
	<div class="storytitle"><b><?php echo $row['blog_name'];?></b></div>
		
		<div class="blogwriter">
		<img src="avatar.jpg" alt="Avatar" class="avatar"><br>
		<h5 style=""><?php echo "@".$username; ?></h5>
		</div>
	
	<div class="storycontent">
		<div class="storyimg"><img src=<?php echo 'blog_files/'.$row['blog_img'];?>></div>
		<div class="storydata">
		<?php  $dataarr = explode('#', $data);
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
	
	<a style="color:maroon; text-decoration:none; float:left;" href="blogcontent.php?blog_id=<?php echo $id;?>">&lt;&lt;Prev</a>
	<?php
	}
	$qry1="SELECT * FROM blog";
	$result1=$conn->query($qry1);
	$num_rows = mysqli_num_rows($result1);
	if( (++$id) < $num_rows )
	{ ?>

		<a style="color:maroon; text-decoration:none; float:right;" href="blogcontent.php?blog_id=<?php echo ++$id;?>">Next&gt;&gt;</a>
	<?php } ?>
	</div>
</div>
	
	<?php include_once('footer.php'); ?>
	
</body>
</html>