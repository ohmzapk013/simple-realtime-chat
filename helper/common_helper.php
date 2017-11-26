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

define("IMG_SIZE_MAX", 1000);

function resize_image($file, $ext, $w = IMG_SIZE_MAX, $h = IMG_SIZE_MAX, $crop = false) {
	list($width, $height) = getimagesize($file);
	$w = ($w > $width) ? $width: IMG_SIZE_MAX;
	$h = ($h > $height) ? $height: IMG_SIZE_MAX;
	$r = $width / $height;
	if ($crop) {
		if ($width > $height) {
			$width = ceil($width-($width*abs($r-$w/$h)));
		} else {
			$height = ceil($height-($height*abs($r-$w/$h)));
		}
		$newWidth = $w;
		$newHeight = $h;
	} else {
		if ($w/$h > $r) {
			$newWidth = $h*$r;
			$newHeight = $h;
		} else {
			$newHeight = $w/$r;
			$newWidth = $w;
		}
	}
	$src = ($ext === "jpg") ? imagecreatefromjpeg($file) : imagecreatefrompng($file);
	$dst = imagecreatetruecolor($newWidth, $newHeight);
	imagecopyresampled($dst, $src, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

	return $dst;
}

function saveImage($img, $path){
	imagejpeg($img, $path);
}