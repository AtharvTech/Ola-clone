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
    <title>User Info</title>

    <!-- ----Fonts---- -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <!-- ----Stylesheets---- -->
    <link rel="stylesheet" href="style.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap"
      rel="stylesheet"
    />
  
    <!-- ----Scripts---- -->
    <link rel="script" href="src.js" />

    <!-- --------php-------- -->
    <?php
          
    // System variables------------ -->
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "ola_admin";
    $conn = mysqli_connect($server, $user, $password, $database);
    
    // Local variables------------ -->
    $showtxt = false;
    $everythingset = false;
    $passfil = "";
    $passmiss_match="";
    $unique_pass=true;
    if(!$conn){
      echo "Failed";
    }

    $sql = "SELECT * FROM `users` ORDER BY `dt-of-cration`  DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $number = mysqli_num_rows($result);
    $_SESSION['logedin'] = true;
    // $_SESSION['user_name'] = $username;

    ?>
  </head>

  <body>
    <div class="user-main">
      <!------------------------ Log_hero Section ------------------------>

      <div class="user-hero">
          <div class="heading">
            <div class="txt"><h1>Account Created Successfully !</h1></div>
        </div>
        <div class="card" style="width:26%">
            <div class="card-in">
                <div class="card-in-top">
                    <table>
                      <?php

                          while($rec = mysqli_fetch_assoc($result)){
                      ?>
                            <tr>
                            <td>Name :</td>
                            <td><p>
                              <?php 
                              echo $rec['first-name']; 
                              echo " ";
                              echo $rec['last-name'];
                              ?>
                            </p></td>
                            </tr>
                            <tr>
                            <td>User Name :</td>
                            <td><p>
                              <?php 
                              echo $rec['user_name']; 
                              $_SESSION['user_name'];

                              ?>
                            </p></td>
                            </tr>
                            <tr>
                            <td>Phone Number</td>
                            <td><p>
                            <?php 
                              echo $rec['phn-no']; 
                              ?>
                            </p></td>
                            </tr>
                            <tr>
                            <td>Joined As :</td>
                            <td><p>
                            <?php 
                              echo $rec['role']; 
                              ?>
                            </p></td>
                            </tr>

                      <?php
                          }
                      ?>
                    </table>
                </div>
                <div class="card-in-bottom">
                    <div class="hom-btn">
                        <a href="index.php">
                            <button>Home</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </body>
</html>
