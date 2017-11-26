<?php 
if (!requestedWithAjax())
	die("Bad request!");

if (empty($_FILES['file']))
	die('{"success": "0"}');

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
		"img" => $fileName
	];
}

function saveFile($fileInfo){
	$ext = pathinfo($fileInfo['name'], PATHINFO_EXTENSION);
	$fileName = md5(md5(sha1(md5(sha1($fileInfo['name']))))) . ".$ext";
	$img = resize_image($fileInfo["tmp_name"], $ext);
	saveImage($img, "./upload/img/$fileName");
	// move_uploaded_file($fileInfo["tmp_name"], "./upload/img/$fileName");
	return $fileName;
}