<?php

if (!defined("SYSTEM_PATH"))
	die("Bad request");

session_start();

function setSession($key, $value){
	$_SESSION[$key] = $value;
}

function getSession($key){
	return $_SESSION[$key] ?? false;
}

function removeSession($key){
	unset($_SESSION[$key]);
}