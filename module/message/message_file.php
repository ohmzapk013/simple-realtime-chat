<?php 
if (!requestedWithAjax())
	die("Bad request!");

if (empty($_FILES['file']))
	die('{"success": 0}');

if ($_FILES['file']['size'] > 5*1024*1024)
	die('{"success": 0, "message": "Size too large, 5MB allow"}');

$fileName = saveFile($_FILES['file']);
$data = wrapMessageData($fileName);
sendMessageToClient($data);


/**
 * Function helper
 */
function wrapMessageData($fileName){
	$sender = getPostVal('sender');
	$sendTime = getPostVal('sendTime');
	$avt = getPostVal('avt');
	return [
		"sender" => $sender,
		"sendTime" => $sendTime,
		"avt" => $avt,
		"file" => 1,
		"message" => $fileName
	];
}

function saveFile($fileInfo){
	$fileName = $fileInfo['name'];
	move_uploaded_file($fileInfo["tmp_name"], "./upload/$fileName");
	return $fileName;
}