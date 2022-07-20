<?php
if ($_SERVER['HTTP_HOST'] == "localhost") {
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'exercice1');
}
else {
    define('DB_USER', 'tzfvuxyk_quentin');
    define('DB_PASS', '@HHqq3141592');
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'tzfvuxyk_cepegra_exercice_1');
}


define('MODE', 'dev');

$connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($connect->connect_error) :
    die('Connection failed: ' . $connect->connect_error);
else :
    $connect->set_charset('utf8');
endif;