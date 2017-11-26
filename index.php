<?php 
require_once 'constant.php';
$m = $_GET['m'] ?? "common";
$a = $_GET['a'] ?? "register";

$path = MODULE_PATH . "$m/$a.php";
if (file_exists($path)){
	require_once HELPER_PATH . 'common_helper.php';
	require_once HELPER_PATH . 'session_helper.php';
	require_once HELPER_PATH . 'status_helper.php';
	require 'vendor/autoload.php';
	require_once $path;
}
?>
