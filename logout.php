<?php
	unset($_SESSION);
	session_destroy();
	header('location:login.php');
?>