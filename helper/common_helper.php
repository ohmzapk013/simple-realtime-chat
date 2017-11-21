<?php 

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