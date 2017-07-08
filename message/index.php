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
	<h2>Main</h2>
	<div>
		<h2>Message</h2>
	</div>
	<div>
		<h2>Transfer</h2>
	</div>
</div>

</body>
</html>

		<?php
	} else{
		echo "Error";
	}
?>