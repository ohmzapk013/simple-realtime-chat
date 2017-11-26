<?php
if (!defined("SYSTEM_PATH"))
	die("Bad request");

function hasRegister(){
	return !empty(getSession("token"));
}

function register($name, $avt){
	setSession("token", ['name' => $name, 'avt' => $avt]);
}

function getCurrentName(){
	return getSession("token")['name'];
}

function getAvtName(){
	return getSession("token")['avt'];	
}

function sendMessageToClient($data = []){
	require_once MODULE_PATH . 'message/MessageWithPusher.php';
	$msgPusher = new MessageWithPusher("public-room", "new-message");
	if ($msgPusher->triggerMessagePusher($data)){
		die('{"success": 1}');
	}
	die('{"success": ' . $msgPusher->triggerMessagePusher($data) . '}');
}