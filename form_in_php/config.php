<?php
/*
if($_SERVER['HTTP_HOST'] === 'localhost') {
  define('DB_HOST', '127.0.0.1');
  define('DB_USER', 'root');
  define('DB_PASSWORD', '0_mysql_1');
  define('DB_NAME', 'form_in_php');
}

if($_SERVER['HTTP_HOST'] === 'mattiac.000webhostapp.com') {
  define('DB_HOST', 'localhost');
  define('DB_USER', 'id20599523_mattiacaddeo');
  define('DB_PASSWORD', 'je-8+[A=7NKaA90_');
  define('DB_NAME', 'id20599523_form_in_php');
}
*/
define('DB_HOST', '127.0.0.1');
  define('DB_USER', 'root');
  define('DB_PASSWORD', '0_mysql_1');
  define('DB_NAME', 'form_in_php');
define('DB_DSN', "mysql:host=".DB_HOST.";dbname=".DB_NAME);

?>