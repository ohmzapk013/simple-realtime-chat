<?php
if (!requestedWithAjax())
	die("Bad request!");

$received = getPostVal('content');
$arrayData = json_decode($received, true);
sendMessageToClient($arrayData);