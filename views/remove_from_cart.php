<?php
session_start();

//database_connection.php (connection with my database)
include '../includes/database_connection.php';

/* If the custumer wants to delete all items of the chosen product:
 * use DELETE from our database.   
 */
$delete_amount_statement = $pdo->prepare("DELETE FROM Order_lamp WHERE ID = :ID");
$delete_amount_statement->execute([
  ":ID" => $_GET["ID"]
]);
header('Location: ../index.php');
?>

