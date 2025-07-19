<?php

  session_start();
  $curr_user = $_SESSION['user_name'];

    if((!isset($_SESSION['logedin']))|| $_SESSION['logedin'] != true){
        header("location : log_in.php"); 
    } 

    if($_SERVER["REQUEST_METHOD"] == "POST"){

    $submit = $_POST['sub'];
    $home = $_POST['home'];

    if((isset($submit))){
        header("location:index.php");
    }

    if((isset($home))){
        header("location:index.php");
    }
 echo"hi";
}
?>