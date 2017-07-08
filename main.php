<?php
	include_once("connect.php");
	session_start();
	if($_SESSION["result"] == 1){
		
		// echo "Authenticated";

		?>

<!DOCTYPE html>
<html>
<head>
	<title>E-Money | Main</title>
</head>
<body>

<div>
	<h1>E-Money Apps</h1>
	<p>The largest digital money transfer</p>
</div>

<div>
	<h2>Menu</h2>
	<a href="main.php">Main</a> &nbsp;
	<a href="money/">Money</a> &nbsp;
	<a href="message/">Message</a> &nbsp;
	<a href="logout.php">Logout</a> &nbsp;
</div>

<div>
	<h2>Greeting</h2>
	
	<?php
		$sender = $_SESSION["username"];
		if($result = $connection->query("SELECT * FROM users WHERE username='$sender'")){
			$sender = $result->fetch_array(MYSQLI_ASSOC);
			$result->close();
		}
	?>

	<p>Hello, <b><?php echo $sender["name"]; ?></b></p>
	<p>Balance remaining: <?php echo $sender["money"]; ?></p>	
</div>

<div>
	<h2>Main</h2>
	<p>We have two main features, choose which you likes.</p>
	<div>
		<a href="message/"><h3>Message</h3></a>
		<p>Send message to your friends.</p>
	</div>
	<div>
		<a href="money/"><h3>Money</h3></a>
		<p>Send money to your friends.</p>
	</div>
</div>

</body>
</html>

		<?php
	} else{
		echo "Error";
	}
?>