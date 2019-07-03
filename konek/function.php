<?php

/*
 * Fungsi waktu manusia
 * untuk mudah terbaca
 * waktu(strtotime());
 *
 */
function waktu($original){ $chunks =
	array(array(60 * 60 * 24 * 365, 'tahun'),
	array(60 * 60 * 24 * 30, 'bulan'),
	array(60 * 60 * 24 * 7, 'minggu'),
	array(60 * 60 * 24, 'hari'),
	array(60 * 60, 'jam'),
	array(60, 'menit'),
	array(1, 'detik'),
);
$today = time();
$since = $today - $original;

if ($since > 604800) {
	$print = date("j M",$original);
	if ($since > 31536000) {
		$print .= " " . date("Y", $original);
	}
	$dd = date("H:i",$original);
	return "$print pukul $dd";
}
for ($i = 0, $j = count($chunks); $i < $j; $i++) {
	$seconds = $chunks[$i][0];
	$name = $chunks[$i][1];
if (($count = floor($since / $seconds)) != 0)
	break;
	}
$print = ($count == 1) ? '1 ' . $name : "$count {$name}";
return $print . ' yang lalu';
}

/*
 * membuat pemendek link
 */
function shorten(){
	$karakter = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	$panjang  = strlen($karakter);
	$random   = '';
	for ($i=0; $i < 6; $i++) { 
		$random .= $karakter[rand(0, $panjang-1)];
	}
	return $random;
}

// 27-10-2018
function shorten2(){
	$karakter = 'ABCDEFGHIJKLM1234567890NOPQRSTUVWXYZ1234567890';
	$panjang  = strlen($karakter);
	$random   = '';
	for ($i=0; $i < 5; $i++) { 
		$random .= $karakter[rand(0, $panjang-1)];
	}
	return $random;
}
function shorten3(){
	$karakter = '1234567890';
	$panjang  = strlen($karakter);
	$random   = '';
	for ($i=0; $i < 20; $i++) { 
		$random .= $karakter[rand(0, $panjang-1)];
	}
	return $random;
}

// generate serial key number
function keygen(){
	$l = 5;
	for ($brs=1; $brs<=$l; $brs++){
		$if = shorten2();
		for ($klm=1; $klm<=1; $klm++){
			echo "$if";
		}
		if ($brs<$l)
			echo "-";
		else
			echo "";
		}
}

/*
 * membuat fungsi base_url
 * mempercepat pengambilan link
 */
function base_url($base){
	$site = "http://$_SERVER[HTTP_HOST]/cicacode/";
	return $site.$base;
}

/*
 * membuat seo waktu
 * meta published_time
 * meta modified_time
 * meta updated_time
 */
function seotime($waktu){
	$seotime  = str_replace(' ', 'T', $waktu);
	$timezone = '+07:00';
	return $seotime.$timezone;
}

/*
 * membuat crop mage
 * membuat thumbnail
 */
function createimg($nw, $nh, $source, $stype, $dest){
	$size = getimagesize($source);
	$w = $size[0];
	$h = $size[1];
	switch ($stype) {
	case 'jpg':
    	$simg = imagecreatefromjpeg($source);
    	break;
	case 'jpeg':
		$simg = imagecreatefromjpeg($source);
		break;
	case 'png':
		$simg = imagecreatefrompng($source);
		break;
	case 'gif':
		$simg = imagecreatefromgif($source);
		break;
	}
	$dimg = imagecreatetruecolor($nw, $nh);
	$wm = $w/$nw;
	$hm = $h/$nw;
	$h_height = $nh/2;
	$w_height = $nw/2;
	if ($w>$h) {
	$adjusted_width = $w / $hm;
	$half_width = $adjusted_width/2;
	$int_width = $half_width-$w_height;
	imagecopyresampled($dimg, $simg, -$int_width, 0, 0, 0, $adjusted_width, $nh, $w, $h);
	}
	elseif (($w<$h) || ($w == $h)) {
	$adjusted_height = $h/$wm;
	$half_height = $adjusted_height/2;
	$int_height = $half_height-$h_height;
	imagecopyresampled($dimg, $simg, 0,-$int_height, 0, 0, $nw, $adjusted_height, $w, $h);
	} else {
		imagecopyresampled($dimg, $simg, 0, 0, 0, 0, $nw, $nh, $w, $h);
		}
	imagejpeg($dimg,$dest,100);
}

/*
 * fungsi sensor badword
 * mengubah kata badwor ke clear
 */
function sensor($text){
    $w = mysql_query("SELECT * from badwords");
    while ($r = mysql_fetch_array($w))
    {
        $text = str_ireplace($r['badword'], $r['clearword'], $text);      
    }
    return $text;
}  

?>