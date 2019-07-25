<?php

$servername = "localhost";
$dBusername = "root";
$dBPassword = "";
$dBName = "ScopeLoginSystem";

$connect = mysqli_connect($servername, $dBusername, $dBPassword, $dBName);

if (!$connect) {
	die("Unable to connect: " .mysqli_connect_error();
}
