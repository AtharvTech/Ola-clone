<?php
  session_start();


if($_SESSION['user_name'] == 'admin62' ){

    // Local variables------------ -->
    
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

      // drivers information------------
      $sql = "SELECT * FROM `users` WHERE role = 'Driver' ";
      $result = mysqli_query($conn,$sql);
    }

  }
  else{
    echo "<h1>YOU ARE NOT AUTHORISED PERSON TO ACCESS THIS PAGE</h1>";
  }

  ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payouts</title>

    <!-- ----------------Icons---------------- -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap"
      rel="stylesheet"
    />

    <!-- ----------------StyleSheets---------------- -->
    <link rel="stylesheet" href="style.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />

    <!-- ----------------Scripts++---------------- -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>

    <!-- ----------------Scripts---------------- -->
    <link rel="script" href="src.js" />
  </head>

  <body>
    <div class="drv-pay-repo-main">
        <div class="drv-repo-hero">
            <div class="head">
                <h1>Trippo</h1>
                <p>Driver Payouts Report</p>
                <div class="left"><p>Admin : Atharv Raut</p></div>
                <div class="right"><p>Date : <?php echo date("l / F-j-Y");?></p></div>
            </div>
            <div class="body">
                <table>
                    <tr>
                        <td>User Name</td>
                        <td>Name</td>
                        <td>Phone Number</td>
                        <td>Trips Completed</td>
                        <td>Basic Pay</td>
                        <td>Allowance</td>
                        <td>Earned</td>
                    </tr>


                    <?php
                      while($rec = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <td><p>
                          <?php
                          echo $rec['user_name'];
                          ?>
                        </p></td>
                        <td><p>
                          <?php
                            $f_nm = $rec['first-name']; 
                            $l_nm = $rec['last-name']; 
                            $curr_driver = $f_nm . " " . $l_nm;
                            echo $rec['first-name'];
                            echo " ";
                            echo $rec['last-name'];
                          ?>
                        </p></td>
                        <td><p>
                          <?php
                          echo $rec['phn-no'];
                          ?>
                        </p></td>
                        <td><p>
                          <?php
                          $csql = "SELECT * FROM `trip` WHERE `status` = 'Completed' && `driver-nm` = '$curr_driver'; ";
                          $cresult = mysqli_query($conn, $csql);
                          $ccount = mysqli_num_rows($cresult);
                          echo $ccount;
                          ?>
                        </p></td>
                        
                        <td><p>
                          <?php
                          echo "1050.45"
                          ?>
                        </p></td>

                        <td><p>
                          467.81
                        </p></td>
                        
                        <td><p>
                          <?php
                          $allowance = 467.81;
                          $pay = ($ccount * $allowance) + 1050.45 ;
                          echo $pay;
                          ?>
                        </p></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
  </body>
</html>
