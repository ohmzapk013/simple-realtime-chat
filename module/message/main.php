<?php
if (requestedWithAjax()){
	$received = getPostVal('content');
	require_once MODULE_PATH . 'message/MessageWithPusher.php';
	$msgPusher = new MessageWithPusher("public-room", "new-message");
	if ($msgPusher->sendMessageToClient(json_decode($received, true))){
		die('{"success": 1}');
	}
}