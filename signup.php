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
	$email=$_POST["email"];

$conn=mysqli_connect("localhost","root","","trade");
$qry="SELECT * FROM user where username='$username' ";
$result=$conn->query($qry);
$ans=mysqli_num_rows($result);
	
	if($ans <= 0)
	{


		$qry="INSERT INTO user (username,password,email) VALUES ('$username','$password','$email')";
		$result=$conn->query($qry);

//echo "login";
	
		if($result===TRUE)
		{
			$_SESSION["user"]=$username;
			//echo "successful login";
			echo ("<script>location.href='index.php'</script>");
		}
	
		else
		{
			$msg = "Sign up properly";
		}

	}
	else
	{
		$msg = "user already exist with this user name";
	}
}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Sign up</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

  
<!--description-->
<div class="description">
<div class="infotitle">
  sign up
</div>
</div>


<div class="login">
		<div class="loginform">
			<form method="POST">
			<?php if(isset($msg)){ echo $msg; } ?><br><br>
				your username <input class="inputfield" type="text" name="uname" placeholder="username" required="TRUE" autofocus><br><br>
				your email <input class="inputfield" type="email" name="email" placeholder="email address" required="TRUE"><br><br>
				your password <input class="inputfield" type="password" name="pass" placeholder="password" required="TRUE"><br><br>
				<div style="width:100%; display:inline-flex;">
				signup type<input type="radio" name="r1">buyer
							<input type="radio" name="r2" >seller
							<input type="radio" name="r3" >writers</div><br><br>
				<input class="tablink" style="float:none; width:30%; height:auto;" type="submit" name="submit" value="signup">
			</form>

		</div>
</div>


<?php include_once('footer.php') ?>


</body>
</html>