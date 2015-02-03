<?php
session_start();
if(isset($_SESSION['username']))
{
    header("location:home.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
	<link rel="stylesheet" href="login.css">
</head>

<body>

	<div id="container">
		<h2><?php if(isset($_GET['msg'])) echo $_GET['msg'];?></h2>
		<form name="f" method="post" action="login_insert.php">
		
		<label for="name">Username:</label>
		
		<input type="name" name="username"  placeholder="Username" >
		
		<label for="username">Password:</label>
		
		<!--<p><a href="#">Forgot your password?</a>-->
		
		<input type="password" name="password" placeholder="Password" >
		
		<div id="lower">
		
		
		
		<input type="submit" name="submit" value="Login" style="background:#edbc39;" >
		
		</div>
		
		</form>
		
	</div>

    

</body>
</html>