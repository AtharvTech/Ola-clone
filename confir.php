<?php

  session_start();
  // echo $_SESSION['user_name'];
  $curr_user = $_SESSION['user_name'];
 

  if((!isset($_SESSION['logedin']))|| $_SESSION['logedin'] != true){
    header("location : log_in.php"); 
  } 
  else{
    // $sql = "SELECT * FROM `trip` WHERE user_name = '$curr_user' ORDER BY `id` DESC LIMIT 1";
    // system Variables---------->
    $zresult = "";
    $hrec = "";
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
 
      $upi = $_POST['upi'];
      $upi_pin = $_POST['upi-pin'];
      if((isset($upi)) && (isset($upi_pin))){
        $sql="UPDATE `trip` SET `mode of payment`='UPI' WHERE user_name = '$curr_user' ORDER BY `id` DESC LIMIT 1";
        $result = mysqli_query($conn, $sql);
        if($result){
            header("location:wait.php");
          }
      }
    }
    // display----information
      $zsql = "SELECT * FROM `trip` WHERE user_name = '$curr_user' ORDER BY `id` DESC LIMIT 1 ";
      $zresult = mysqli_query($conn,$zsql);
      if(!$zresult){
        echo "Failed";
      }
  }
?>
<!DOCTYPE html>
<html lang="en">
<!-- submit kelyavr wait la gel pahije -->
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Confirm Booking</title>

  <!-- ----Fonts---- -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet" />

  <!-- ----Icons---- -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <!-- ----StyleSheet---- -->
  <link rel="stylesheet" href="style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

  <!-- scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</head>

<body>
  <div class="confir-main">
    <div class="confir-hero">
      <div class="con-hero-top">
        <div class="hero-top-left">
          <div class="top-left-cred">
            <?php
            while($hrec = mysqli_fetch_assoc($zresult)){
          // echo "this is information";
              ?>
            <h2>
            <?php
              echo $hrec['fair'];
            ?>
            Rs.</h2>
            <p>Your Taxi Fair</p>
            
            <p style="border-bottom:1px solid black">Pick-up Location :
              <?php
              echo $hrec['pick_loc'];
              // echo "this is information";
              ?>
            </p>

            <p style="border-bottom:1px solid black">Drop Location :
              <?php
              echo $hrec['drop_loc'];
              ?>
            </p>

            <p style="border-bottom:1px solid black">No. Of Passanger :
              <?php
              echo $hrec['no_passanger'];
              ?>
            </p>

            <p style="border-bottom:1px solid black">Car :
              <?php
              echo $hrec['modal'];
              ?>
            </p>

            <?php
          }
            ?>

          </div>
        </div>
        <div class="hero-top-right">
          <div class="top-right-cred">
            <label>Select payment method</label>
            <div class="pay">
            
              <!-- ----------- -->
              <ul class="m-0 btn-nav nav nav-pills m-0" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active border-0 rounded-0" id="pills-upi-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-upi" type="button" role="tab" aria-controls="pills-upi" aria-selected="true">
                    UPI
                  </button>
                </li>

                <li class="nav-item" role="presentation">
                  <button class="nav-link border-0 rounded-0" id="pills-card-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-card" type="button" role="tab" aria-controls="pills-card"
                    aria-selected="false">
                    Card
                  </button>
                </li>

                <li class="nav-item" role="presentation">
                  <button class="nav-link border-0 rounded-0" id="pills-cash-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-cash" type="button" role="tab" aria-controls="pills-cash"
                    aria-selected="false">
                    Cash
                  </button>
                </li>
              </ul>

              <div class="upi-tab tab-content m-0 p-0" id="pills-tabContent">
                <div class="upi-slide tab-pane fade show active" id="pills-upi" role="tabpanel"
                  aria-labelledby="pills-upi-tab">
                  <div class="gpay-info">
                      
                    <form action="" method="POST">
                      <div class="gpay-info-field">
                          <select required name="upi" id="">
                            <option value="abc">abc</option>
                            <option value="xyz">xyz</option>
                            <option value="lmo">lmo</option>
                          </select>
                      </div>

                      <div class="gpay-info-field">
                        <input type="password" name="upi-pin" required id="abc" minlength="4" maxlength="4" placeholder="Enter pin" />
                      </div>

                      <div class="gpay-info-field">
                      <button type="submit">Confirm</button>
                      </div>
                    </form>

                  </div>
                </div>

                <!-- card----------- -->
                <div class="upi-slide tab-pane fade" id="pills-card" role="tabpanel" aria-labelledby="pills-card-tab">
                  <div class="card-info">

                    <form action="add-card-form.php" method="POST">

                      <div class="card-info-field">
                        <select name="card" id="">
                          <option value="54444464">54444464</option>
                          <option value="98779633">98779633</option>
                          <option value="33244598">33244598</option>
                        </select>
                      </div>

                      <div class="card-info-field">
                        <div class="right">
                          <input type="password" name="card-pin" required minlength="4" maxlength="4" placeholder="Enter pin" />
                        </div>
                      </div>

                      <div class="card-info-field">
                        <button type="submit" placeholder="submit">
                          Submit
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
                <div class=" upi-slide tab-pane fade" id="pills-cash" role="tabpanel" aria-labelledby="pills-cash-tab">
                  <div class="cash-info">
                    <form action="add-cash-form.php" method="POST">
                      <div class="cash-info-field">
                        <input id="cash" name="cash" required type="radio"  />
                        <label style="background-color:white" for="cash">Cash</label>
                        <button type="submit" placeholder="submit">
                          Submit
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <!-- ----------- -->
              <!-- </form> -->
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  <!-- END----------- -->
  </div>
</body>

</html>

<!-- ALTER TABLE `trip` ADD FOREIGN KEY (`user_id`) REFERENCES `users`(`user_name`) ON DELETE RESTRICT ON UPDATE RESTRICT; -->

<!-- ALTER TABLE `trip` ADD `pick_loc` VARCHAR(16) NOT NULL AFTER `user_name`, ADD `drop_loc` VARCHAR(16) NOT NULL AFTER `pick_loc`, ADD `time` TIME NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `drop_loc`, ADD `date` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `time`, ADD `no_passanger` TINYINT(7) NOT NULL AFTER `date`, ADD `car_type` VARCHAR(8) NOT NULL AFTER `no_passanger`, ADD `modal` VARCHAR(9) NOT NULL AFTER `car_type`, ADD `distance` INT NOT NULL AFTER `modal`,  ADD `fair` INT NOT NULL AFTER `distance`, ADD `commission` INT NOT NULL AFTER `distance`, ADD `mode of payment` VARCHAR(8) NOT NULL AFTER `commission`; -->

<!-- ALTER TABLE `trip` ADD FOREIGN KEY (`user_name`) REFERENCES `users`(`user_name`) ON DELETE RESTRICT ON UPDATE RESTRICT; -->