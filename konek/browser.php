<?php
/*
*
* authors: erwindo sianipar
* contact: fb.com/erwindoq
*
*/
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$browser = 'Unknown';
$operation_system = 'Unknown';
if (preg_match('/linux/i', $user_agent)) {
    $operation_system = 'Linux';
}
elseif (preg_match('/macintosh|mac os x/i', $user_agent)) {
    $operation_system = 'Mac';
}
elseif (preg_match('/windows|win32/i', $user_agent)) {
    $operation_system = 'Windows';
}
if(preg_match('/MSIE/i', $user_agent) && !preg_match('/Opera/i', $user_agent)) {
    $browser = 'Internet Explorer';
}
elseif(preg_match('/Firefox/i', $user_agent)) {
    $browser = 'Mozilla Firefox';
}
elseif(preg_match('/Chrome/i', $user_agent)) {
    $browser = 'Google Chrome';
}
elseif(preg_match('/Safari/i', $user_agent)) {
    $browser = 'Apple Safari';
}
elseif(preg_match('/Opera/i', $user_agent)) {
    $browser = 'Opera';
}
elseif(preg_match('/Netscape/i', $user_agent)) {
    $browser = 'Netscape';
}
?>