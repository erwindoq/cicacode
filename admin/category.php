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

if (isset($_POST['submit'])) {

	$category = $_POST['category'];
	$categorylink = $_POST['categorylink'];

	$cekcategory        = "SELECT categorylink FROM categorys WHERE categorylink='$categorylink'";
	$hasilcekcategory   = mysql_num_rows(mysql_query($cekcategory));

	if (empty($category)) {
		$error = true;
		echo "Nama category tidak boleh kosong<br/>";
	} elseif ($hasilcekcategory!=0) {
		$error = true;
		echo "Nama category sudah digunakan";
	} elseif (strlen($category)<3) {
		$error = true;
		echo "Nama category tidak bisa kurang dari tiga karakter<br/>";
	} elseif (str_word_count($category)>3) {
		$error = true;
		echo "Nama category hanya memuat tiga kata<br/>";
	}

	if (!$error) {
		mysql_query("INSERT into categorys(categoryid, category, categorylink, active, created, deletes) VALUES('','$category','$categorylink','0','$timeuser','0')");
		echo "Category berhasil ditambahkan";
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<script src="http://localhost/tobareload/assets/js/jquery.min.js"></script>
</head>
<body>

<form method="post">
	<input type="text" name="category" id="category">
	<input type="hidden" name="categorylink" id="link">
	<input type="submit" name="submit">
</form>
<script type="text/javascript">
    function link(Text){
    	return Text.toLowerCase().trim().replace(/[^\w ]+/g,'').replace(/ +/g,'-');
    }
    $(document).on("input","#category", function(){
    	$("#link").val(link($("#category").val()));
    });
</script>

</body>
</html>