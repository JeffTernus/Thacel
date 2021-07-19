<?php
	session_start();
//print_r($_SESSION);
	include("class/connect.php");
	include("class/Login.php");

	if(isset($_SESSION['thacel_userid']) && is_numeric($_SESSION['thacel_userid'])) {
		$id = $_SESSION['thacel_userid'];
		$login = new Login();

		$result = $login->check_login($id);

		if ($result) {
			// retrieve user data
			echo "everything is fine";
		} else {
			header("Location: login.php");
			die;
		}
	} else {
		header("Location: login.php");
		die;
	}
?>

<h1>profilepage</h1>
