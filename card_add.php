<?php
  session_start();
  $curr_user = $_SESSION['user_name'];
  echo $curr_user;

  if((!isset($_SESSION['logedin']))|| $_SESSION['logedin'] != true){
    header("location : log_in.php"); 
  }

  //local variables
  $conpin = "";
  $add_pin = "";
  $NArecord = "";


  
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

      $card = $_POST['card-no'];
      $cvv = $_POST['cvv'];
      $exp_mm = $_POST ['exp-mm'];
      $exp_yy = $_POST['exp-yy'];
      $pin = $_POST['card-pin'];
      $cpin = $_POST['card-cpin'];

      if($pin == $cpin){
        $add_pin = true;
      }
      else{
        $conpin = true;
      }

      if($add_pin == true){
        $sql = "INSERT INTO `cards`(`card_id`, `user_name`, `card_no`, `cvv`, `expiry_mm`,`expiry_yy`, `card_pin`) VALUES ('','$curr_user','$card','$cvv','$exp_mm','$exp_yy','$pin')";
        $result = mysqli_query($conn, $sql);
        // INSERT INTO `cards`(`card_id`, `user_name`, `card_no`, `cvv`, `expiry_mm`, `expiry_yy`, `card_pin`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]')
        if($result){
          // header("location : profile.php");
          echo "SUCCESS";
        }
        else{
          $NArecord = true;
        }

      }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Card</title>
      <!-- ----------------Icons---------------- -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet" />
  
  <!-- ----------------StyleSheets---------------- -->
  <link rel="stylesheet" href="style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  
  <!-- ----------------Scripts++---------------- -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</head>
<body>
    <div class="card-main">
        <div class="card-form-box">
        <?php
              if($conpin == true ){
                echo '
                <div class="card-msg">
                    <h5>Pin and Confirm pin must match</h5>
                </div>';
              }
              if($NArecord == true ){
                echo '
                <div class="card-msg">
                    <h5>CARD NOT ADDED</h5>
                </div>';
              }
            ?>
            <form method="POST">
                <div class="card-form form-group">
                <label for="exampleInputcard">Card</label>
                <input type="text" class=" form-control" required name="card-no" minlength="12" maxlength="12" id="exampleInputcard1" aria-describedby="card" placeholder="Enter Card Number">
              </div>

              <div class="card-cred">
                    <div class="card-form form-group">
                      <label for="exampleInputPassword1">CVV</label>
                      <input type="password" class="form-control" required name="cvv" minlength="3" maxlength="3" id="exampleInputPassword1" placeholder="CVV">
                    </div>
                    
                    <div class="exp form-group">
                        <label for="">Expiry</label>
                        <div class="exp-in">

                            <input type="password" class=" form-control" required name="exp-mm" minlength="2" maxlength="2" id="exampleInputPassword1" placeholder="MM">
                            <input type="password" class=" form-control" required name="exp-yy" minlength="4" maxlength="4" id="exampleInputPassword1" placeholder="YYYY">
                        </div>
                    </div>
                </div>

              <div class="card-pin">
                    <div class="card-form form-group">
                      <label for="exampleInputPassword1">Pin Generation</label>
                      <input type="password" class="form-control" required name="card-pin" minlength="4" maxlength="4" id="exampleInputPassword1" placeholder="Enter pin">
                    </div>
                    <div class=" card-form form-group">
                        <input type="password" class=" form-control" required name="card-cpin" minlength="4" maxlength="4" id="exampleInputPassword1" placeholder="Confirm Pin">
                    </div>
                </div>
              <button type="submit" class="mt-2  btn btn-primary">Add</button>
            </form>
          </div>
    </div>
</body>
</html>