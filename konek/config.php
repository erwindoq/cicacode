<?php
date_default_timezone_set("Asia/jakarta");
$timeuser = date("Y-m-d H:i:s");

$hostname = mysql_connect("localhost","root","")or die();
$database = mysql_select_db("cicacode")or die();
?>