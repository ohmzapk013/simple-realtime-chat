<?php 
if (!defined("SYSTEM_PATH"))
	die("Bad request");

function requestedWithAjax(){
	return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
		strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

function getPostVal($key){
	return $_POST[$key] ?? false;
}

function getGetVal($key){
	return $_GET[$key] ?? false;
}

function isSubmit($key){
	$requested = getPostVal('request-name');
	return $requested && $requested === $key;
}

function redirect($url, $delay = 0){
	sleep($delay);
	header("Location: $url");
	die();
}

function softRedirect($url, $delay = 0){
	$delay *= 1000;
	echo 
	"<script>
		setTimeout(() => {
			window.location.href = '{$url}'
		}, $delay );
	</script>";
	die();
}