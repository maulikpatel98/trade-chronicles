<?php 
$page = "home";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Trade Chronicle</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  
</head>
<body>
<?php include_once('header.php');
if(isset($_GET['cn']))
{
   $stid=0;
	$cnid = $_GET['cn'];
}
if(isset($_GET['st']))
{
   $cnid=0;
	$stid = $_GET['st'];
}
	if(!isset($_GET['cn']) && !isset($_GET['st']) )
{
$stid=0;
$cnid=0; }	?>
<!--slide-->
<div class="slideshow">
<div class="slideshow-container">

<div class="mySlides fade">
  
  <img src=<?php 
  if(isset($cnid))
  {
  if($cnid==1 )
  {
	  echo "indiajapan.jpg";//img1
  }	  
  else if($cnid==2 )
  {
	 echo "indiaitaly.jpg"; //img2
  }
  else if($cnid==3)
  {
	 echo "indiafrance.jpg";//img3  
  }
  }
  if(isset($stid))
  {
  if($stid==1)
  {
	  echo "historyofsurat.jpg";
  }
  else if( $stid==2)
  {
	   echo "bombay.jpg";
  }
   else if($stid==3)
  {
	  
  }
  }
  if($cnid==0 && $stid==0)
echo "header1.jpg"	?> style="width:100%;height:450px">
</div>

<div class="mySlides fade">
  
  <img src=<?php 
  if(isset($cnid))
  {
  if($cnid==1 )
  {
	  //img1
  }	  
  else if($cnid==2 )
  {
	  //img2
  }
  else if($cnid==3)
  {
	//img3  
  }
  }
  if(isset($stid))
  {
  if($stid==1)
  {
	  
  }
  else if( $stid==2)
  {
	  echo "bombay1.jpg";
  }
   else if($stid==3)
  {
	  
  }
  }
  
if($cnid==0 && $stid==0)
echo "indian_ocean_trade.jpg"  ?>  style="width:100%;height:450px">
</div>

<div class="mySlides fade">
  
  <img src=<?php 
  if(isset($cnid))
  {
  if($cnid==1 )
  {
	  //img1
  }	  
  else if($cnid==2 )
  {
	  //img2
  }
  else if($cnid==3)
  {
	//img3  
  }
  }
  if(isset($stid))
  {
  if($stid==1)
  {
	  
  }
  else if( $stid==2)
  {
	  echo "bombay2.jpg";
  }
   else if($stid==3)
  {
	  
  }
  }
  
if($cnid==0 && $stid==0)
echo "namo1.jpg"  ?> style="width:100%;height:450px">
  <div class="top-right">
  </div>
</div>
  
</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
</div>
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
<?php
  if(isset($cnid))
  {
  if($cnid==1 )
  {
	  $my_file="indiajapan.txt";
	// echo "content from file indiajapan.txt" ;//img1
     $handle = fopen($my_file, 'r') or die('Cannot open file:  '.$my_file);
    $data = fread($handle,filesize($my_file));  
	$dataarr = explode('#', $data);
      for($i=0;$i<count($dataarr);$i++) 
      {
      ?> 
        <div class="storycontent"><p><?php echo $dataarr[$i]; ?></p></div> 
      <?php 
      }
     
  }	  
  else if($cnid==2 )
  {
	  $my_file="indiaitaly.txt";
	// echo "content from file indiaitaly.txt" ;//img2
  $handle = fopen($my_file, 'r') or die('Cannot open file:  '.$my_file);
$data = fread($handle,filesize($my_file));
  $dataarr = explode('#', $data);
      for($i=0;$i<count($dataarr);$i++) 
      {
      ?> 
        <p><?php echo $dataarr[$i]; ?></p> 
      <?php 
      }
  }
  else if($cnid==3)
  {
	$my_file="indiafrance.txt";
//	 echo "content from file indiafrance.txt" ;//img3  
  $handle = fopen($my_file, 'r') or die('Cannot open file:  '.$my_file);
$data = fread($handle,filesize($my_file));
  echo $data;
  }
  }
  if(isset($stid))
  {
  if($stid==1)
  {
	  $my_file="historyofsurat.txt";
	// echo "content from file historyofsurat.txt" ;
  $handle = fopen($my_file, 'r') or die('Cannot open file:  '.$my_file);
$data = fread($handle,filesize($my_file));
  $dataarr = explode('#', $data);
      for($i=0;$i<count($dataarr);$i++) 
      {
      ?> 
        <p><?php echo $dataarr[$i]; ?></p> 
      <?php 
      }
  }
  else if( $stid==2)
  {
	  $my_file = "bombay.txt";
	//  echo "content";
  $handle = fopen($my_file, 'r') or die('Cannot open file:  '.$my_file);
$data = fread($handle,filesize($my_file));
  $dataarr = explode('#', $data);
      for($i=0;$i<count($dataarr);$i++) 
      {
      ?> 
        <p><?php echo $dataarr[$i]; ?></p> 
      <?php 
      }
  }
   else if($stid==3)
  {
	  
  }
  }
?>
<?php if ($stid==0 && $cnid==0) {
  ?>

<div style="text-align:center;"><p style="font-size:40px;color:maroon;">Traders map</p>
<img src="india.jpg" usemap="#workmap">
<map name="workmap">
    <area shape="rect" coords="300,700,400,800" href="statesdetail.php?st_id=5">
    <area shape="rect" coords="200,800,300,900" href="statesdetail.php?st_id=2">
    <area shape="rect" coords="300,900,400,1000" href="statesdetail.php?st_id=1">
    <area shape="rect" coords="200,600,300,700" href="statesdetail.php?st_id=4">
    <area shape="rect" coords="100,500,200,600" href="statesdetail.php?st_id=3">
    <area shape="rect" coords="350,350,450,500" href="statesdetail.php?st_id=6">
    <area shape="rect" coords="200,920,300,1020" href="statesdetail.php?st_id=7">
</map>
</div>
  <?php
} ?>
<?php include_once('footer.php');?>
</body>
</html>