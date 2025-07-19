<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Log In</title>

  <!-- ----------------Icons---------------- -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
  
  <!-- ----------------StyleSheets---------------- -->
  <link rel="stylesheet" href="style.css" />

  <!-- ----------------Scripts---------------- -->
  <link rel="script" href="src.js" />

  <!-- ----------------php---------------- -->
    <?php

    // variables------------ -->
            $server = "localhost";
            $user = "root";
            $password = "";
            $database = "ola_admin";
            $login="";
            $loginfail = "";
           
            $conn = mysqli_connect($server, $user, $password, $database);
            if(!$conn){
              echo "Failed";
            }

            if($_SERVER["REQUEST_METHOD"] == "POST"){

              $username = $_POST["username"];
              $password = $_POST["password"];

              if((isset($username)) && (isset($password))){
                $sql = "SELECT * FROM `users` WHERE user_name= '$username' and password = '$password'";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                // echo $num;
                if($num == 1){
                  $login = true;
                  session_start();
                  $_SESSION['logedin'] = true;
                  $_SESSION['user_name'] = $username;
                  header("location: index.php");
                }
                else{
                  $loginfail = true;
                }
              }

            }
    ?>

</head>

<body>
  <div class="log-main">
    <!------------------------ Log_hero Section ------------------------>

    <div class="log-hero">
      <div class="log-inp">
        <div class="left">
          <div class="log-left-back">
            <div class="left-name">
              <h1>Trippo</h1>
         </div>
            <div class="login-form">
              <div class="login-inp">
                <h2>Log In</h2>
                <form class="log-in-form" method="POST">
                  <div class="inp-field">
                    <label>username</label>
                    <input required id="user" value="" name="username" type="text" placeholder=""  />
                    <label>password</label>
                    <input required id="pass" value="" name="password" type="password" placeholder=""   />
                    <p id="forget_pass">Forgot Password</p>
                    <input id="submit-form" type="submit" value="submit" />
                  </div>
                </form>
                  
                <div class="buttons">
                  <?php
         
                      if($loginfail == true){
                        echo '<p style="color:red; margin:0; padding:0; font-size:99%; font-weight:500">Invalid Username and password</p>';
                      }
                  ?>
                  <p>Don`t have an account ?
                  <a href="sign_up.php" id="sign_up">Sign Up</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="right">
          <div class="log-right-back">
            <h1>
              Welcom back !<br />log in to your Trippo account
            </h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>