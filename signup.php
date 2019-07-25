<?php
	require "header.php"
?>

	<main>
		<div class="">
			<section class="">
				<h1>Sign Up</h1>
				<form class="" action="include/signupUsers.php" method="post">
					<input type="text" name="userid" placeholder="Username">
					<input type="text" name="email" placeholder="Email">
					<input type="password" name="pwd" placeholder="Password">
					<input type="password" name="pwd-confirm" placeholder="Confirm Password">
					<button type="submit" name="signup-submit">Sign Up</button>
				</form>
			</section>
		</div>
	</main>

<?php
	require 'footer.php';
?>