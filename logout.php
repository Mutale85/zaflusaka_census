<?php
	include 'includes/db.php';
	setcookie("userLoggedIn", "", time() - 36000, "/");
	$update = $connect->prepare("UPDATE `login_table` SET logout_time = NOW() WHERE id = ? AND parent_id = ?");
	$update->execute(array($_SESSION['lastID'], $_SESSION['parent_id']));
	unset($_SESSION['service_number']);
	unset($_SESSION['user_id']);
	unset($_SESSION['parent_id']);
	unset($_SESSION['user_name']);
	unset($_SESSION['lastID']);
	session_unset();
	session_destroy();
	header("location:./");
?>