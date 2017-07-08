<?php

$connection = new mysqli("localhost", "root", "password", "exercise_csrf_attack");

if ($connection->connect_errno) {
	printf("Connection failed: %s\n", $connection->connect_error);
	exit();
}

?>
