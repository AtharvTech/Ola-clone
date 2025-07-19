<?php

  session_start();
  $curr_user = $_SESSION['user_name'];

  if((!isset($_SESSION['logedin']))|| $_SESSION['logedin'] != true){
    header("location : log_in.php"); 
  } 
  session_unset();
  session_destroy();
  header("location: index.php");
  exit;
?>