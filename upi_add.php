<?php
  session_start();
  $curr_user = $_SESSION['user_name'];
  // echo $curr_user;

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

      $upi_id = $_POST['upi_id'];
      $pin = $_POST['pin'];
      $cpin = $_POST['conf-pin'];

      if($pin == $cpin){
        $add_pin = true;
      }
      else{
        $conpin = true;
      }

      if($add_pin == true){
        // $sql = "INSERT INTO `upis`(`pay-id`, `user_name`, `card_no`, `cvv`, `expiry`, `upi-pin`, `upi_id`) VALUES ('','$curr_user','','','','$pin','$upi_id')";
        $sql = "INSERT INTO `upis`(`pay-id`, `user_name`, `upi-pin`, `upi_id`) VALUES ('','$curr_user','$pin','$upi_id')";
        $result = mysqli_query($conn, $sql);
        if($result){
          header("location : profile.php");
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
    <title>Add UPI ID</title>
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
                    <h5>UPI NOT ADDED</h5>
                </div>';
              }
            ?>
            <form method="POST">
              <div class="card-form form-group">
                <label for="exampleInputupi">UPI ID</label>
                <input type="text" class=" form-control" id="exampleInputupi" required aria-describedby="upi" name="upi_id" placeholder="Enter UPI ID">
              </div>
                  <div class="card-pin">
                    <div class="card-form form-group">
                      <label for="exampleInputPassword1">Pin Generation</label>
                      <input type="password" class="form-control" minlength="4" required  maxlength="4" id="exampleInputPassword1" name="pin" placeholder="Enter pin">
                    </div>
                    <div class=" card-form form-group">
                        <input type="password" class=" form-control" id="exampleInputPassword1" minlength="4" required  maxlength="4" name="conf-pin" placeholder="Confirm Pin">
                    </div>
                </div>
              <button type="submit" class="mt-2  btn btn-primary">Add</button>
            </form>
          </div>
    </div>
</body>
</html>