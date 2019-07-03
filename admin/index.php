<?php
session_start();

/*
 * jika session tidak ada
 * direct ke halaman login
 */
if(!isset($_SESSION['adminid'])) {
header("Location: http://localhost/cicacode/admin/login");
exit();
}

include_once "../konek/config.php";
include_once "../konek/function.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title>Backend - Cicacode</title>
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="cache-control" content="no-store">
</head>
<body>
<?php
$hasil = mysql_query("SELECT adminid, email, password, username, name, avatar, cover, regdate, lastlog, verified, active, banned FROM admin where adminid='11'");
list($adminid, $email, $password, $username, $name, $avatar, $cover, $regdate, $lastlog, $verified, $active, $banned) = mysql_fetch_array($hasil);

echo "$name<br><a href=\"logout\">logout</a>";
?>
</body>
</html>