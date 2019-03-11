<?php 
session_start();
?>

<!doctype html>
<html lang="sv">

<head>
  <?php
  // head.php (basic head things) 
  include 'includes/head.php';
  ?>

  <!-- My CSS -->
  <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
  <div class="container-fluid">
    <?php
    /* header.php (my header, with logo and stuff) 
    * database_connection.php (connection with my database)
    * functions.php (function to count the sum of each product)
    */
    include 'includes/header.php';
    include 'includes/database_connection.php';  
    include 'includes/functions.php';
    ?>

    <main>
      <div class="row justify-content-center text-center">
        <div class="col-8 col-md-5 card">
          <h2>Välkommen!</h2>  

          <?php
          // Use if to check if the user are inlogged or not.
          if(isset($_SESSION["username"])){
            echo '<p>' . 'Du är inloggad som ' . $_SESSION["username"] . '</p>' . '<br />' . '<p>' . '<a class="btn btn-dark btn-sm" href="views/logout.php">Logga ut</a>' . '</p>';
          }else{
            echo '<p>' . 'Du måste logga in för att fortsätta.' . '<br />' . '<a class="btn btn-dark btn-sm" href="views/login_and_register.php">Logga in eller registrera ny användare</a>' . '</p>';
          }
          ?>
      
        </div>
      </div>
    
      <!-- SQL-statement, SELECT my products from my database -->
      <div class="row justify-content-center text-center gallery">
        <?php
        $fetch_all_products_statement = $pdo->prepare("SELECT * FROM Products");
        $fetch_all_products_statement->execute();
        // Fetch every row that it returns. 
        $all_products = $fetch_all_products_statement->fetchAll(PDO::FETCH_ASSOC);
        //Loop through my products and echo out name, image, price.
        foreach($all_products as $product):
        ?>
            <div class="col-10 col-md-5 card">
              <h3>
                <?= str_replace("_", " " , $product["title"]); ?>
              </h3>
              <div class=image_frame>
                <img src="<?= $product["images"]; ?>">
              </div>
              <p><strong>
                <?= $product["price"]; ?>kr/st
              </strong></p>
              <!--The custumer choose amount of the product they want to buy in the input field -->
              <form action="views/order.php" method="POST">
                <div class="amount_input">
                  <label for="number">
                    <p>Antal:</p>
                  </label><br />
                  <input type="number" name="<?= $product["title"]; ?>" value="<?php echo $_SESSION[$product["title"]];?>" id="number" />
                  <p><button class="btn btn-light btn-sm" type="submit">Lägg till</button></p>
                </div>
              </form>
            </div><!--card-->
        <?php
        endforeach;
        ?>
      </div><!--row gallery-->
      
      <div class="row justify-content-center text-center">
        <div class="col-9 col-md-5 card">
          <h2>Gå vidare</h2>
          <?php
          // Check if the username is set.
          if(isset($_SESSION["username"])){
        
            //SQL-statement SELECT and then JOIN my three tables.
            $fetch_join_statement = $pdo->prepare( 
              "SELECT Order_lamp.amount, Products.title, Products.price, Order_lamp.ID
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
            /* I want to loop out the custumers order
             * and echo out name of product, amount and price.
             */
            foreach($users_order as $orders): 
          ?>
              <p>
                <?= str_replace("_", " " , $orders["title"]); ?>
                <?= $orders["amount"] . "st"; ?>
                <?= $orders["price"] . "kr/st"; ?>
                <?php
                  // I did a function to count the sum of each product, see functions.php
                  $sum_of_each_product = sum_each_product($orders["amount"], $orders["price"]);
                  echo $sum_of_each_product; 
                ?>
                <!-- Button that adds one product to the cart -->
                <a class="fas fa-plus-square" href="views/add_to_cart.php?ID=<?= $orders["ID"]; ?>" role="button"></a>
                <!-- Button that delete one product from the cart -->
                <a class="fas fa-minus-square" href="views/remove_one_from_cart.php?ID=<?= $orders["ID"]; ?>" role="button"></a>
                <!-- Button that remove all the product from the line in the cart -->
                <a class ="btn btn-light btn-sm" href="views/remove_from_cart.php?ID=<?= $orders["ID"]; ?>" role="button">Ta bort</a>
              </p>
              
              <?php 
              endforeach;
              ?>
            <?php
            echo "<p><a class='btn btn-dark' href='views/checkout.php'>Gå vidare till kassan</a></p>";  
          }else{
            echo "<p>Du måste logga in eller registrera dig för att fortsätta.</p>";
          }
            ?>

        </div><!--card-->
      </div><!--row-->
    </main>

    <?php 
    include 'includes/footer.php';
    ?>
    
  </div><!--container-->
</body>
</html>