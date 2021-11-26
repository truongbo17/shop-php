<?php
session_start();

require_once './database/dbhelper.php';
require_once './utils/utility.php';

$user = getUserToken();
if ($user != null) {
	$token = getCookie('token');
	// $id = $user['id'];
	// $sql = "DELETE FROM token WHERE user_id = '$id' AND token = '$token'";
	// execute($sql);
	setcookie('token', '', time() - 100, '/');
}
unset($_SESSION['user']);
header('Location: index.php');
