<?php

define('DB_HOST', '127.0.0.1');
define('DB_USER', 'mattiacaddeo');
define('DB_PASSWORD', 'je-8+[A=7NKaA90_');
define('DB_NAME', 'form_in_php');
define('DB_DSN', "mysql:host=".DB_HOST.";dbname=".DB_NAME);
/*
try {
  $conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully"; 
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
*/
?>