<?php
session_start();
//print_r($_SESSION);
include "class/connect.php";
include "class/Login.php";
include "class/User.php";
include "class/Post.php";

if (
	isset($_SESSION["thacel_userid"]) &&
	is_numeric($_SESSION["thacel_userid"])
) {
	$id = $_SESSION["thacel_userid"];
	$login = new Login();

	$result = $login->check_login($id);

	if ($result) {
		$user = new User();
		$user_data = $user->get_data($id);

		if (!$user_data) {
			header("Location: login.php");
			die();
		}
	} else {
		header("Location: login.php");
		die();
	}
} else {
	header("Location: login.php");
	die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$post = new Post();
	$id = $_SESSION["thacel_userid"];
	$result = $post->create_post($id, $_POST);

	if ($result == "") {
		header("Location: profile.php");
		die();
	} else {
		echo "<h4 style='color: red;'>The Error occured</h4>";
		echo $result;
		echo "<br>";
	}
}

$post = new Post();
$id = $_SESSION["thacel_userid"];
$posts = $post->get_posts($id);
?>

	<h1><?php echo $user_data["first_name"] .
 	" " .
 	$user_data["last_name"]; ?>'s profile</h1>
	<a href="logout.php">logout</a>
	<br>
	<br>
<form method="POST">
	<textarea name="post" placeholder="Write something"></textarea>
	<input type="submit" value="Post">
</form>
<br>
<br>
<div>
<?php 
	if($posts) {
		foreach($posts as $ROW) {
			$user = new User();
			$ROW_USER = $user->get_user($ROW['userid']);
			include("post.php");
		}
	}
 ?>
</div>
