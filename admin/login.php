<?php
session_start();

/*
 * jika session sudah ada
 * direct ke halaman home
 */
if(isset($_SESSION['adminid'])) {
header("Location: http://localhost/cicacode/");
exit;
}

include_once "../konek/config.php";

$emailusernamepost=$nokonfirmasi=$youbanned=$blankdata="";

if (isset($_POST['submit'])) {
$emailusername 	= $_POST['emailusername'];
$passwordlogin 	= $_POST['password'];
$hasil = mysql_query("SELECT adminid, email, password, username, name, avatar, cover, regdate, lastlog, verified, active, banned FROM admin where email='$emailusername' or username='$emailusername'");
list($adminid, $email, $password, $username, $name, $avatar, $cover, $regdate, $lastlog, $verified, $active, $banned) = mysql_fetch_array($hasil);

/*
 * cek validasi password
 * cek email konfirmasi
 */
if (mysql_num_rows($hasil) > 0) {
	if ($banned == '0') {
		if ($active == '1') {
			if (password_verify($passwordlogin, $password)) {
				session_start();
				$_SESSION['adminid'] = $adminid;
				mysql_query("UPDATE admin SET lastlog='$timeuser' where admin.adminid='$_SESSION[adminid]'");
				header('location:http://localhost/cicacode/admin');
			} else { $emailusernamepost = "Username atau password salah<br/>"; }
		} else { $nokonfirmasi = "Konfirmasi email Anda untuk dapat login<br/>"; }
	} else {$youbanned = "Maaf akun Anda telah di Banned, jika ada pertanyaan hubungi admin@cicacode.com<br/>";}
} else {$blankdata = "Username atau password salah<br/>";}

}
?>

<h1>Masuk</h1>

<?php
echo"
$emailusernamepost
$nokonfirmasi
$youbanned
$blankdata
";
?>

<form method="post">
<p>
    Email / Username<br>
    <input type="text" name="emailusername" autocomplete="off">
</p>
<p>
    Password<br>
    <input type="password" name="password" autocomplete="off">
</p>
<p>
    <input type="submit" name="submit" value="Masuk">
</p>
</form>