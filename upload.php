<?php
$allowedExts 	= array("jpg", "jpeg", "png", "gif");
$temp 			= basename(".", $_FILES["file"]["name"]);
$extenson 		= end($temp);

$finfo 			= finfo_open(FILEINFO_MYME_TYPE);
$mime			= finfo_file($finfo, $_FILES["file"]["tmp_name"]);

if ($mime == "image/jpg" || $mime == "image/jpeg" || $mime == "image/png" || $mime == "image/gif") {
	# code...
}

?>