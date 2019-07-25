<?php
	require "header.php"
?>

	<main>
		<div class="">
			<section class="">
				<h1>Sign Up</h1>
				<?php
					if (isset($_GET['error'])) {
						if ($_GET['error'] == "emptyfields") {
							echo '<p class = "">Missing field(s).</p>';
						} else if ($_GET['error'] == "invaliduidemail") {
							echo '<p class = "">Invalid username and email.</p>';
						} else if ($_GET['error'] == "invaliduid") {
							echo '<p class = "">Invalid unsername..</p>';
						} else if ($_GET['error'] == "invalidemail") {
							echo '<p class = "">Invalid Email.</p>';
						} else if ($_GET['error'] == "passwordmatch") {
							echo "Passwords do not match.";
						} else if ($_GET['error'] == "usertaken") {
							echo "This username is already taken.";
						}
					} elseif ($_GET["signup"] == "success") {
						echo "Success!";
					}
				?>
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
