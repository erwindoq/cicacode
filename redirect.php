<?php
include_once "konek/config.php";

$shorten = $_GET['shorten'];

if (isset($shorten)) {
	$query = mysql_query("SELECT link, shorten from article where shorten='$shorten'");
	list($link, $shotren) = mysql_fetch_array($query);
	header('location:../'.$link);
	exit();
} else {
	die();
}

?>