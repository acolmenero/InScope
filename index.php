<?php
	require "header.php"
?>

	<main>
		<div class="body">
			<section class="">
				<?php
					if (isset($_SESSION['userid'])) {
						echo '<p>You are logged in.</p>';
					}
					echo '<p>You are logged out.</p>';
				?>
			</section>
		</div>
	</main>

<?php
	require 'footer.php';
?>
