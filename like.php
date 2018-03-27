<?php 
 session_start();
     if(!isset($_SESSION['user'])) 
      	echo "<script>location.href='login.php?context=b'</script>";
$conn=mysqli_connect("localhost","root","","trade");

if(isset($_GET['story_id'])){
	
$id = $_GET['story_id'];
$qry1 = "select * from storycontent where story_id=$id"; 
$result=$conn->query($qry1);
$row=$result->fetch_assoc();
$like = $row['story_like'];

$like++;

$qry = "update storycontent set story_like=$like where story_id=$id";

$result=$conn->query($qry);

echo ("<script>location.href='storycontent.php?story_id=$id'</script>");
}

if(isset($_GET['an_id'])){
	
$id = $_GET['an_id'];
$qry1 = "select * from anecdote where an_id=$id"; 
$result=$conn->query($qry1);
$row=$result->fetch_assoc();
$like = $row['an_like'];

$like++;

$qry = "update anecdote set an_like=$like where an_id=$id";

$result=$conn->query($qry);

echo ("<script>location.href='anecdotecontent.php?an_id=$id'</script>");
}

if(isset($_GET['fact_id'])){
	
$id = $_GET['fact_id'];
$qry1 = "select * from fact where fact_id=$id"; 
$result=$conn->query($qry1);
$row=$result->fetch_assoc();
$like = $row['fact_like'];

$like++;

$qry = "update fact set fact_like=$like where fact_id=$id";

$result=$conn->query($qry);

echo ("<script>location.href='factcontent.php?fact_id=$id'</script>");
}




?>


