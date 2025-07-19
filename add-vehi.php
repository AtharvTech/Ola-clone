<?php
  session_start();


if($_SESSION['user_name'] == 'admin62' ){

    // Local variables------------ -->
    $result = "";
    
    // System variables------------ -->
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "ola_admin";
    $conn = mysqli_connect($server, $user, $password, $database);
    if(!$conn){
      echo "Failed";
    }

    if((!isset($_SESSION['logedin'])) || $_SESSION['logedin'] != true){
      header("location: log_in.php");
    }
    else{
      if($_SERVER["REQUEST_METHOD"] == "POST"){
        $company = $_POST['company'];
        $modal = $_POST['modal'];
        $type = $_POST['type'];
        $car_number = $_POST['car_number'];
        $car_id = rand(9999,1111);

        $sql = "INSERT INTO `vehicles`(`vehi_id`, `company`, `modal`, `type`, `car_no`, `dt_creation`) VALUES ('$car_id' ,'$company','$modal','$type','$car_number',current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if($result ){
          header("location:admin.php");
          // echo "555555555";
        }
        else{
          echo "Error";
        }
      }
    }

}
else{
  echo "failed";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>

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
    <link rel="stylesheet" href="admin.css" />
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

    <!-- ----script---- -->
    <script src="src.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
  </head>

  <body>
    <div class="vehi-main">
        <div class="vehi-hero">
            <h1>Add Vehicle</h1>
            <form method="post">

                <div class="form-group">
                  <label for="exampleInputmodal">Car Type</label>
                  <input type="text" name="type" class="form-control" id="exampleInputmodal" aria-describedby="Type" placeholder="Car Type (Sedan, SUV, Luxary)">
                </div>

                <div class="form-group">
                  <label for="exampleInputmodal">Company Name</label>
                  <input type="text" name="company" class="form-control" id="exampleInputmodal" aria-describedby="modal" placeholder="Company Name">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputmodal">Car Modal</label>
                  <input type="text" name="modal" class="form-control" id="exampleInputmodal" aria-describedby="modal" placeholder="Modal">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Car Number</label>
                      <input type="text" name="car_number" class="form-control" id="exampleInputPassword1" placeholder="MH 10 AB 1234">
                </div>

                
                <button type="submit" class="rounded-0 btn btn-primary">Add</button>
              </form>
        </div>
    </div>
  </body>
  <!-- CREATE TABLE `ola_admin`.`vehicles` (`vehi_id` INT NOT NULL AUTO_INCREMENT , `company` VARCHAR(20) NOT NULL , `modal` VARCHAR(30) NOT NULL , `car_number` VARCHAR(15) NOT NULL , PRIMARY KEY (`vehi_id`)) ENGINE = InnoDB; -->

  <!-- ALTER TABLE `vehicles` ADD `type` VARCHAR(10) NOT NULL AFTER `car_number`; 
-->

<!-- ALTER TABLE `vehicles` ADD `dt_creation` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `type`; -->

<!-- ALTER TABLE `trip` ADD `car_no` VARCHAR(15) NOT NULL AFTER `driver-nm`; -->
</html>
