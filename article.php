<?php
session_start();

include_once "konek/config.php";
include_once "konek/function.php";
include_once "funct/function.php";
$error = false;

$link = $_GET['link'];

if (isset($link)) {
	$queryar = mysql_query("SELECT * FROM article INNER JOIN user ON article.userid = user.userid where article.link='$link'");
    $dataar = mysql_fetch_array($queryar);

    $articleid  = $dataar['articleid'];
    $aruserid   = $dataar['userid'];
    $arcreated  = waktu(strtotime($dataar['created']));
    $armodified = $dataar['modified'];
    $artitle    = $dataar['title'];
    $arimage    = $dataar['image'];
    $ararticle  = $dataar['article'];
    $arkeyword  = $dataar['keyword'];
    $arpermission  = $dataar['permission'];
    $arshorten  = $dataar['shorten'];
    $arusername = $dataar['username'];
    $arname     = $dataar['name'];
    $aravatar   = $dataar['avatar'];
    $arbio      = $dataar['bio'];

    if ($aravatar == '0') {
    $aravatar = "0_0000000000_00000000000000_n.jpg";
    }

    $querycat = mysql_query("SELECT * FROM article INNER JOIN categorys ON article.categoryid = categorys.categoryid where article.articleid='$articleid'");
    $datacat  = mysql_fetch_array($querycat);

    $catcategory    = $datacat['category'];
    $catlink        = $datacat['categorylink'];
    $website        = base_url("");

echo "
<title>$artitle - Cicacode</title>

<a href=\"$website\">Home</a> > <a href=\"category/$catlink\">$catcategory</a> > $artitle<hr/>
<h1>$artitle</h1>
<img src=\"http://localhost/cicacode/imgpr/thumbnail/$aravatar\" alt=\"$arname\"> <a href=\"$arusername\">$arname</a>
<li>$arcreated · URL: https://www.cicacode.com/r/$arshorten</li>

<hr>
<img src=\"http://localhost/cicacode/imgar/large/$arimage\" alt=\"$artitle\">
<hr>
$ararticle
<hr>
";
}

$row = mysql_query("SELECT * FROM comments where articleid='$articleid'")or die(mysql_error());
$bkt = mysql_num_rows($row);
if ($bkt == '0') {
	$kom = "Belum ada komentar";
} else {
	$kom = "$bkt Komentar<br/>";
}
	echo "$kom";

if ($bkt>0) {
	$comments = mysql_query("SELECT * FROM comments INNER JOIN user ON comments.userid = user.userid where articleid='$articleid'")or die(mysql_error());
    while(
    $data 	= mysql_fetch_array($comments))
    {
    $cid		= $data['commentid'];
    $ccomment 	= sensor($data['comment']);
    $cname 		= $data['name'];
    $cusername	= $data['username'];
    $cavatar 	= $data['avatar'];
    $ccreated 	= $data['created'];
    $cverified 	= $data['verified'];
    if ($cavatar == '0') {
    	$cavatar = "0_0000000000_00000000000000_n.jpg";
    }
    if ($cverified == '0') {
    	$cverified = "";
    } else {
    	$cverified = "&bull;";
    }
    echo "<br/><img src=\"http://localhost/cicacode/imgpr/thumbnail/$cavatar\" alt=\"$cname\">
    <b><a href=\"$cusername\">$cname $cverified</a></b> $ccomment <li>";

if ($arpermission == '0') {
	if (!empty($_SESSION['userid'])) {
		echo"<a href=\"replied/$cid\">balas</a> · ".waktu(strtotime($ccreated)); echo"<br/><br/>";
	} else {echo "".waktu(strtotime($ccreated)); echo "<br>";}
} else {echo "".waktu(strtotime($ccreated)); echo "<br/><br/>";}


    $reply = mysql_query("SELECT * FROM replys INNER JOIN user ON replys.userid = user.userid where commentid='$cid'");
    while($rep = mysql_fetch_array($reply)
    ) { 
    	$ravatar 	= $rep['avatar'];
    	$rname 		= $rep['name'];
    	$rusername 	= $rep['username'];
    	$rreply		= sensor($rep['reply']);
    	$rcreated	= $rep['created'];
    	$rverified	= $rep['verified'];
    	if ($ravatar == '0') {
    	$ravatar = "0_0000000000_00000000000000_n.jpg";
    	}
	    if ($rverified == '0') {
    		$rverified = "";
    	} else {
    		$rverified = "&bull;";
    	}

    	echo "<li>
    	<img src=\"http://localhost/cicacode/imgpr/thumbnail/$ravatar\" alt=\"$rname\">
    	<b><a href=\"$rusername\">$rname $rverified</a></b> $rreply · <li>".waktu(strtotime($rcreated)); echo "</li></li>";
		}


}
}

if (isset($_POST['submit'])) {
	$comment = $_POST['comment'];
	if (empty($comment)) {
		$error = true;
		echo "<br/>Komentar tidak boleh kosong";
	}
	if (!$error) {
		mysql_query("INSERT into comments(commentid, articleid, created, comment, userid, deletes) VALUES('','$articleid','$timeuser','$comment','$_SESSION[userid]','0')");
		mysql_query("INSERT into activitys(activityid, userid, activity, created, deletes) VALUES('','$_SESSION[userid]','Anda mengomentari article $artitle. &quot;$comment&quot; pada $timeuser','$timeuser','0')");
		echo "<br/>Komentar anda telah di tambahkan<br/>";
        if ($_SESSION['userid'] == $aruserid) {
        } else {
            $getdatanotif = mysql_fetch_array(mysql_query("SELECT name from user where userid='$_SESSION[userid]'"));
            $getnamenotif = $getdatanotif['name'];
            mysql_query("INSERT into notifycations(notifycationid, userid, notifycation, notifylink, created, deletes) VALUES('','$aruserid','$getnamenotif mengomentari artikel anda &quot;$artitle&quot;', '$arshorten','$timeuser','0')");
        }
	}
}

if ($arpermission=='0') {
	if (!empty($_SESSION['userid'])) {
		echo komentar();
	} else {
        $loginx = base_url("login");
        echo "<br/><br/>Anda harus <a href=\"$loginx\">login</a> untuk berkomentar<br/>";
    }
} else {echo "<br/>komentar telah dinonaktifkan author";}

?>