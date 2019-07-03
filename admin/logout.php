<?php

/*
 * ambil session
 * lalu hancurkan
 */
session_start();
session_destroy();

/*
 * arahkan ke page awal
 */
header("location: http://localhost/cicacode/admin/login");
exit();
?>