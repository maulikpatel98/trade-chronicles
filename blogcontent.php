<?php
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

<div class="header" >
  <a href="index.php" class="logo">Trade Chronicle</a>
  
  <div class="header-right">
    <a href="http://commerce.gov.in/" style="float:right;padding:0px;"><img src="logo.jpg" style="float:right;margin-left:20px;padding:0px;verticle-align:center;width:70px;height:70px;border-radius:50%;"></a>
    <?php
      if(isset($_SESSION['user'])) 
      echo '<a class="active" href="logout.php">logout</a>';
      else
      echo '<a class="active" href="login.php">login</a>';
    
    ?>
    <a href="#contact">Contact</a>
    <a href="#about">About</a>
    <!--google translate-->
  <div style="overflow:hidden;">
  <div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  
  </div>
  <!--google translate-->
  </div>
</div>


<!--header completed-->

<div class="storycontainer">
	
	<div class="storytitle"><b><?php echo $row['blog_name'];?></b></div>
		
		<div class="blogwriter">
		<img src="avatar.jpg" alt="Avatar" class="avatar"><br>
		<h5 style=""><?php echo "@".$username; ?></h5>
		</div>
	
	<div class="storycontent">
		<div class="storyimg"><img src=<?php echo 'blog_files/'.$row['blog_img'];?>></div>
		<div class="storydata"><?php echo $data;?></div>
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