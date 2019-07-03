<?php
session_start();

include_once "konek/config.php";
include_once "konek/function.php";
include_once "funct/function.php";

$username = $_GET['username'];

if (empty($username)) {
	header('location: http://localhost/cicacode/login');
	exit();
}

if (isset($username)) {
	$sql = mysql_query("SELECT * from user where username='$username'");
	$data = mysql_fetch_array($sql);
	$userid		= $data['userid'];
	$email 		= $data['email'];
	$name 		= $data['name'];
	$avatar		= $data['avatar'];
	$cover		= $data['cover'];
	$regdate 	= waktu(strtotime($data['regdate']));
	$lastlog 	= $data['lastlog'];
	$bio 		= $data['bio'];
	$gender 	= $data['gender'];
	$born 		= $data['born'];
	$address 	= $data['address'];
	$verified 	= $data['verified'];
	$active 	= $data['active'];
	$banned 	= $data['banned'];

	if ($banned == '0') {
		if ($cover == '0') {
			$cover = "0_0000000000_00000000000000_n.jpg";
		}
		if ($avatar == '0') {
			$avatar = "0_0000000000_00000000000000_n.jpg";
		}
		if ($bio == '0') {
			$bio = "User satu ini masih malu malu nyeritain tentang dirinya";
		}
		if ($verified == '1') {
			$verified = "<img src=\"http://localhost/cicacode/imgas/verified.png\" width=\"14\">";
		} else {
			$verified = "";
		}
		if ($gender == '0') {
			$genderfix = "";
		} elseif ($gender == '1') {
			$genderfix = "[#] Jenis kelamin Laki laki";
		} elseif ($genderfix == '2') {
			$genderfix = "[#] Jenis kelamin Perempuan";
		}
		if ($born == '0000-00-00') {
			$bornfix = "";
		} else {$bornfix = "[#] Lahir pada $born";}
		if ($address == '0') {
			$addressfix = "";
		} else {$addressfix = "[#] Alamat $address";}
		echo "

	<img src=\"http://localhost/cicacode/imgcv/$cover\"><br>
	<center><img src=\"http://localhost/cicacode/imgpr/standart/$avatar\" width=\"150\"></center><br/>
	<center><b>$name $verified</b><br/>@$username
	<p>$bio</p></center>
	[#] Bergabung sejak $regdate<br/>
	$genderfix<br/>
	$bornfix<br/>
	$addressfix
	";
	}
} else {
	die();
}

?>

<hr>
<?php

$asdar = mysql_query("SELECT * FROM article INNER JOIN user ON user.userid = article.userid and user.username = '$username'");

while (
$article = mysql_fetch_array($asdar)
){
$pacreated = waktu(strtotime($article['created']));
$patitle   = $article['title'];
$paimage   = $article['image'];
$paarticle = $article['article'];
$palink    = $article['link'];
$pacategory= $article['categoryid'];

$cate = mysql_query("SELECT * from categorys INNER JOIN article ON article.categoryid = categorys.categoryid where categorys.categoryid='$pacategory'");
$liatcat = mysql_fetch_array($cate);

$categ = $liatcat['category'];
$categlink = $liatcat['categorylink'];

echo "

<p><img src=\"http://localhost/cicacode/imgar/thumbnail/$paimage\" style=\"float: left\"></p>
&nbsp; <a href=\"$palink\">$patitle</a><br/>
&nbsp; $pacreated<br/>
&nbsp; <a href=\"category/$categlink\">$categ</a>
<br><br><br>
";}

?>