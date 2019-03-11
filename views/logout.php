<?php 

/* Logout the inlogged user with session destroy.
*/
session_start();
session_destroy();
header ("Location: ../index.php");
?>