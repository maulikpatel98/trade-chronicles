<?php 
$page = "story";
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Story</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		
	</style>

</head>
<body>

<?php include_once('header.php');?>

<!--description-->


<div class="description" >
  
  
  
<div class="infotitle">
  
  
  
  Trade Stories 
</div>       
<div class="searchbar">
	<form method="post">
		<input type="text" style="width:200px;" placeholder="search..." name="search" size='20' >
		<button type="submit" name="sbtn" style="height:40px;"><i class="fa fa-search"></i></button>
	</form>
  </div>
<div class="infocontent">
  !!..Welcome to the trade stories..!!<br>
here you can get articles and blogs about different trade stories, to know more you can just click the image.! 
</div>

</div>


<div style="margin-top:40px;">
<?php
$conn=mysqli_connect("localhost","root","","trade");
if(isset($_POST['search']))
{
$keyword=$_POST['search'];
//echo $keyword;
$qry="SELECT * FROM storycontent";

$result=$conn->query($qry);
$bool = array();
	$i=0;
while($row=$result->fetch_assoc())
{
	if($row['ky1']==$keyword || $row['ky2']==$keyword || $row['ky3']==$keyword )
	{
		$bool[$i]=true;
	}
	else{
		$bool[$i]=false;

	}
		$i++;	
}	
?>

<?php
$flag=false;
for($j=0;$j<count($bool);$j++)
{
if($bool[$j]==true)
{
$flag=true;
	$qry="SELECT * FROM storycontent where story_id=($j+1)";	
	$result=$conn->query($qry);
	$row=$result->fetch_assoc();
	?>
<div class="card space">
  <a class="cardlink" href="storycontent.php?story_id=<?php echo $row['story_id']; ?>">
  <img src=<?php echo $row['story_img'];?> alt="Avatar" style="width:100%;height:200px">
  <div class="container">
    <h4><b><?php echo $row['story_name'];?></b></h4> 
    <p>Architect & Engineer</p> 
  </div>
  </a>
</div>

<?php 
}
}
if($flag==false)
{
$qry="SELECT * FROM storycontent";	
	$result=$conn->query($qry);
	while($row=$result->fetch_assoc())
 { ?>
	 <div class="card space">
  <a class="cardlink" href="storycontent.php?story_id=<?php echo $row['story_id']; ?>">
  <img src=<?php echo $row['story_img'];?> alt="Avatar" style="width:100%;height:200px">
  <div class="container">
    <h4><b><?php echo $row['story_name'];?></b></h4> 
    <p>Architect & Engineer</p> 
  </div>
  </a>
</div>
	<?php 
 }
}
}

else{

$qry="SELECT * FROM storycontent";	
	$result=$conn->query($qry);
	while($row=$result->fetch_assoc())
 { ?>
	 <div class="card space">
  <a class="cardlink" href="storycontent.php?story_id=<?php echo $row['story_id']; ?>">
  <img src=<?php echo $row['story_img'];?> alt="Avatar" style="width:100%;height:200px">
  <div class="container">
    <h4><b><?php echo $row['story_name'];?></b></h4> 
    
  </div>
  </a>
</div>
<?php 
}  }

	?>
	 
	 
	 
	 
<?php include_once('footer.php');?>

</body>
</html>