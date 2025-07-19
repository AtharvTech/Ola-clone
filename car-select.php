<?php

  session_start();
//   echo $_SESSION['user_name'];
//   echo $_SESSION['call_date']; 

    $call_dt = $_SESSION['call_date'];
  $curr_user = $_SESSION['user_name'];
  $msg = "";
  $cresult = "";
  $zresult = "";
 

  if((!isset($_SESSION['logedin']))|| $_SESSION['logedin'] != true){
    header("location : log_in.php"); 
  } 
  else{
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
            $car = $_POST['car'];

            //fetch car number-------->
            $csql = "SELECT * FROM `vehicles` WHERE `modal` = '$car' ORDER BY RAND() LIMIT 1";
            $cresult = mysqli_query($conn, $csql);
            while($crec = mysqli_fetch_assoc($cresult)){
                $car_no = $crec['car_no'];
            }

            //check availability of the car-------->
            $query = "SELECT * FROM `trip` WHERE `date` = '$call_dt' && `car_no` = '$car_no' ";
            $run_query = mysqli_query($conn, $query);
            $query_count = mysqli_num_rows($run_query);

            //Update car-------->
            if($query_count == 0){
                $zsql = "UPDATE `trip` SET `modal`='$car', `car_no` = '$car_no' WHERE user_name = '$curr_user' ORDER BY `id` DESC LIMIT 1 ";
                $zresult = mysqli_query($conn, $zsql);
            }
            else{
                $msg = true;
            }

            if($zresult){
                header("location:confir.php");
            }
        }

        // fetch data from vehicle
        $sql = "SELECT * FROM `vehicles` GROUP BY modal ";
        $result = mysqli_query($conn, $sql);
       
    }

  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Select Car</title>

    <!-- ----Fonts---- -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet" />
    <!-- ----StyleSheet---- -->
    <link rel="stylesheet" href="style.css" />
    <!-- ----script---- -->
    <script src="src.js"></script>
</head>

<body>
    <div class="car-main">
        <div class="car-hero">
            <h2>Choose Car</h2>
            <?php

            if($msg == true){
                echo "
                <div class='car-msg'>
                <h2>
                Selected car is not available for today, Kindly select another car !
                </h2>
                </div>";
            }
            ?>
            <form action="" method="post">
                <div class="car-btn">
                    <select name="car" class="cars">
                        <?php
                        while($rec = mysqli_fetch_assoc($result)){
                            
                            echo "
                            <option value='$rec[modal]'>
                                    $rec[company]
                                    $rec[modal]
                            </option>";
                            
                        }
                            ?>
                    </select>
                </div>
                <button>Choose</button>
            </form>
        </div>
    </div>
</body>

</html>