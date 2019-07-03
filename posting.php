<?php
session_start();

/*
 * jika session sudah ada
 * direct ke halaman home
 */
if(!isset($_SESSION['userid'])) {
header("Location: login");
exit;
}

include_once "konek/config.php";
include_once "konek/function.php";
$error = false;

$title=$link=$categoryid=$article=$keyword=$permission="";

$sessionid = $_SESSION['userid'];

$rows 	= mysql_query("SELECT userid, name, avatar FROM user where userid='$_SESSION[userid]'");
list($userid, $name, $avatar) = mysql_fetch_array($rows);

if (isset($_POST['submit'])) {
	$title 		= ucwords($_POST['title']);
	$link 		= $_POST['link'];
	$categoryid = $_POST['categoryid'];
	$article 	= $_POST['article'];
	$keyword 	= $_POST['keyword'];
	$permission = $_POST['permission'];
	$shorten	= shorten($link);

	$direktory	= "imgar/original/";
	$imagefile 	= basename($_FILES["image"]["name"]);
	$imgformat	= pathinfo($imagefile, PATHINFO_EXTENSION);
	$formats	= array("jpg", "jpeg", "png", "gif");
	
	$ceklink		= "SELECT title FROM article WHERE link='$link'";
	$hasilceklink	= mysql_num_rows(mysql_query($ceklink));

	if (empty($title)) {
		$error = true;
		echo "judul tidak boleh kosong<br/>";
	} elseif ($hasilceklink!=0) {
		$error = true;
		echo "Judul sudah digunakan<br/>";
	} elseif (str_word_count($title)<2) {
		$error = true;
		echo "Judul harus memuat lebih dari 2 kata<br/>";
	}

	if (empty($_FILES["image"]["name"])) {
		$error = true;
		echo "Gambar tidak boleh kosong<br/>";
	} elseif ($_FILES["image"]["size"]>=1000000) {
		$error = true;
    	echo "Ukuran gambar terlalu besar<br/>";
	} elseif ($imgformat !="jpg" && $imgformat !="jpeg" && $imgformat !="png" && $imgformat !="gif") {
		$error = true;
		echo "Maaf ekstensi file tidak diperbolehkan<br/>";
	}

	if (empty($article)) {
		$error = true;
		echo "Article tidak boleh kosong<br/>";
	} elseif (strlen($article)<10) {
		$error = true;
		echo "Isi artikel harus memuat lebih dari 200 huruf<br/>";
	}

	if (empty($keyword)) {
		$error = true;
		echo "Keyword tidak boleh kosong";
	} elseif (!preg_match("/^[a-zA-Z0-9, ]+$/",$keyword)) {
		$error = true;
		echo "Keyword hanya memperbolehkan huruf, angka , dan koma<br/>";
	}

	if (!$error) {
		list($txt, $extensi) = explode(".", $imagefile);
		if (in_array($extensi ,$formats)) {
			$articleid  = mysql_num_rows(mysql_query("SELECT articleid FROM article"));
			$date    	= strtotime(date($timeuser));
			$tanggal 	= date('YmdHis');

			$new 		= "".$articleid."_".$date."_".$tanggal."_n.".$extensi;
			$upload 	= $direktory.$new;

			if (move_uploaded_file($_FILES['image']['tmp_name'], $upload)) {
				mysql_query("INSERT into article(articleid, categoryid, userid, created, modified, title, image, article, keyword, permission, deletes, link, shorten) VALUES('','$categoryid','$userid','$timeuser','$timeuser','$title','$new','$article','$keyword','$permission','0','$link','$shorten')");
				mysql_query("INSERT into activitys(activityid, userid, activity, created, deletes) VALUES('','$userid','Anda membuat article $title pada $timeuser','$timeuser','0')");
				$fileee = basename($new);
				$esten = pathinfo($fileee, PATHINFO_EXTENSION);
				createimg(100, 60, "$upload", "$esten", "imgar/thumbnail/$new");
				createimg(200, 140, "$upload", "$esten", "imgar/standart/$new");
				createimg(700, 300, "$upload", "$esten", "imgar/large/$new");
			} else {echo "Terjadi kesalahan";}
		}
	}

}
?>

<link rel="stylesheet" type="text/css" href="http://localhost/tobareload/assets/css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="froal/css/froala_editor.pkgd.min.css">
<link rel="stylesheet" type="text/css" href="froal/css/froala_style.min.css">

<form enctype="multipart/form-data" method="post">
<p>
	Judul<br/>
	<input type="text" name="title" id="title" value="<?php echo $title; ?>">
	<input type="hidden" name="link" id="link">
</p>
<p>
	Gambar<br/>
	<input type="file" name="image">
</p>
<p>
	Category<br/>
<select name="categoryid">
<?php
$tampil = mysql_query("SELECT * FROM categorys ORDER BY category");
while($r=mysql_fetch_array($tampil)){
echo "<option value=\"$r[categoryid]\">$r[category]</option>
";}?>
</select>

</p>
<p>
	Article<br/>
	<textarea name="article"><?php echo $article; ?></textarea>
</p>
<p>
	Keyword<br/>
	<input type="text" name="keyword" value="<?php echo $keyword; ?>">
</p>
<p>
	Ijinkan komentar<br/>
	<label>
		<input type="radio" name="permission" value="0" checked="checked"> Ya
	</label>
	<label>
		<input type="radio" name="permission" value="1"> Tidak
	</label>
</p>

<input type="submit" name="submit">
</form>

<script src="http://localhost/tobareload/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="froal/js/froala_editor.pkgd.min.js"></script>
<script type="text/javascript">
    function link(Text){
    	return Text.toLowerCase().trim().replace(/[^\w ]+/g,'').replace(/ +/g,'-');
    }
    $(document).on("input","#title", function(){
    	$("#link").val(link($("#title").val()));
    });
</script>
<script type="text/javascript">
	$(function() {
		$('textarea').froalaEditor({enter: $.FroalaEditor.ENTER_BR, placeholderText: null})
	});
</script>