<?php 
$page = "home";
session_start();
?>
<?php 
include_once('header.php');
?>

<?php

$_SESSION['uid']=null;
$_SESSION['user']=null;

if(isset($_POST["submit"]))
{
	$username=$_POST["uname"];
	$password=$_POST["pass"];

$qry="SELECT * FROM user WHERE username='$username' and password='$password' ";

$conn=mysqli_connect("localhost","root","","trade");
$result=$conn->query($qry);
$row=$result->fetch_assoc();

//echo "login";

$ans=mysqli_num_rows($result);
	
	if($ans==1)
	{
	$_SESSION["user"]=$row['username'];
	$_SESSION["uid"]=$row['user_id'];
	//echo "successful login";
		if(isset($_GET['context']))
		echo ("<script>location.href='blog.php'</script>");
		else
		echo ("<script>location.href='index.php'</script>");

	}
	
	else
	{
		$msg = "invalid username or password";
	}

	}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

  
<!--description-->
<div class="description">
<div class="infotitle">
  Log in
</div>
</div>


<div class="login">
		<div class="loginform">
			<form method="POST">
				<?php if(isset($msg)){ echo $msg.'<br><br>'; } ?>
				username <input class="inputfield" type="text" name="uname" placeholder="username" autofocus><br><br>
				password <input class="inputfield" type="password" name="pass" placeholder="password"><br><br>
				<input class="tablink" style="float:none; width:30%; height:auto;" type="submit" name="submit" value="login">
				<a style="text-decoration:none;color:maroon;float:right;" href="signup.php">new here? sign up</a>
			</form>

		</div>
</div>


<?php include_once('footer.php') ?>


</body>
</html>