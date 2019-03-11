<?php

//database_connection.php (connection with my database)
include '../includes/database_connection.php';

 //I use an if to check if username, email and password field are not filled in. 
if(empty($_POST["username"]) || empty($_POST["email"]) || empty($_POST["password"])) {
  header('Location: login_and_register.php?register_failed=true');
}else{
  
  /* If username, email and password field are filled in: 
   * use INSERT to register your information in the database.
   */
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  $register_insert_statement = $pdo->prepare("INSERT INTO Users
  (username, email, password) VALUES (:username, :email, :password)");

  $register_insert_statement->execute(
    [
      ":username" => $username,
      ":email" => $email,
      ":password" => $hashed_password
    ]
  );
    
  header('Location: login_and_register.php');
}
?>