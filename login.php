<?php
session_start();
	include "class/connect.php";
	include "class/Login.php";

	$email = "";
	$password = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$login = new Login();
		$result = $login->evaluate($_POST);

		if ($result != "") {
			echo "<h4 style='color: red;'>The Error occured</h4>";
			echo $result;
			echo "<br>";
		} else {
			header("Location: profile.php");
			die();
		}
		$email = $_POST["email"];
		$password = $_POST["password"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
	<form method="POST" action="">
		<input name="email" type="<?php echo $email; ?>" name="email" type="text" id="text" placeholder="Email"><br><br>

		<input name="password" type="<?php echo $password; ?>" name="password" type="password" id="text" placeholder="Password"><br><br>

		<input type="submit" id="button" value="sign up">
	</form>    
</body>
</html>
