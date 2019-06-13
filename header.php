<?php
session_start();
?>
<!DOCTYPE HTML>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
</head>
<body>
<header>
<nav class="nav-header">
	<a  class="logo-img" href="index.php"><img src="img/logo.png" style="width: 50px; height: 45 px;"></a>
	<ul>
		<li><a class="active" href="index.php">Home</a></li>
		<li><a href="#contact">Contact</a></li>
		<li><a href="#about">About</a></li>
	</ul>

	<div class="part2">
	<?php 
		if(isset($_SESSION['ID'])){
			echo('<form class="form1" method="POST" action="includes/logout.inc.php">
			<button type="submit" name="logout-submit">Logout</button>
		</form>');
		}
		else{
			echo('<form class="form1" method="POST" action="includes/login.inc.php">
			<input type="text" name="mailuid" placeholder="Username">
			<input type="password" name="pwd" placeholder="Password">
			<button type="submit" name="login-submit">Login</button>
		</form>

		<a class="signup" href="signup.php">Sign up!</a>');
		}
	
	?>	
				
				
				
	</div>
</nav>
</header>





