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
          <h3><strong>Logga in</strong></h3>
          <form action="login.php" method="POST">
            <label for="login_username"><p>Användarnamn</p></label><br />
            <input type="text" name="username" id="login_username"><br />
            <label for="login_password"><p>Lösenord</p></label><br />
            <input type="password" name="password" id="login_password"><br />
            <p><input class="btn btn-light btn-sm" type="submit" value="Logga in"></p>
          </form>
          
          <?php
          // My function, that echoes out if register fails
          $text = message_if_login_or_register_fails(
            'login_failed', 'Fel användarnamn eller lösenord, försök igen.'
          );
          echo $text;
          ?>
      
          <h3><strong>Registrera dig</strong></h3>
          <form action="register.php" method="POST">
            <label for="register_username"><p>Användarnamn</p></label><br />
            <input type="text" name="username" id="register_username"><br />
            <label for="register_email"><p>Email</p></label><br />
            <input type="email" name="email" id="register_email"><br />
            <label for="register_password"><p>Lösenord</p></label><br />
            <input type="password" name="password" id="register_password"><br />
            <p><input class="btn btn-light btn-sm" type="submit" value="Registrera dig"></p>
          </form>
        
          <?php
          // My function, that echoes out if register fails
          $text = message_if_login_or_register_fails(
            'register_failed', 'Du måste fylla i alla fält för att kunna registrera dig.'
          );
          echo $text;
          ?>
      
        </div><!--card-->
      </div><!--row-->
    </main>

    <?php 
    include '../includes/footer.php';
    ?>

  </div><!--container-->

</body>
</html>
