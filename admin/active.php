<?php
include_once "../konek/config.php";

$email 		= $_GET['email'];
$hash		= $_GET['hash'];

$password 	= base64_decode($hash);

if (isset($email)) {
	$query 	= "SELECT adminid from admin where email='$email' and password='$password'";
	$find	= mysql_query($query);
	if ($find && mysql_num_rows($find) >0) {
		$update = "UPDATE admin SET active='1' where admin.email='$email' and password='$password'";
		$set 	= mysql_query($update);
		if ($set) {
			echo "Akun anda telah aktif.<br><br>";
		}
	} else {
		echo "Terjadi Kesalahan.";
	}
}
?>