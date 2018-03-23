<?php
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

<div class="header" >
  <a href="index.php" class="logo">Trade Chronicle</a>
  
  <div class="header-right">
    <a class="active" href="#home">login</a>
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
	
	<div class="storytitle"><b><?php echo $row['story_name'];?></b></div>
	<div class="storycontent">
		<div class="storyimg"><img src=<?php echo $row['story_img'];?>></div>
		<div class="storydata"><?php echo $data;?></div>
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
</div>
	
	<?php include_once('footer.php'); ?>
	
</body>
</html>