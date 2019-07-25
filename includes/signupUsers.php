<?php
if (isset($_POST['signup-submit'])) {

	require 'dataHander.php';

	$username = $_POST['userid'];
	$email = $_POST['email'];
	$password = $_POST['pwd'];
	$passwordConf = $_POST['pwd-confirm'];

	if (empty($username) || empty($email)
		|| empty($password) || empty($passwordConf)) {
		header("Location: ../signup.php?error=emptyfields&userid"
			.$username."&email=".$email);
		//echo "Missing Field(s).";
		exit();
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location: ../signup.php?error=invaliduidemail");
		exit();
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) {
		header("Location: ../signup.php?error=invalidemail&userid".$username);
		//echo "Invalid Email.";
		exit();
	} elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location: ../signup.php?error=invaliduid&email".$email);
		//echo "Invalid Username: Use only letters and numbers.";
		exit();
	} elseif ($password !== $passwordConf) {
		header("Location: ../signup.php?error=passwordmatch&userid"
			.$username."&email=".$email);
		//echo "Passwords do not match."
		exit();
	}
	$sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
	$state = mysqli_state_init($connect);
	if (!mysqli_state_prepare($state, $sql)) {
		header("Location: ../signup.php?error=sqlerror");
		//echo "Login Failed."
		exit();
	}
	mysqli_state_bind_param($state, "s", $username);
	mysqli_state_execute($state);
	mysqli_state_store_result($state);
	$resultCheck = mysqli_state_num_rows($state);
	if ($resultCheck > 0) {
		header("Location: ../signup.php?error=usertaken&email=".$email);
		//echo "This username is already taken."
		exit();
	}
	$sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
	$state = mysqli_state_init($connect);
	if (!mysqli_state_prepare($state, $sql)) {
		header("Location: ../signup.php?error=sqlerror");
		//echo "Error.";
		exit();
	}
	$encrypt = password_hash($password, PASSWORD_DEFAULT)
	mysqli_state_bind_param($state, "sss", $username, $email, $encrypt);
	mysqli_state_execute($state);
	header("Location: ../signup.php?signup=success");
	//echo "Success.";
	exit();
	mysqli_state_close($state);
	mysqli_close($connect);
}
header("Location: ../signup.php");
exit();
