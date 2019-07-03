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
$error = false;
$badword=$clearword="";

if (isset($_POST['submit'])) {
	$badword = trim($_POST['badword']);
	$clearword = trim($_POST['clearword']);
	if (empty($badword)) {
		$error = true;
		echo "Badword tidak boleh kosong";
	} elseif (empty($clearword)) {
		$error = true;
		echo "Clear word tidak boleh kosong";
	} elseif (str_word_count($badword)>1) {
		$error = true;
		echo "Badword hanya mengandung satu kata";
	} elseif (strlen($badword)<3) {
		$error = true;
		echo "Badword minimal mengandung tiga huruf";
	} elseif (strlen($clearword)<3) {
		$error = true;
		echo "Clear word minimal mengandung tiga huruf";
	} elseif (!preg_match("/^[a-zA-Z ]+$/",$badword)) {
		$error = true;
		echo "Badword tidak boleh mengandung simbol";
	} elseif (!preg_match("/^[a-zA-Z* ]+$/",$clearword)) {
		$error = true;
		echo "Clear word hanya mengandung angka dan *";
	}

	if (!$error) {
		mysql_query("INSERT into badwords(badwordid, badword, clearword) VALUES('','$badword', '$clearword')");
		echo "Badword berhasil di tambahkan";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Badword</title>
</head>
<body>
	<form method="post">
		Badword<br/>
		<input type="text" name="badword" value="<?php echo $badword ?>"><br/>
		Clear word<br/>
		<input type="text" name="clearword" value="<?php echo $clearword ?>"><br/>
		<input type="submit" name="submit">
	</form>
</body>
</html>