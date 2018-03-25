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
<?php include_once('header.php');?>
<!--slide-->
<div class="slideshow">
<div class="slideshow-container">

<div class="mySlides fade">
  
  <img src="header1.jpg" style="width:100%;height:450px">
</div>

<div class="mySlides fade">
  
  <img src="indian_ocean_trade.jpg" style="width:100%;height:450px">
</div>

<div class="mySlides fade">
  
  <img src="namo1.jpg" style="width:100%;height:450px">
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

<!--component-->
<div class="div_title"> <h2> Trending now</h2> </div>
<div style="display:inline-flex;">
<div class="card space">
  <a class="cardlink" href="">
  <img src="his1.jpg" alt="Avatar" style="width:100%">
  <div class="container">
    <h4><b>John Doe</b></h4> 
    <p>Architect & Engineer</p> 
  </div>
</a>
</div>

<div class="card space">
  <a class="cardlink" href="">
  <img src="his2.jpg" alt="Avatar" style="width:100%">
  <div class="container">
    <h4><b>John Doe</b></h4> 
    <p>Architect & Engineer</p> 
  </div>
  </a>
</div>

<div class="card space">
  <a class="cardlink" href="">
  <img src="his3.jpg" alt="Avatar" style="width:100%">
  <div class="container">
    <h4><b>John Doe</b></h4> 
    <p>Architect & Engineer</p> 
  </div>
  </a>
</div>
</div>
<button class="button button2">more info..>></button>
<br>

<div class="div_title"> <h2> History</h2> </div>

<div style="display:inline-flex;">
<div class="card space">
  <a class="cardlink" href="">
  <img src="his1.jpg" alt="Avatar" style="width:100%">
  <div class="container">
    <h4><b>John Doe</b></h4> 
    <p>Architect & Engineer</p> 
  </div>
</a>
</div>

<div class="card space">
  <a class="cardlink" href="">
  <img src="his2.jpg" alt="Avatar" style="width:100%">
  <div class="container">
    <h4><b>John Doe</b></h4> 
    <p>Architect & Engineer</p> 
  </div>
  </a>
</div>

<div class="card space">
  <a class="cardlink" href="">
  <img src="his3.jpg" alt="Avatar" style="width:100%">
  <div class="container">
    <h4><b>John Doe</b></h4> 
    <p>Architect & Engineer</p> 
  </div>
  </a>
</div>
</div>
<button class="button button2">more info..>></button>
<br>


<div class="div_title"> <h2> Top Facts</h2> </div>


<div style="display:inline-flex;">
<div class="card space">
  <a class="cardlink" href="">
  <img src="his1.jpg" alt="Avatar" style="width:100%">
  <div class="container">
    <h4><b>John Doe</b></h4> 
    <p>Architect & Engineer</p> 
  </div>
</a>
</div>

<div class="card space">
  <a class="cardlink" href="">
  <img src="his2.jpg" alt="Avatar" style="width:100%">
  <div class="container">
    <h4><b>John Doe</b></h4> 
    <p>Architect & Engineer</p> 
  </div>
  </a>
</div>

<div class="card space">
  <a class="cardlink" href="">
  <img src="his3.jpg" alt="Avatar" style="width:100%">
  <div class="container">
    <h4><b>John Doe</b></h4> 
    <p>Architect & Engineer</p> 
  </div>
  </a>
</div>
</div>
<button class="button button2">more info..>></button>
<br>


<div class="div_title"> <h2> Today in History</h2> </div>


<div style="display:inline-flex;">
<div class="card space">
  <a class="cardlink" href="">
  <img src="his1.jpg" alt="Avatar" style="width:100%">
  <div class="container">
    <h4><b>John Doe</b></h4> 
    <p>Architect & Engineer</p> 
  </div>
</a>
</div>

<div class="card space">
  <a class="cardlink" href="">
  <img src="his2.jpg" alt="Avatar" style="width:100%">
  <div class="container">
    <h4><b>John Doe</b></h4> 
    <p>Architect & Engineer</p> 
  </div>
  </a>
</div>

<div class="card space">
  <a class="cardlink" href="">
  <img src="his3.jpg" alt="Avatar" style="width:100%">
  <div class="container">
    <h4><b>John Doe</b></h4> 
    <p>Architect & Engineer</p> 
  </div>
  </a>
</div>
</div>
<button class="button button2" style="margin-bottom:10px">more info..>></button>
<br>

<?php include_once('footer.php');?>
</body>
</html>