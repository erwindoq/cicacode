<?php
session_start();

/*
 * jika session sudah ada
 * direct ke halaman home
 */
if(isset($_SESSION['userid'])) {
header("Location: http://localhost/cicacode/");
exit;
}

include_once "konek/config.php";
include_once "konek/browser.php";

$_SESSION['auth'] = 0;

$emailusernamepost=$nokonfirmasi=$youbanned=$blankdata="";

if (isset($_POST['submit'])) {
$emailusername 	= $_POST['emailusername'];
$passwordlogin 	= $_POST['password'];
$hasil = mysql_query("SELECT userid, email, password, username, name, avatar, cover, regdate, lastlog, bio, gender, verified, active, banned FROM user where email='$emailusername' or username='$emailusername'");
list($userid, $email, $password, $username, $name, $avatar, $cover, $regdate, $lastlog, $bio, $gender, $verified, $active, $banned) = mysql_fetch_array($hasil);

if(isset($_SESSION['auth'])) {
    if ($_SESSION['auth']>=2)
        {echo "anda telah di blokir untuk login";}
    else
        {$_SESSION['auth']=$_SESSION['auth']+1;}
}


/*
 * cek validasi password
 * cek email konfirmasi
 */
if (mysql_num_rows($hasil) > 0) {
	if ($banned == '0') {
		if ($active == '1') {
			if (password_verify($passwordlogin, $password)) {
				session_start();
				$_SESSION['userid'] = $userid;
				mysql_query("UPDATE user SET lastlog='$timeuser' where user.userid='$_SESSION[userid]'");
				mysql_query("INSERT into activitys(activityid, userid, activity, created, deletes) VALUES('','$_SESSION[userid]','Anda login dari browser $browser di $operation_system dengan alamat IP: $_SERVER[REMOTE_ADDR] pada $timeuser','$timeuser','0')");
				header('location:http://localhost/cicacode/');
			} else {$emailusernamepost = "Username atau password salah<br/>";
            $_SESSION['auth']=1;}
		} else {$nokonfirmasi = "Konfirmasi email Anda untuk dapat login<br/>";}
	} else {$youbanned = "Maaf, akun Anda telah dinonaktifkan.<br/>";}
} else {$blankdata = "Akun tidak ditemukan dalam database kami, <b>Mendaftar?<b/><br/>";}

}
?>

<h1>Masuk</h1>

<?php
echo $_SESSION['auth'];
echo $emailusernamepost,$nokonfirmasi,$youbanned,$blankdata;
?>

<form method="post">
<p>
    Email / Username<br>
    <input type="text" name="emailusername" autocomplete="off" autofocus="autofocus">
</p>
<p>
    Password<br>
    <input type="password" name="password" autocomplete="off">
</p>
<p>
    <input type="submit" name="submit" value="Masuk">
</p>
</form>