<!DOCTYPE html>
<html>
<head>
	<title>E-Money | Login</title>
</head>
<body>

<div>
	<h1>E-Money Apps</h1>
	<p>The largest digital money transfer</p>
</div>

<div>
	<h2>Log in</h2>
	<form method="post">
		<input type="text" name="username" placeholder="username" />
		<input type="password" name="password" placeholder="password" />
		<input type="submit" name="submit" value="Login"/>
	</form>
</div>

<?php
	include_once("connect.php");
	if(isset($_POST["submit"])){
		session_start();
		$username = $_POST["username"];
		$password = $_POST["password"];
		$_SESSION["username"] = $_POST["username"];
		$_SESSION["password"] = $_POST["password"];
		if($result = $connection->query("SELECT * FROM users WHERE username='$username' AND password='$password'")){
			$_SESSION["result"] = $result->num_rows;
			$result->close();
		}
		if($_SESSION["result"] == 1){
			// echo "Authenticated";
			header("location:main.php");
		} else{
			echo "Error";
		}
	}
?>

</body>
</html>
