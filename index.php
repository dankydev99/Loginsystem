<?php require "header.php"; ?>

<main>
	<br><br>
	<?php 
		if(isset($_SESSION['ID'])){
			echo("<p>You are logged in!</p>");
		}
		else{
			echo("<p>You are logged OUT!</p>");
		}
	
	?>	
</main>

<?php require "footer.php"; ?>

