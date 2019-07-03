<?php
session_start();
include_once "konek/config.php";
include_once "konek/function.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cicacode Indonesia</title>
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="cache-control" content="no-store">
</head>
<body>
<?php
if (isset($_SESSION['userid'])) {

$rows 	= mysql_query("SELECT userid, name FROM user where userid='$_SESSION[userid]'");
list($userid, $name) = mysql_fetch_array($rows);
echo "
$name
<br>
<a href=\"logout\">logout</a>
<br>
<a href=\"posting\">posting</a>
";
}
?>
<div style="width: 700px; height: 300px; border: 1px solid #000"></div>
<div style="width: 200px; height: 140px; border: 1px solid #000"></div>
<div style="width: 100px; height: 60px; border: 1px solid #000"></div>

<hr>

<div style="width: 160px; height: 160px; border: 1px solid #000"></div>
<div style="width: 35px; height: 35px; border: 1px solid #000; border-radius: 100%;"></div>

</body>
</html>