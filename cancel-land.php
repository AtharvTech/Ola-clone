<?php

  session_start();
  $curr_user = $_SESSION['user_name'];

  if((!isset($_SESSION['logedin']))|| $_SESSION['logedin'] != true){
    header("location : log_in.php"); 
  } 

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trippo/cancel</title>

    <!-- ----Fonts---- -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap"
      rel="stylesheet"
    />

    <!-- ----Icons---- -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />

    <!-- ----StyleSheet---- -->
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <div class="cancel-main">
      <div class="can-hero">
        <div class="cancel-msg">
          <h1>Your Booking is canceled</h1>
          <p>If the payment is done by UPI or Card, it will be reversed in 1-2 days</p>
          <form action="cancel-feed.php" method="POST">
            <input type="text" placeholder="Tell us why ! (feedback)" />
            <div class="can-btn">
              <button name="sub" type="submit">Submit</button>
              <button name="home">Home</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
