<?php
	session_start();
//print_r($_SESSION);
	include("class/connect.php");
	include("class/Login.php");
	include("class/User.php");

	if(isset($_SESSION['thacel_userid']) && is_numeric($_SESSION['thacel_userid'])) {
		$id = $_SESSION['thacel_userid'];
		$login = new Login();

		$result = $login->check_login($id);
		
		if ($result) {
			$user = new User();
			$user_data = $user->get_data($id);

			if(!$user_data) {
				header("Location: login.php");
				die;
			}
		} else {
			header("Location: login.php");
			die;
		}
	} else {
		header("Location: login.php");
		die;
	}
?>

	<h1><?php echo $user_data['first_name'] . " " . $user_data['last_name']?>'s profile</h1>
<a href="logout.php">logout</a>
