<?php
// 27-10-2018

include "konek/config.php";
include "konek/function.php";
include "qr/phpqrcode-master/qrlib.php";

QRcode::png(shorten3(), "image.png", "H", "10", "0");

echo "<br/><br/><br/><br/><center><img src=\"image.png\"><br/><br/>";
echo keygen();

?>