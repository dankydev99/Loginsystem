<?php require "header.php"; ?>

<main>
<div class="signup-form">
	<form  method="POST" action="includes/signup3.inc.php">
			<input type="text" name="email" placeholder="Email"><br>
			<input type="text" name="uid" placeholder="Username"><br>
			<input type="password" name="pwd" placeholder="Password"><br>
			<input type="password" name="pwd-repeat" placeholder="Repeat Password"><br>
			<button type="submit" name="signup-submit">Signup</button>
	</form>
</div>	
</main>

<?php require "footer.php"; ?>

