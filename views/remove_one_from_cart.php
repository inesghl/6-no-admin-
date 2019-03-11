<?php
session_start();

//database_connection.php (connection with my database)
include '../includes/database_connection.php';
/* If the custumer wants to delete one items of the chosen product:
 * use UPDATE from our database.   
 */
$update_amount_statement = $pdo->prepare("UPDATE Order_lamp SET amount = amount -1 WHERE ID = :ID");
$update_amount_statement->execute([
  ":ID" => $_GET["ID"]
]);
header('Location: ../index.php');
?>
