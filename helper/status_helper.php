<?php
if (!defined("SYSTEM_PATH"))
	die("Bad request");

function hasRegister(){
	return !empty(getSession("token"));
}

function register($name){
	setSession("token", $name);
}

function getCurrentName(){
	return getSession("token");
}