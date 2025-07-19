<?php

  session_start();
  $curr_user = $_SESSION['user_name'];

  if((!isset($_SESSION['logedin']))|| $_SESSION['logedin'] != true){
    header("location : log_in.php"); 
  } 
  else{
  
        // local Variables---------->
        $erorr = "";

        // system Variables---------->
        $server = "localhost"; 
        $user = "root"; 
        $password = ""; 
        $database = "ola_admin";
        $conn = mysqli_connect($server, $user, $password, $database); 
        if(!$conn){
        echo"Failed"; 
        } 

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $card = $_POST['card'];
            $card_pin = $_POST['card-pin'];

            if(((isset($card)) && (isset($card_pin)))){
                $sql="UPDATE `trip` SET `mode of payment`='Card' WHERE user_name = '$curr_user' ORDER BY `id` DESC LIMIT 1";
                $result = mysqli_query($conn, $sql);
                if($result){
                    header("location:wait.php");
                }
                else{
                    $erorr = true;
                }
            }
        }
    }

    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Error</title>
    

    <!-- ----Stylesheets---- -->
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap"
      rel="stylesheet"
    />

    <!-- ----Fonts---- -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap"
      rel="stylesheet"
    />
    </head>
    <body>
        <div class="error-main">

                <div class="msg">
            <?php
            // $erorr=true;
              if($erorr == true){
                  echo "
                  <h2>Payment Failed</h2>
                  <h3>If the payment has been debited from your bank account, it will be reversed in 2-3 working days ! </h3>
                  <h3>We are sorry for the inconvinience.</h3>
                  ";
                }
                ?>
                </div>
        </div>
    </body>
    </html>