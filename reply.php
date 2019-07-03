<?php
session_start();

include_once "konek/config.php";
include_once "konek/function.php";
include_once "funct/function.php";
$error = false;

if (empty($_SESSION['userid'])) {
	header("Location: http://localhost/cicacode/login/");
	exit;
}

$commentid 	= $_GET['commentid'];

$see = mysql_query("SELECT * from comments INNER JOIN user where comments.userid = user.userid AND comments.commentid='$commentid'");
$data = mysql_fetch_array($see);

$comavatar 		= $data['avatar'];
$comname  		= $data['name'];
$comverified  	= $data['verified'];
$comusername 	= $data['username'];
$comcomment  	= sensor($data['comment']);
$comarticleid  	= $data['articleid'];
$comuserid  	= $data['userid'];

$getdata   = mysql_fetch_array(mysql_query("SELECT link,shorten from article where articleid ='$comarticleid'"));
$getlinkar = $getdata['link'];
$getshortenkar = $getdata['shorten'];

$comcreated 	= waktu(strtotime($data['created']));

	if ($comavatar == '0') {
		$comavatar = "0_0000000000_00000000000000_n.jpg";
	}
	if ($comverified == '0') {
		$comverified = "";
	} else {
		$comverified = "&bull;";
	}


echo "
<a href=\"../$getlinkar\"> back </a><br/><br/>
<img src=\"http://localhost/cicacode/imgpr/thumbnail/$comavatar\" alt=\"$comname\"> <b><a href=\"../$comusername\">$comname $comverified</a></b> $comcomment <li>$comcreated</li><br/>";

$sees = mysql_query("SELECT * FROM replys INNER JOIN user where replys.userid = user.userid AND commentid='$commentid'");
while(
	$data 	= mysql_fetch_array($sees))
{
    $reavatar 	= $data['avatar'];
    $rename 	= $data['name'];
    $reverified = $data['verified'];
    $reusername = $data['username'];
    $rereply 	= $data['reply'];
    $recreated 	= waktu(strtotime($data['created']));

	if ($reavatar == '0') {
		$reavatar = "0_0000000000_00000000000000_n.jpg";
	}
	if ($reverified == '0') {
		$reverified = "";
	} else {
		$reverified = "&bull;";
	}

	echo "<li><img src=\"http://localhost/cicacode/imgpr/thumbnail/$reavatar\" alt=\"$rename\"> <b><a href=\"../$reusername\">$rename $reverified</a></b> $rereply <li>$recreated</li></li>";

}

if (isset($_POST['submit'])) {
	$reply = $_POST['reply'];
	if (empty($reply)) {
		$error = true;
		echo "<br>Komentar tidak boleh kosong";
	}
	if (!$error) {
		mysql_query("INSERT into replys(replyid, commentid, created, reply, userid, deletes) VALUES('','$commentid','$timeuser','$reply','$_SESSION[userid]','0')");
		mysql_query("INSERT into activitys(activityid, userid, activity, created, deletes) VALUES('','$_SESSION[userid]','Anda membalas komentar $comname. &quot;$reply&quot; pada $timeuser','$timeuser','0')");
		echo "<br/>Komentar anda telah ditambahkan";
		if ($_SESSION['userid'] == $comuserid) {
		} else {
			$getdatanotif = mysql_fetch_array(mysql_query("SELECT name from user where userid='$_SESSION[userid]'"));
			$getnamenotif = $getdatanotif['name'];
			mysql_query("INSERT into notifycations(notifycationid, userid, notifycation, notifylink, created, deletes) VALUES('','$comuserid','$getnamenotif membalas komentar anda &quot;$comcomment&quot;', '$getshortenkar','$timeuser','0')");
		}
	}
}

?>

<?php
if (empty($_SESSION['userid'])) {
	echo "Anda harus login untuk membalas komentar ini";
} else {

echo "
<br/><br/>
<form action=\"\" method=\"post\">
<input type=\"text\" name=\"reply\">
<input type=\"submit\" name=\"submit\" value=\"Kirim\">
</form>
";
}