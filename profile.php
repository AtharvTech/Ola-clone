<?php
  session_start();
  // Local variables------------ -->
  $customer = "";
  $driver = "";
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
    // echo $_SESSION["user_name"];
    $curr_user = $_SESSION["user_name"];
    $sql = "SELECT * FROM `users` WHERE user_name = '$curr_user'";
    $result = mysqli_query($conn, $sql);

    // -------------Fetch Customer------------ 
    $ysql = "SELECT * FROM `trip` WHERE user_name = '$curr_user'";
    $t_his_result = mysqli_query($conn, $ysql);
    $count = mysqli_num_rows($t_his_result);

    // ----------Fetch driver name-------------
    $sql = "SELECT * FROM `users` WHERE user_name = '$curr_user' ";
    $dresult = mysqli_query($conn, $sql);
    while($fetch_d_nm = mysqli_fetch_assoc($dresult)){
      $d_fnm = $fetch_d_nm['first-name'];
      $d_lnm = $fetch_d_nm['last-name'];
      $driver = $d_fnm . " " . $d_lnm;
    }
    $psql = "SELECT * FROM `trip` WHERE `driver-nm` = '$driver' ";
    $run = mysqli_query($conn, $psql);
    $d_count  = mysqli_num_rows($run);
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Account</title>

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

  <!-- ----------------Scripts---------------- -->
  <link rel="script" href="src.js" />
</head>

<body>
  <div class="prof-main">
    <div class="nav_bar">
      <div class="left">
        <h2>My Account</h2>
      </div>
      <div class="right">
        <a href="log_out.php"><button>Log Out</button></a>
      </div>
    </div>
    <div class="prof-hero">
      <div class="prof-box">
        <div class="prof-cont">
          <div class="pp-box">
            <div class="pp-cont-top">
              <div class="prof-pic"></div>
              <div class="prof-nm">
                <?php
                  while($frow = mysqli_fetch_assoc($result)){
                ?>
                <h1>
                <?php 
                    echo $frow['first-name']; 
                    echo " ";
                    echo $frow['last-name'];
                  ?>
                </h1>
              </div>
            </div>
          </div>
        </div>
        <div class="prof-cont">
          <div class="tab-box">
            <table>
              <tr>
                <td>
                  <p>Full Name :</p>
                </td>
                <td>
                  <p>
                  <?php 
                              echo $frow['first-name']; 
                              echo " ";
                              echo $frow['last-name'];
                  ?>
                  </p>
                </td>
              </tr>
              <tr>
                <td>
                  <p>Email :</p>
                </td>
                <td>
                  <p>
                  <?php 
                      echo $frow['email']; 
                  ?>
                  </p>
                </td>
              </tr>
              <tr>
                <td><p>Phone Number :</p></td>
                <td><p>
                  <?php 
                    echo $frow['phn-no']; 
                  ?>
                  </p>
                </td>
              </tr>
              <tr>
                <td><p>Address :</p></td>
                <td><p>
                  <?php 
                      echo $frow['address']; 
                    ?>
                  </p>
                </td>
              </tr>
              <tr>
                <td><p>Joined As :</p></td>
                <td><p>
                    <?php 
                      $as_role = $frow['role']; 
                      if($as_role == 'Customer' || $as_role == 'admin' ){
                        $customer = true;
                      }
                      else{
                        $zdriver = true;
                      }
                      echo $frow['role']; 
                    ?>
                  </p>
                </td>
              </tr>
              
            </table>
            <div class="btns">
             <a href="edit.php">
               <button>Edit</button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="prof-opt">
      <div class="tab-box">
        <ul class="tab-nav nav nav-pills mb-3" id="pills-tab" role="tablist">
          
          <li class="nav-item" role="presentation">
            <button class=" border border-dark btn rounded-0 nav-link active" id="pills-t-his-tab" data-bs-toggle="pill"
              data-bs-target="#pills-t-his" type="button" role="tab" aria-controls="pills-t-his" aria-selected="true">
              Trip History
            </button>
          </li>
          
          <li class="nav-item" role="presentation">
            <button class="nav-link  border border-dark rounded-0" id="pills-payment-tab" data-bs-toggle="pill"
              data-bs-target="#pills-payment" type="button" role="tab" aria-controls="pills-payment"
              aria-selected="false">
              Payment Methods
            </button>
          </li>
          
          <li class="nav-item" role="presentation">
            <button class="  border border-dark rounded-0 nav-link" id="pills-invit-fri-tab" data-bs-toggle="pill"
              data-bs-target="#pills-invit-fri" type="button" role="tab" aria-controls="pills-invit-fri"
              aria-selected="false">
              Invite Friend
            </button>
          </li>

          <li class="nav-item" role="presentation">
            <button class="border border-dark nav-link rounded-0" id="pills-contact-tab" data-bs-toggle="pill"
            data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
            aria-selected="false">
            Payouts
            </button>
            </li>
      </ul>

        <!-- tabs -->
        <div class="tab-content" id="pills-tabContent">
          <div style="overflow-y:scroll;"  class="tab-pane fade show active" id="pills-t-his" role="tabpanel" aria-labelledby="pills-t-his-tab">
            <table>
              <thead>
                <td>
                  <p>Pick Up Destination</p>
                </td>
                <td>
                  <p>Drop Destination</p>
                </td>
                <td>
                  <p>Distance</p>
                </td>
                <td>
                  <p>Passanger</p>
                </td>
                <td>
                  <?php

                  if($customer == true){
                    echo"<p>Driver Name</p>";
                  }
                  ?>
                  <?php
                  if($customer == !true){
                    echo "<p>Customer Name</p>";
                  }
                  ?>
                </td>
                <td>
                  <p>Vehicle</p>
                </td>
                <td>
                  <p>Fair</p>
                </td>

                <?php
                  if($customer == !true){
                    echo "
                    <td>
                    <p>Commission</p>
                    </td>";
                  }
                    ?>
                <td>
                  <p>Payment Mode</p>
                </td>
                <td>
                  <p>Status</p>
                </td>
              </thead>
              <tbody>
                <?php
                  if($count > 0){
                  while($row = mysqli_fetch_assoc($t_his_result)){
                  ?>
                    <tr>
                      <td>
                        <p>
                          <?php
                            echo $row['pick_loc'];
                          ?>
                        </p>
                      </td>
                      <td>
                        <p>
                          <?php
                            echo $row['drop_loc'];
                          ?>
                        </p>
                      </td>
                      <td>
                        <p>
                          <?php
                            echo $row['distance'];
                          ?>
                        </p>
                      </td>
                      <td>
                        <p>
                          <?php
                            echo $row['no_passanger'];
                          ?>
                        </p>
                      </td>
                      <td>
                        <p>
                          <?php
                          if($customer == true){
                            echo $row['driver-nm'];
                          }
                          ?>
                        </p>
                      </td>
                      <td>
                        <p>
                          <?php
                            echo $row['modal'];
                            echo "(";
                            echo $row['car_no'];
                            echo ")";

                          ?>
                        </p>
                      </td>
                      <td>
                        <p>
                          <?php
                            echo $row['fair'];
                          ?>
                        </p>
                      </td>


                      <?php
                      if( $customer == !true){
                        echo "<td><p>";
                      ?>
                      <?php
                        // echo $row[''];
                      ?>
                      <?php
                        echo "</p></td>";
                        }
                        ?>
                      
                      <td>
                        <p>
                          <?php
                            echo $row['mode of payment'];
                          ?>
                        </p>
                      </td>

                      <td>
                        <p>
                          <?php
                            echo $row['status'];
                          ?>
                        </p>
                      </td>
                    </tr>
                    
                  <?php
                  }
                }
                else{
                  if($customer == true){
                     echo "You Have No Privious Records";
                  }
                }
                ?>

                <!-- -----------------Driver Section----------------- -->
                <?php
                  if($d_count > 0){
                  while($row = mysqli_fetch_assoc($run)){
                  ?>
                    <tr>
                      <td>
                        <p>
                          <?php
                            echo $row['pick_loc'];
                          ?>
                        </p>
                      </td>
                      <td>
                        <p>
                          <?php
                            echo $row['drop_loc'];
                          ?>
                        </p>
                      </td>
                      <td>
                        <p>
                          <?php
                            echo $row['distance'];
                          ?>
                        </p>
                      </td>
                      <td>
                        <p>
                        <?php
                            echo $row['no_passanger'];
                          ?>
                        </p>
                      </td>
                      <td>
                        <p>
                          <?php
                          if($customer == !true){

                            $c_name = $row['user_name'];
                            $c_sql = "SELECT * FROM `users` WHERE user_name = '$c_name' ";
                            $c_run = mysqli_query($conn, $c_sql);
                            while($c_rec = mysqli_fetch_assoc($c_run)){
                              echo $c_rec['first-name'];
                              echo " ";
                              echo $c_rec['last-name'];
                            }
                          }
                          ?>
                        </p>
                      </td>
                      <td>
                        <p>
                        <?php
                            echo $row['modal'];
                            echo " [";
                            echo $row['car_no'];
                            echo "]";
                          ?>
                        </p>
                      </td>
                      <td>
                        <p>
                          <?php
                            echo $row['fair'];
                          ?>
                        </p>
                      </td>


                      <?php
                      if( $customer == !true){
                        echo "<td><p>";
                      ?>
                      <?php
                        // echo $row['commission'];
                        echo "50%";

                      ?>
                      <?php
                        echo "</p></td>";
                        }
                        ?>
                      
                      <td>
                        <p>
                          <?php
                            echo $row['mode of payment'];
                          ?>
                        </p>
                      </td>

                      <td>
                        <p>
                          <?php
                            echo $row['status'];
                          ?>
                        </p>
                      </td>
                    </tr>
                    
                  <?php
                  }
                }
                else{
                 if($customer == !true){
                    echo "You Have No Privious Records";
                  }
                }
                ?>
                
              </tbody>
            </table>
          </div>

          <div class="tab-pane fade" id="pills-payment" role="tabpanel" aria-labelledby="pills-payment-tab">


            <div class="payment-tab-box">

              <div class="tb-upi">
                <div class="nav-btn">
                <label>UPI</label>
                <a href="upi_add.php"><button>Add New</button></a>
                </div>
                <table>
                    <tr>
                      <td>abc@oksbibank</td>
                      <td>
                        <a href="delete_upi.php"><button>Delete</button></a>
                      </td>
                    </tr>
                    <tr>
                      <td>abc@oksbibank</td>
                      <td>
                        <a href="delete_upi.php"><button>Delete</button></a>
                      </td>
                    </tr>
                    <tr>
                      <td>abc@oksbibank</td>
                      <td>
                        <a href="delete_upi.php"><button>Delete</button></a>
                      </td>
                    </tr>
                </table>
              </div>

              <div class="tb-card">
                <div class="nav-btn">
                  <label>Card</label>
                  <a href="card_add.php"><button>Add New</button></a>
                  </div>
                <table>
                  <thead>
                    <td>Card Number</td>
                    <td>Expiry</td>
                    <td>Action</td>
                  </thead>
                  <tbody>
                    <tr>
                    <td>8956214569865</td>
                    <td>03/25</td>
                    <td>
                      <a href="delete_card.html"><button>Delete</button></a>
                    </td>
                  </tr>
                    <tr>
                    <td>8956214569865</td>
                    <td>03/25</td>
                    <td>
                      <a href="delete_card.html"><button>Delete</button></a>
                    </td>
                  </tr>
                    <tr>
                    <td>8956214569865</td>
                    <td>03/25</td>
                    <td>
                      <a href="delete_card.html"><button>Delete</button></a>
                    </td>
                  </tr>
                </tbody>        
              </table>
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="pills-invit-fri" role="tabpanel" aria-labelledby="pills-invit-fri-tab">
            <div class="invit-fri">
              <h2>Invite friends to Trippo</h2>
              <p>Share refferal code given below & Invite your friends to Trippo and get exiting offers on sharing taxi together</p>
              <h3>
                <?php

                $f_nm = $frow['first-name']; 
                $l_nm = $frow['last-name'];
                  echo $frow['first-name']; 
                  echo " ";
                  echo $frow['last-name'];
                  ?>
                </h3>
              <p>
                <?php
                  echo $frow['self-ref-cod'];
                ?>
              </p><button>Share</button>
                <?php
                }
                ?>
            </div>
          </div>

          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
          <?php
            if($customer == true){
              echo"Disabled";
            }
            else{
              $curr_driver = $f_nm . " " . $l_nm;
              $csql = "SELECT * FROM `trip` WHERE `status` = 'Completed' && `driver-nm` = '$curr_driver'; ";
              $cresult = mysqli_query($conn, $csql);
              $ccount = mysqli_num_rows($cresult);
              if($ccount > 0){
                $allowance = 467.81;
                $pay = ($ccount * $allowance) + 1050.45;
                echo '<h5 style="margin:0; padding:0; background-color:white">You have earned <h2 style="margin:0; padding:0; background-color:white"> '. $pay . ' Rs.</h2></h5>';
              }
              else{
                echo '<p style="margin:0; padding:0; background-color:white">You don`t have any trips</p>';
              }
            }
            ?>
          </div>
        </div>
      </div>
    </div>

    <!-- end -->
  </div>
</body>

</html>