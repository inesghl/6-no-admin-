<?php 
$options = [
  "PDO::ATTR_MODE" => PDO::ERRMODE_EXCEPTION
];
$pdo = new PDO(
  "mysql:host=localhost;dbname=shopping_lamp;charset=utf8",
  "root",
  "root",
$options
);
?>