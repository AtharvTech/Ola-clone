<?php

  session_start();
  $curr_user = $_SESSION['user_name'];
  // echo $curr_user;
  $d_fnm = $_SESSION['driver-nm'];
     

  if((!isset($_SESSION['logedin']))|| $_SESSION['logedin'] != true){
    header("location : log_in.php"); 
  } 

    // system Variables---------->
    $server = "localhost"; 
    $user = "root"; 
    $password = ""; 
    $database = "ola_admin";
    $conn = mysqli_connect($server, $user, $password, $database); 
    if(!$conn){
      echo"Failed"; 
    } 

  $sql = "SELECT * FROM `trip` WHERE user_name = '$curr_user' ORDER BY id DESC LIMIT 1";
  $result = mysqli_query($conn, $sql);
  

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wating. . . . . .</title>

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

    <!-- scripts -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </head>

  <body>
    <div class="wait-main">
      <div class="con-hero-down">
        <div class="call-confirm-box">
          <!-- animation------------------->
          <div class="loader">
            <svg
              class="car"
              width="102"
              height="40"
              xmlns="http://www.w3.org/2000/svg"
            >
              <g
                transform="translate(2 1)"
                stroke="#002742"
                fill="none"
                fill-rule="evenodd"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <path
                  class="car__body"
                  d="M47.293 2.375C52.927.792 54.017.805 54.017.805c2.613-.445 6.838-.337 9.42.237l8.381 1.863c2.59.576 6.164 2.606 7.98 4.531l6.348 6.732 6.245 1.877c3.098.508 5.609 3.431 5.609 6.507v4.206c0 .29-2.536 4.189-5.687 4.189H36.808c-2.655 0-4.34-2.1-3.688-4.67 0 0 3.71-19.944 14.173-23.902zM36.5 15.5h54.01"
                  stroke-width="3"
                />
                <ellipse
                  class="car__wheel--left"
                  stroke-width="3.2"
                  fill="#FFF"
                  cx="83.493"
                  cy="30.25"
                  rx="6.922"
                  ry="6.808"
                />
                <ellipse
                  class="car__wheel--right"
                  stroke-width="3.2"
                  fill="#FFF"
                  cx="46.511"
                  cy="30.25"
                  rx="6.922"
                  ry="6.808"
                />
                <path
                  class="car__line car__line--top"
                  d="M22.5 16.5H2.475"
                  stroke-width="3"
                />
                <path
                  class="car__line car__line--middle"
                  d="M20.5 23.5H.4755"
                  stroke-width="3"
                />
                <path
                  class="car__line car__line--bottom"
                  d="M25.5 9.5h-19"
                  stroke-width="3"
                />
              </g>
            </svg>
          </div>
          <!-- animation------------------->
          <div class="coming-line">
            <h3>Your Taxi is on the way...!</h3>
            <div class="otp-box">
              <p>OTP :</p>
              <p>
                <?php
                  $otp = rand(0000, 9999);
                  echo $otp;
                ?>
              </p>
            </div>
            <div class="timer">
              <!-- ------------------------------ -->
              <form action="cancel-booking.php">
                <button type="submit">Cancel Booking</button>
              </form>
                <a href="index.php">
                  <button>Home</button>
                </a>
              <div class="d-info">
                <?php
                  while($rec = mysqli_fetch_assoc($result)){
                  
                ?>
                <p>Driver Name  :  
                  <?php
                    $d_name = $rec['driver-nm'];
                    echo $d_name;
                    $dsql = "SELECT * FROM `users` WHERE `first-name` = '$d_fnm' ";
                    $drun = mysqli_query($conn, $dsql);
                    while($d_row = mysqli_fetch_assoc($drun)){
                  ?>
                  </p>
                  <p>Driver Contact Number  : 
                  <?php
                      echo $d_row['phn-no'];
                  ?>
                  </p>
                  <?php
                }
              }
                  ?>
                  <p style="text-transform: uppercase; text-decoration: underline;" >Car : 
                  <?php
                    $op = "SELECT * FROM `trip` WHERE user_name = '$curr_user' ORDER BY id DESC LIMIT 1";
                    $op_run = mysqli_query($conn, $op);
                    while($op_rec  = mysqli_fetch_assoc($op_run)){
                      echo $op_rec ['modal'];
                      echo " ";
                      echo $op_rec ['car_no'];
                    }

                  ?>
                  </p>
              </div>
              <!-- ------------------------------ -->
            </div>
          </div>
        </div>
      </div>
      <!-- end--------------- -->
    </div>
  </body>
</html>
