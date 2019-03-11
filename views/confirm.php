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
    */
    include '../includes/header.php';
    include '../includes/database_connection.php';
    ?>

      <main>
        <div class="row justify-content-center text-center">
          <div class="col-10 col-md-8 col-lg-6 card">
            <h2>Orderberkräftelse</h2>
            <p>Tack för din beställning <?= $_SESSION["username"]; ?>, hoppas du ska bli nöjd med dina varor.</p>
            <p> <a href='../index.php'>Tillbaka till startsidan</a> </p>
          </div><!--card-->
        </div><!--row-->
        
      </main>

      <?php 
      include '../includes/footer.php';
      ?>

  </div><!--container-->

</body>
</html>
