<?php
session_start();
/*
 * jika session sudah ada
 * direct ke halaman home
 */
if(isset($_SESSION['userid'])) {
header("Location: index.php");
exit();
}

include_once "konek/config.php";
$error = false;

$nama=$username=$email=$password="";
$nama1=$nama2=$nama3=$username1=$username2=$username3=$username4=$email1=$email2=$email3=$password1=$password2="";

if (isset($_POST['submit'])) {

$nama       = strtolower($_POST['nama']);
$namafix    = ucwords($nama);
$username   = strtolower($_POST['username']);
$email      = $_POST['email'];
$password   = $_POST['password'];
$options    = ['cost' => 5];
$hash       = password_hash($password, PASSWORD_DEFAULT, $options);

/*
 * cek validasi nama
 */
if (empty($nama)) {
    $error = true;
    $nama1 = "Nama tidak boleh kosong<br/>";
} elseif (strlen($nama)<3) {
    $error = true;
    $nama2 = "Nama tidak boleh kurang dari tiga karakter<br/>";
} elseif (!preg_match("/^[a-zA-Z ]+$/",$nama)) {
    $error = true;
    $nama3 = "Nama tidak boleh mengandung simbol khusus<br/>";
}

/*
 * cek duplikat username
 * cek validasi username
 */
$cekusername        = "SELECT username FROM user WHERE username='$username'";
$hasilcekusername   = mysql_num_rows(mysql_query($cekusername));
if ($hasilcekusername!=0) {
    $error      = true;
    $username1  = "Username telah digunakan<br/>";
} elseif (empty($username)) {
    $error = true;
    $username2 = "Username tidak boleh kosong<br/>";
} elseif (strlen($username)<6) {
    $error = true;
    $username3 = "Username tidak boleh kurang dari lima karakter<br/>";
} elseif (!preg_match("/^[a-zA-Z0-9]+$/",$username)) {
    $error = true;
    $username4 = "Username hanya huruf dan angka<br/>";
}

/*
 * cek duplikat email
 * cek validasi email
 */
$cekemail       = "SELECT email FROM user WHERE email='$email'";
$hasilcekemail  = mysql_num_rows(mysql_query($cekemail));
if ($hasilcekemail!=0) {
    $error      = true;
    $email1 = "Email telah digunakan<br/>";
} elseif (empty($email)) {
    $error = true;
    $email2 = "Email tidak boleh kosong<br/>";
} elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    $error = true;
    $email3 = "Alamat email tidak valid<br/>";
}

/*
 * cek validasi password
 */
if (empty($password)) {
    $error = true;
    $password1 = "Password tidak boleh kosong<br/>";
} elseif (strlen($password)<6) {
    $error = true;
    $password2 = "Password tidak boleh kurang dari enam karakter<br/>";
}

/*
 * jika tidak ada error
 * insert data ke database
 */
if(!$error) {
mysql_query("INSERT INTO user(userid, email, password, username, name, avatar, cover, regdate, lastlog, bio, gender, born, address, verified, active, banned) VALUES('','$email','$hash','$username','$namafix','0','0','$timeuser','$timeuser','0','0','0000-00-00','0','0','0','0')");

/*
 * kirim email verifikasi
 */
$hashmail   = base64_encode($hash);
$kepada     = "$email";
$subject    = "Verifikasi Akun Cicacode";
$year       = date("Y");
$message    = "
<html>
<head>
<title>Verifikasi Akun Cicacode</title>

</head>
<body style=\"margin: 0px; font-family: proxima nova;\">
<div style=\"padding-top: 20px; padding-bottom: 20px; padding-left: 20px; padding-right: 20px; border-bottom: 6px solid #47abc8; background: #e9ebee; font-weight: bold; font-size: 18px;\">
    Cicacode Indonesia
</div>
<div style=\"padding: 20px;\">
<p>
    Hallo, $namafix.<br>
</p>
<p> Selangkah lagi kamu akan terdaftar di Cicacode Indonesia.<br>
    Klik konfirmasi untuk mengaktifkan akunmu.
</p>
<br/>

<a href=\"https://www.cicacode.com/active.php?email=$email&hash=$hashmail\">
<div style=\"padding: 15px; color: #ffffff; background: linear-gradient(to right, rgba(95,186,125,0.9) 0,rgba(16,138,236,0.9) 100%); text-align: center;\">
Konfirmasi
</div>
</a>

<br/><br/>
<ul>
    <li><i><small>Jika Anda merasa tidak pernah mengirim permintaan kepada Cicacode Indonesia abaikan pesan ini.</small></i></li>
    <li><i><small>Untuk berhenti berlangganan email dari kami dapat menghubungi <b>unsubscribe@cicacode.com</b></small></i></li>
</ul>

</div>
<br/>

<div style=\"padding-top: 20px; padding-bottom: 20px; text-align: center; background: #e9ebee;\">
&copy;$year Cicacode Indonesia.
</div>
</body>
</html>
";

/*
 * untuk mengirim email
 * konten-type harus di set 
 */
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-type: text/html; charset=iso-8859-1";
$headers[] = "To: $nama <$email>";
$headers[] = "From: Verifikasi Akun Cicacode <admin@cicacode.com>";
$headers[] = "Cc: info@cicacode.com";
$headers[] = "Bcc: help@cicacode.com";

/*
 * kirim email ke registan
 * fungsi kirim email
 */
mail($kepada, $subject, $message, implode("\r\n", $headers));

header('location:login.php');
exit();
}
}
?>

<h1>Mendaftar</h1>

<?php
echo "
$nama1
$nama2
$nama3
$username1
$username2
$username3
$username4
$email1
$email2
$email3
$password1
$password2
";
?>

<form method="post">
<p>
    Nama Lengkap<br>
    <input type="text" name="nama" autocomplete="off" value="<?php echo $nama; ?>">
</p>
<p>
    Username<br>
    <input type="text" name="username" autocomplete="off" value="<?php echo $username; ?>">
</p>
<p>
    Email<br>
    <input type="email" name="email" autocomplete="off" value="<?php echo $email; ?>">
</p>
<p>
    Password<br>
    <input type="password" name="password" autocomplete="off" value="<?php echo $password; ?>">
</p>
<p>
    <input type="submit" name="submit" value="Daftar">
</p>
</form>