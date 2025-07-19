<?php

  session_start();
  $curr_user = $_SESSION['user_name'];

  if((!isset($_SESSION['logedin']))|| $_SESSION['logedin'] != true){
    header("location : log_in.php"); 
  } 
  else{
  
        // local Variables---------->

        // system Variables---------->
        $server = "localhost"; 
        $user = "root"; 
        $password = ""; 
        $database = "ola_admin";
        $conn = mysqli_connect($server, $user, $password, $database); 
        if(!$conn){
        echo"Failed"; 
        } 
        $sql="UPDATE `trip` SET `status`='Canceled By Customer' WHERE user_name = '$curr_user' ORDER BY `id` DESC LIMIT 1";
        $result = mysqli_query($conn, $sql);
        if($result){
          header("location:cancel-land.php");
        }
    }
?>
