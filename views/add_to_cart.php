<?php
session_start();

//database_connection.php (connection with my database)
include '../includes/database_connection.php';

/* 
* I want to add one product to my cart at my index page.
* I use an UPDATE-statement that updates the chosen product with one amount at the time.
*/
$update_amount_statement = $pdo->prepare("UPDATE Order_lamp SET amount = amount +1 WHERE ID = :ID");
$update_amount_statement->execute([
  ":ID" => $_GET["ID"]
]);
header('Location: ../index.php');
?>
