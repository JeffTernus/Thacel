<?php
include "class/connect.php";
include "class/Signup.php";

$first_name = "";
$last_name = "";
$gender = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$signup = new Signup();
	$result = $signup->evaluate($_POST);

	if ($result != "") {
		echo "<h4 style='color: red;'>The Error occured</h4>";
		echo $result;
		echo "<br>";
	}
	$first_name = $_POST["first_name"];
	$last_name = $_POST["last_name"];
	$gender = $_POST["gender"];
	$email = $_POST["email"];
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
		<input value="<?php echo $first_name; ?>" name="first_name" type="text" id="text" placeholder="first name"><br><br>
		<input value="<?php echo $last_name; ?>" name="last_name" type="text" id="text" placeholder="Last name"><br><br>

		<span style="font-weight: bold;">Gender:</span><br>
		<select id="text" name="gender">
			<option><?php echo $gender; ?></option>
			<option>Male</option>
			<option>Female</option>
		</select>
		<br><br>
		<input type="<?php echo $email; ?>" name="email" type="text" id="text" placeholder="Email"><br><br>

		<input name="password" type="password" id="text" placeholder="Password"><br><br>
		<input name="password2" type="password" id="text" placeholder="Retype Password"><br><br>

		<input type="submit" id="button" value="sign up">
	</form>    
</body>
</html>
