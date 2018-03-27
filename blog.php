<?php
	 session_start();
     if(!isset($_SESSION['user'])) 
      	echo "<script>location.href='login.php?context=b'</script>";
?>
<?php 
$page="blog";
?>
<?php 

$qry="SELECT * FROM blog";
$conn=mysqli_connect("localhost","root","","trade");
$result=$conn->query($qry);


?>
<!DOCTYPE html>
<html>
<head>
	<title>Blogs</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<!--header -->

<?php include_once("header.php") ?>

<!--header completed-->
	<!--description-->
<div class="description">
  
<div class="infotitle">
  Blogs
</div>
<div class="infocontent">
  !!..Welcome to the Blogs..!!<br>
here you can get articles and blogs written by people about different trades, to read more you can just click the image.! 
</div>

<div class="infotitle" style="font-size:30px;margin-top:10px;">
  upload your own blog
</div>
<div class="infocontent">
you can not only just read the other people blogs you can write your own too..!<br>
</div>
<div style="width:70%;margin:0 auto;text-align:center;">
<a class="tablink" style="text-decoration:none;text-align:center;width:30%;margin:20px;float:left;"
 href="writeblog.php">write your blog</a>
<a class="tablink" style="text-decoration:none;text-align:center;width:30%;margin:20px;float:right;"
 href="uploadpic.php">upload the picture</a>
</div>
</div>


<div style="margin-top:40px;">
<?php
while($row=$result->fetch_assoc())
{
	?>
	
<div class="card space" style="width:29%">
  <a class="cardlink" href="blogcontent.php?blog_id=<?php echo $row['blog_id']; ?>">
  <img src=<?php echo 'blog_files/'.$row['blog_img'];?> alt="Avatar" style="width:100%;height:200px">
  <div class="container">
    <h4><b><?php echo $row['blog_name'];?></b></h4> 
    <p>Architect & Engineer</p> 
  </div>
  </a>
</div>



<?php
}?>
</div>


<?php include_once 'footer.php'; ?>

</body>
</html>