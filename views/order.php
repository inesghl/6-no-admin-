 <?php
session_start();

//database_connection.php (connection with my database)
include '../includes/database_connection.php';
// SQL-statement, fetch all things from my Products table in the database.
$fetch_all_products_statement = $pdo->prepare("SELECT * FROM Products");
$fetch_all_products_statement->execute();
$all_products = $fetch_all_products_statement->fetchAll(PDO::FETCH_ASSOC);

 // Loop, if you order more than one product, it will store in the database table Order_lamp.
foreach($all_products as $product){
  if($_POST[$product["title"]] >= 1){
      
    $_SESSION[$product["title"]] = $_POST[$product["title"]];
    $username = $_SESSION["username"];
    $ID_product = $product["ID_product"];
    $amount = $_POST[$product["title"]];
  
    $insert_order_statement = $pdo->prepare("INSERT INTO Order_lamp
    (username, ID_product, amount) VALUES (:username, :ID_product, :amount)");

    $insert_order_statement->execute(
      [
        ":username" => $username,
        ":ID_product" => $ID_product,
        ":amount" => $amount
      ]
    );
    header('Location: ../index.php');
  }else{
    header('Location: ../index.php');
  }
}
?>