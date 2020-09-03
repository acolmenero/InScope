<?php
	require 'dataHander.php';
	$mailuid = $_POST['contact_email'];
	$message = $_POST['message'];

	if (empty($mailuid) || empty($message)) {
		header("Location: ../index.php?error=emptyfields");
		exit();
	}
?>