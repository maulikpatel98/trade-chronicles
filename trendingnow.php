<?php
	 session_start();
     $page="trendingnow";
?>


<?php
 $conn=mysqli_connect("localhost","root","","trade");
?>


<!DOCTYPE html>
<html>
<head>
	<title>Trending now</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body> 

<?php 
include_once('header.php');
?>

<div class="description" style="margin-top:120px;"><img src="sld.png" style="width:100%;height:400px;"></div>
<div class="tih_container" style="margin-top:0px;border:none;">	
<div class="tih_content" style="margin-top:0px;border:none;width:100%;">

<div class="tih_data" style="padding:50px; font-size:20px;text-align:justify; color:#333;font-family:times new roman;margin-top:0px;padding-top:0px;">
	<h3 style="">Trending now</h3><hr>

		<?php 
		$qry1="select * from blog as b where (select count(*) from blog as x where x.blog_id > b.blog_id) < 3";
			$result=$conn->query($qry1);
			while($row=$result->fetch_assoc())
			{
			$my_file = $row['blog_file'];

			$handle = fopen('blog_files/'.$my_file, 'r') or die('Cannot open file: '.'blog_files/'.$my_file);
			$data = fread($handle,filesize('blog_files/'.$my_file));

			$data=substr($data,0,300);
		?> 

	<div class="newsfeeds"><a class="cardlink" href=<?php echo "blogcontent.php?blog_id=".$row['blog_id']; ?>>		
		<div class="summary" style="width:90%;margin:10px auto;text-align:center;"><h3 style=""><?php echo $row['blog_name']; ?>
		</h3></div>
		<div class="summary" style="width:90%;margin:10px auto;"><?php  $dataarr = explode('#', $data);
      for($i=0;$i<count($dataarr);$i++) 
      {
      ?> 
        <p><?php echo $dataarr[$i]; ?></p> 
      <?php 
      }
     ?></div>
	</a>
	</div>

		<?php } ?>
	

</div>




<div class="tih_data" style="padding:50px; font-size:20px;text-align:justify; color:#333;font-family:times new roman;margin-top:0px;padding-top:0px;">
	<h3 style="">Trending Stories</h3><hr>

		<?php 
		$qry1="select * from storycontent as b where (select count(*) from storycontent as x where x.story_like > b.story_like) < 3";
			$result=$conn->query($qry1);
			while($row=$result->fetch_assoc())
			{
			$my_file = $row['story_file'];

			$handle = fopen($my_file, 'r') or die('Cannot open file: '.$my_file);
			$data = fread($handle,filesize($my_file));

			$data=substr($data,0,300);
		?> 

	<div class="newsfeeds"><a class="cardlink" href=<?php echo "storycontent.php?story_id=".$row['story_id']; ?>>		
		<div class="summary" style="width:90%;margin:10px auto;text-align:center;"><h3 style=""><?php echo $row['story_name']; ?><span style="margin-left:500px;">
			<?php echo $row['story_like']. " likes"; ?></span>
		</h3></div>
		<div class="summary" style="width:90%;margin:10px auto;"><?php echo $data.'....'; ?></div>
	</a>
	</div>

		<?php } ?>
	

</div>


<div class="tih_data" style="padding:50px; font-size:20px;text-align:justify; color:#333;font-family:times new roman;margin-top:0px;padding-top:0px;">
	<h3 style="">Trending Facts</h3><hr>

		<?php 
		$qry1="select * from fact as b where (select count(*) from fact as x where x.fact_like > b.fact_like) < 3";
			$result=$conn->query($qry1);
			while($row=$result->fetch_assoc())
			{
			$my_file = $row['fact_file'];

			$handle = fopen($my_file, 'r') or die('Cannot open file: '.$my_file);
			$data = fread($handle,filesize($my_file));

			$data=substr($data,0,100);
		?>  
		
	<div class="newsfeeds"><a class="cardlink" href=<?php echo "factcontent.php?fact_id=".$row['fact_id']; ?>>		
		<div class="" style="width:90%;margin:10px auto;text-align:center;"><h3><?php echo $row['fact_name']; ?><span style="margin-left:500px;">
			<?php echo $row['fact_like']. " likes"; ?></span></h3></div>
		<div class="summary" style="width:90%;margin:10px auto;"><?php echo $data.'....'; ?></div>
	</a>
	</div>

		<?php } ?>
	

</div>

<div class="tih_data" style="padding:50px; font-size:20px;text-align:justify; color:#333;font-family:times new roman;margin-top:0px;padding-top:0px;">
	<h3 style="">Trending Anecdotes</h3><hr>

		<?php 
		$qry1="select * from anecdote as b where (select count(*) from anecdote as x where x.an_like > b.an_like) < 3";
			$result=$conn->query($qry1);
			while($row=$result->fetch_assoc())
			{
			$my_file = $row['an_file'];

			$handle = fopen($my_file, 'r') or die('Cannot open file: '.$my_file);
			$data = fread($handle,filesize($my_file));

			$data=substr($data,0,100);
		?>  
		
	<div class="newsfeeds"><a class="cardlink" href=<?php echo "anecdotecontent.php?an_id=".$row['an_id']; ?>>		
		<div class="" style="width:90%;margin:10px auto;text-align:center"><h3><?php echo $row['an_name']; ?><span style="margin-left:500px;">
			<?php echo $row['an_like']. " likes"; ?></span></h3></div>
		<div class="summary" style="width:90%;margin:10px auto;"><?php echo $data.'....'; ?></div>
	</a>
	</div>

		<?php } ?>
	

</div>	
</div>
</div>


<?php include_once 'footer.php'; ?> 

</body>
</html>