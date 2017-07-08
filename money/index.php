<?php
	include_once("../connect.php");
	session_start();
	if($_SESSION["result"] == 1){

		?>

<!DOCTYPE html>
<html>
<head>
	<title>E-Money | Money</title>
</head>
<body>

<div>
	<h1>E-Money Apps</h1>
	<p>The largest digital money transfer</p>
</div>

<div>
	<h2>Menu</h2>
	<a href="../main.php">Main</a> &nbsp;
	<a href="#" onclick="location.reload();">Money</a> &nbsp;
	<a href="../message/">Message</a> &nbsp;
	<a href="../logout.php">Logout</a> &nbsp;
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
	<h2>Money</h2>
	<p>Send money to your friends.</p>

	<form method="post">
		<input type="text" name="receiver" placeholder="receiver" />
		<input type="number" name="amount" placeholder="amount" />
		<input type="submit" name="submit" value="Transfer"/>
	</form>
</div>

	<?php
		if(isset($_POST["submit"])){
			$sender = $_SESSION["username"];
			$receiver = $_POST["receiver"];
			$amount = $_POST["amount"];

			if($amount < 0){
				die("<p>The amount of money shouldn't be negative.</p>");
			}

			if($result = $connection->query("SELECT * FROM users WHERE username='$sender'")){
				$sender = $result->fetch_array(MYSQLI_ASSOC);
				$result->close();
			}

			if($result = $connection->query("SELECT * FROM users WHERE username='$receiver'")){
				if ($result->num_rows == 1){
					$receiver = $result->fetch_array(MYSQLI_ASSOC);	
				} else{
					die("<p>User <b>$receiver</b> isn't listed in the database.</p>");	
				}
				$result->close();
			}

			if($amount > $sender["money"]){
				die("<p>Your money isn't sufficient for transfer process.</p>");
			}

			$id = $receiver["id"];
			$money = $receiver["money"] + $amount;

			if($result = $connection->query("UPDATE users SET money='$money' WHERE id=$id")){
				if($result){
					$result = NULL;
					$id = $sender["id"];
					$money = $sender["money"] - $amount;
					if($result = $connection->query("UPDATE users SET money='$money' WHERE id=$id")){
						if($result){
							echo "<p>Money transfer succeeded.</p>";
						}
					}		
				}
			}


			
			
		}
	?>

</body>
</html>

		<?php
	} else{
		echo "Error";
	}
?>