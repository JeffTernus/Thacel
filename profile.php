<?php
session_start();
//print_r($_SESSION);
include "class/connect.php";
include "class/Login.php";
include "class/User.php";
include "class/Post.php";

//isset($_SESSION["thacel_userid"]);
$login = new Login();
$user_data = $login->check_login($_SESSION['thacel_userid']);
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

// collect posts
$post = new Post();
$id = $_SESSION["thacel_userid"];
$posts = $post->get_posts($id);

// collect friends
$user = new User();
$id = $_SESSION['thacel_userid'];

$friends = $user->get_friends($id);
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
<div style="min-height: 100px; flex:1;">
	<?php
		if($friends) {
			foreach($friends as $FRIEND_ROW) {
				include("user.php");
			}
		}
	?>
</div>
