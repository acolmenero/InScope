<?php
if (isset($_POST['login-submit'])) {
	require 'dataHander.php';
	$mailuid = $_POST['mailuid'];
	$password = $_POST['pwd'];

	if (empty($mailuid) || empty($password)) {
		header("Location: ../index.php?error=emptyfields");
		exit();
	}
	$sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?"
	$state = mysqli_state_init($connect);
	if (!mysqli_state_prepare($state)) {
		header("Location: ../index.php?error=emptyfields");
		exit();
	}
	mysqli_state_bind_param($state, "ss", $mailuid, $mailuid);
	mysqli_state_execute($state);
	$result = mysqli_state_get_result($state);
	if ($row = mysqli_fetch_assoc($result)) {
		$passCheck = password_verify($password, $row['pwdUsers']);
		if ($passCheck == false) {
			header("Location: ../index.php?error=failed");
			exit();
		} else if ($passCheck == true) {
			session_start();
			$_SESSION['userid'] = $row['idUsers'];
			$_SESSION['useruid'] = $row['uidUsers'];
			header("Location: ../index.php?login=success");
			exit();
		}
		header("Location: ../index.php?error=failed");
		exit();

	}
	header("Location: ../index.php?error=nosuchuser");
	exit();
}

header("Location: ../index.php");
exit();
