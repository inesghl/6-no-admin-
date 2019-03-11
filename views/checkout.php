<?php 
session_start();
?>

<!doctype html>
<html lang="sv">

<head>
  <?php
  // head.php (basic head things) 
  include '../includes/head.php';
  ?>
  <!-- My CSS -->
  <link rel="stylesheet" href="../css/style.css" type="text/css">

</head>

<body>
  <div class="container-fluid">

    <?php
     /* header.php (my header, with logo and stuff) 
    * database_connection.php (connection with my database)
    * functions.php (function to count the sum of each product)
    */
    include '../includes/header.php';
    include '../includes/database_connection.php';
    include '../includes/functions.php';
    ?>

    <main>
      <div class="row justify-content-center text-center">
        <div class="col-10 col-md-8 col-lg-6 card">
          <h2>Kassan</h2>
          <?php
          /* I want my order in my database to show in my checkout page. 
           * 1. I need to use if to se if the user are inlogged
           * 2. I do an statement, and SELECT all the things I want to show. 
           * 3. Loop out and then echo. 
           */
          if(isset($_SESSION["username"])){  
        
            $fetch_join_statement = $pdo->prepare(
              "SELECT Order_lamp.amount, Products.title, Products.price, Users.email
              FROM Order_lamp 
              JOIN Users
              ON Order_lamp.username = Users.username
              JOIN Products
              ON Products.ID_product = Order_lamp.ID_product
              WHERE Users.username = '" . $_SESSION['username'] . "'"
            );
            $fetch_join_statement->execute();
            // Fetch every row that it returns.
            $users_order = $fetch_join_statement->fetchAll(PDO::FETCH_ASSOC);  
             
             // Count the sum of each product, sum amount of all product and total sum.  
            $sum_amount = 0;
            $sum_price = 0;

            foreach($users_order as $orders){
              // I did a function to count the sum of each product
              $sum_of_each_product = sum_each_product($orders["amount"], $orders["price"]);
              $sum_of_each_product; 
              
              $sum_amount = $sum_amount + $orders["amount"];
              $sum_price = $sum_price + $sum_of_each_product;
              echo "<p>" . str_replace("_", " " , $orders["title"]) . " " . $orders["amount"] . "st " . $orders["price"] . "kr/st " . $sum_of_each_product . "kr" . "</p>";
            }
            echo '<p><strong>' . 'Totalt ' . $sum_amount . 'st varor ' . 'totalsumman är ' . $sum_price . 'kr' . '</strong></p>';
            echo '<p><strong>Dina uppgifter:</strong>' . '<br />' . $_SESSION["username"] . '<br />' . $orders["email"] . '</p>';
            echo "<p><a class='btn btn-dark' href='confirm.php'>Betala</a></p>";   
          }
          ?>
          <p>
            <a href='../index.php'>Tillbaka till startsidan</a>
          </p>
      
        </div><!--card-->
      </div><!--row-->
    </main>
    <?php 
    include '../includes/footer.php';
    ?>
  </div><!--container-->

</body>
</html>
