<?php
session_start();

if (isset($_SESSION["thacel_userid"])) {
	$_SESSION["thacel_userid"] = null;
	unset($_SESSION["thacel_userid"]);
}

header("Location: login.php");
die();
