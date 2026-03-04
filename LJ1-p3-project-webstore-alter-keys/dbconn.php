<?php
$server = "localhost";
$db = "keyboard";
$username = "root";

try{
  $dbconn = new PDO("mysql:host=$server; dbname=$db", $username);
  $dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "verbinding mislukt" . $e->getMessage();
}