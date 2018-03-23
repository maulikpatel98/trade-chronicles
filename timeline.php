<?php 
$page = "timeline";
?>

<!DOCTYPE html>
<html>
<head>
<title>Trader's Cafe</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php include_once('header.php');?>

<!--description-->
<div class="description">
  
<div class="infotitle">
  History Eras
</div>
<div class="infocontent">
  !!..Welcome to the trader's cafe..!!<br>
here you can get knowledge about different trade Eraa, to know about trade at any era you can just click the it in image.! 
</div>

</div>

<!--slide-->
<div class="slideshow">
<div class="slideshow-container">

<div class="mySlides fade">
  
  <img src="timeline1.jpg" usemap="#workmap" style="width:100%">
  <map name="workmap">
    <area shape="circle" coords="60,200,30" href="timeline.php?title_id=1">
    <area shape="circle" coords="310,200,30" href="timeline.php?title_id=2">
    <area shape="circle" coords="550,200,30" href="timeline.php?title_id=3">
    <area shape="circle" coords="790,200,30" href="timeline.php?title_id=4">
    <area shape="circle" coords="1030,200,30" href="timeline.php?title_id=5">
  </map>
</div>

<div class="mySlides fade">
  
  <img src="timeline1.jpg" usemap="#workmap" style="width:100%">
  <map name="workmap">
    <area shape="circle" coords="260,200,10" href="timeline.php?title_id=2">
  </map>
  
</div>

<div class="mySlides fade">
  
  <img src="timeline1.jpg" style="width:100%">
  
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>
</div>
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>

<?php


//echo $id;
if(isset($_GET["title_id"]))
{
  
  
	$id =$_GET["title_id"];
  $qry1="select * from time_line where title_id=$id";

	$conn1=mysqli_connect("localhost","root","","trade");
$result1=$conn1->query($qry1);
$row1=$result1->fetch_assoc();

$my_file = $row1["file_name"];
$title = $row1["title"];
$handle = fopen($my_file, 'r') or die('Cannot open file: '.$my_file);
$data = fread($handle,filesize($my_file));

echo "<div style='padding-top:120px;'id='data'><h1 class='chronologytitle' style='text-align:center;'>$title</h1>";?>
<div class="chronology"> <?php echo "$data"; } ?></div></div> 
  
  <!--hidden button for which automaticaly goes to content-->
  <button id="temp" style="display:none" onclick="location.href='#data';"></button>
  <script type="text/javascript">
    document.getElementById("temp").click();
  </script>
  
<?php include_once('footer.php');?>

</body>
</html> 
