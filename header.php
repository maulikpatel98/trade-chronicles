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
<!--subnav-->
<div id="myHeader">
<button class="tablink" onclick="openPage('Home', this, '#ff9966')"  id="defaultOpen" >History</button>
<button class="tablink" onclick="openPage('News', this, '#ffcc66')">Times Now</button>



<div id="Home" class="tabcontent">
  
<button class="timetravel" id="H" 
 <?php if($page=='timeline'){echo 'style="background-color:#555"';}?>
onclick="location.href='timeline.php';">Trader's Cafe</button>
<button class="timetravel" id="H" 
<?php if($page=='story'){echo 'style="background-color:#555"';}?>
onclick="location.href='story.php';">Stories</button>
<button class="timetravel" id="H"
<?php if($page=='todayinhistory'){echo 'style="background-color:#555"';}?>
onclick="location.href='todayinhistory.php';">Today in history</button>
<button class="timetravel" id="H"
<?php if($page=='anecdote'){echo 'style="background-color:#555"';}?>
onclick="location.href='todayinhistory.php';">Anecdotes</button>
</div>

<div id="News" class="tabcontent">
  
<button class="timesnow" id="N">Trending Now</button>
<button class="timesnow" id="N">News</button>
<button class="timesnow" id="N">Top Facts</button>
<button class="timesnow" id="N">Blogs</button>
</div>

</div>
<script type="text/javascript"> 
function openPage(pageName,elmnt,color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(pageName).style.display = "block";
    elmnt.style.backgroundColor = color;

}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();

window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>
<!--subnav complete-->
