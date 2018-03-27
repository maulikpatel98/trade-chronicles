<?php 
$page="blog";
session_start();
if(!isset($_SESSION['user']))
echo "<script>location.href='login.php?context=b'</script>";
?>

<?php 

if(isset($_POST['submit']))
{
	$conn=mysqli_connect("localhost","root","","trade");

	$imgExtensions = array('.gif','.jpg','.jpeg','.png');

	$fileExtensions = array('.txt');




	$username=$_SESSION['user'];
	$blog_name=$_POST['blogtitle'];
	$blog_img=$_FILES['blogimage']['name'];	
	$blog_img = strtolower($blog_img);
	preg_match('/^(.*?)(\.\w+)?$/', $blog_img, $matches);
	$extension = isset($matches[2]) ? $matches[2] : '';
		
		if (!in_array($extension, $imgExtensions)) {
  			die("File extension not approved");
		}


	if (isset($_POST['content'])) {
		$content = $_POST['content'];
		if(strlen($content)>=1){
		$handle = fopen('blog_files/'.$blog_name.'.txt', 'w') or die('Cannot open file:  '.'blog_files/'.$blogtitle.'.txt');
		fwrite($handle,$content);
		$blog_file = $blog_name.'.txt';
		echo $blog_file;

		$qry="INSERT INTO blog (username,blog_name,blog_file,blog_img) VALUES ('$username','$blog_name','$blog_file','$blog_img')";
		$result=$conn->query($qry);

		if($result===TRUE){
			move_uploaded_file($_FILES['blogimage']['tmp_name'], "blog_files/".$blog_img);
			echo ("<script>location.href='blog.php'</script>");
		}
		else{
			$msg = "Cannot upload";
		}	

		}
	}

	if(!isset($blog_file)){
	if(isset($_FILES['blogfile']['name']))
	{
		$blog_file = $_FILES['blogfile']['name'];	
		$blog_file = strtolower($blog_file);
		preg_match('/^(.*?)(\.\w+)?$/', $blog_file, $matches);
		$extension1 = isset($matches[2]) ? $matches[2] : '';
		echo $extension1;
		if (!in_array($extension1, $fileExtensions)) {
  			die("File extension not approved");
		}
		if (strlen($blog_file)>=1) {
		$qry="INSERT INTO blog (username,blog_name,blog_file,blog_img) VALUES ('$username','$blog_name','$blog_file','$blog_img')";
		$result=$conn->query($qry);
		}

			if($result===TRUE){
				move_uploaded_file($_FILES['blogimage']['tmp_name'], "blog_files/".$blog_img);
				move_uploaded_file($_FILES['blogfile']['tmp_name'], "blog_files/".$blog_file);
				echo ("<script>location.href='blog.php'</script>");
			}
			else{
				$msg = "Cannot upload";
			}
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Upload Blog</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include_once 'header.php'; ?>
<div class="description">
<div class="infotitle">
  Write Blog
</div>
</div>
<div class="login">
		<div class="loginform" style="width:100%">
			<form enctype="multipart/form-data" method="POST">
				<?php if(isset($msg)){ echo $msg.'<br><br>'; } ?>
				blog title <input class="inputfield" type="text" name="blogtitle" placeholder="title" required="true" autofocus><br><br>

				blog content <br><br><textarea class="inputfield" rows="10" cols="100" name="content" placeholder="your content"></textarea><br><br>
				
				blog image <input class="inputfield" type="file" name="blogimage" required="true"><br><br>

				blog file(if you dont want to write you can also upload txt file for content) <input class="inputfield" type="file" name="blogfile" ><br><br>
				
				<input class="tablink" style="float:none; width:30%; height:auto;" type="submit" name="submit" value="upload">
			</form>

		</div>
</div>
</body>
</html>