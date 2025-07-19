<?php

session_start();
$curr_user = $_SESSION['user_name'];
// echo $curr_user;

if($_SESSION['user_name'] == 'admin62' ){

    if((!isset($_SESSION['logedin']))|| $_SESSION['logedin'] != true){
      header("location : log_in.php"); 
    }     

    //  local Variables---------->
    $d_fetched ="";
    $c_fetched ="";
    $r_fetched ="";
    $b_fetched ="";
    $ds_count = "";

    // system Variables---------->
    $server = "localhost"; 
    $user = "root"; 
    $password = ""; 
    $database = "ola_admin";
    $conn = mysqli_connect($server, $user, $password, $database); 
      if(!$conn){
        echo"Failed"; 
      } 
    
    // -----------Driver Table-------------
    $d_sql = "SELECT * FROM `users` WHERE `role` = 'driver' ";
    $d_run = mysqli_query($conn, $d_sql);
    if(!$d_run){
      echo "ERROR";
    }
    $d_count = mysqli_num_rows($d_run);
    if($d_count > 0){
      $d_fetched = true;
    }
    // -----------Customer Table-------------
    $c_sql = "SELECT * FROM `users` WHERE `role` = 'customer' ";
    $c_run = mysqli_query($conn, $c_sql);
    if(!$c_run){
      echo "ERROR";
    }
    $c_count = mysqli_num_rows($c_run);
    if($c_count > 0){
      $c_fetched = true;
    }

    // -----------Bookings Table-------------
    $b_sql = "SELECT * FROM `trip` ";
    $b_run = mysqli_query($conn, $b_sql);
    if(!$b_run){
      echo "ERROR";
    }
    $b_count = mysqli_num_rows($b_run);
    if($b_count > 0){
      $b_fetched = true;
    }
    // -----------Referals Table-------------
    $r_sql = "SELECT * FROM `users` ";
    $r_run = mysqli_query($conn, $r_sql);
    if(!$r_run){
      echo "ERROR";
    }
    $r_count = mysqli_num_rows($r_run);
    if($r_count > 0){
      $r_fetched = true;
    }

    // -----------Display Count Table-------------
    // *****************Customer******************
    $u_c_sql = "SELECT * FROM `users` WHERE role = 'customer' ";
    $u_c_run = mysqli_query($conn, $u_c_sql);
    if(!$u_c_run){
      echo "ERROR";
    }
    $u_c_count = mysqli_num_rows($u_c_run);
    // echo $u_c_count;
    // ******************driver******************
    $u_d_sql = "SELECT * FROM `users` WHERE role = 'driver' ";
    $u_d_run = mysqli_query($conn, $u_d_sql);
    if(!$u_d_run){
      echo "ERROR";
    }
    $u_d_count = mysqli_num_rows($u_d_run);
    // ******************Bokings******************
    $u_t_sql = "SELECT * FROM `trip` ";
    $u_t_run = mysqli_query($conn, $u_t_sql);
    if(!$u_t_run){
      echo "ERROR";
    }
    $u_t_count = mysqli_num_rows($u_t_run);
    // ******************vehicles******************
    $vsql = "SELECT * FROM `vehicles` ";
    $vrun = mysqli_query($conn, $vsql);
    if(!$vrun){
      echo "ERROR";
    }
    $vcount = mysqli_num_rows($vrun);

  }
else{
    header("location : log_in.php"); 
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
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet" />

  <!-- ----Icons---- -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

  <!-- ----StyleSheet---- -->
  <link rel="stylesheet" href="admin.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

  <!-- ----script---- -->
  <script src="src.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

 
</head>

<body>
  <!-- ---------------------------Body------------------------- -->
  <div class="main">
    <div class="admin-panl">
      <div class="nav">
        <div class="nav-navbar">
          <div class="nm">
            <h2>Trippo</h2>
          </div>
        </div>
        <!-- Navigation -->
        <div class="wrap">
          <div class="bg-light mt-4 d-flex h-70 align-items-center w-90">
            <div class="text-left bg-light w-100 nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
              aria-orientation="vertical">
              <!-- Dashboard -->
              <button class="text-dark w-100 nav-link active" id="v-pills-dashboard-tab" data-bs-toggle="pill"
                data-bs-target="#v-pills-dashboard" type="button" role="tab" aria-controls="v-pills-dashboard"
                aria-selected="true">
                Dashboard
              </button>

              <!-- Driver -->
              <button class=" text-dark nav-link" id="v-pills-driver-tab" data-bs-toggle="pill" data-bs-target="#v-pills-driver"
                type="button" role="tab" aria-controls="v-pills-driver" aria-selected="false">
                Driver
              </button>

              <!-- Customer -->
              <button class="text-dark nav-link" id="v-pills-cust-tab" data-bs-toggle="pill" data-bs-target="#v-pills-cust"
                type="button" role="tab" aria-controls="v-pills-cust" aria-selected="false">
                Customer
              </button>

              <!-- Vehicles -->
              <button class="text-dark nav-link" id="v-pills-vehicles-tab" data-bs-toggle="pill"
                data-bs-target="#v-pills-vehicles" type="button" role="tab" aria-controls="v-pills-vehicles"
                aria-selected="false">
                Vehicles
              </button>

              <!-- Bookings -->
              <button class="text-dark nav-link" id="v-pills-book-tab" data-bs-toggle="pill" data-bs-target="#v-pills-book"
                type="button" role="tab" aria-controls="v-pills-book" aria-selected="false">
                Bookings
              </button>

              <!-- Refferals -->
              <button class="text-dark nav-link" id="v-pills-ref-tab" data-bs-toggle="pill" data-bs-target="#v-pills-ref"
                type="button" role="tab" aria-controls="v-pills-ref" aria-selected="false">
                Refferals
              </button>

              <!-- Reportss -->
              <button class="text-dark nav-link" id="v-pills-repo-tab" data-bs-toggle="pill" data-bs-target="#v-pills-repo"
                type="button" role="tab" aria-controls="v-pills-repo" aria-selected="false">
                Reports
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- main screen-------------- -->
      <div class="mainscreen">
        <div class="navbar">
          <div class="wecm">
            <h2>Admin</h2>
          </div>
          <div class="prof">
            <div class="prof-icon">
              <span class="material-symbols-outlined"> account_circle </span>
            </div>
          </div>
        </div>
        <!-- -----Inner main screen----- -->

        <!-- -----Dashboard screen----- -->
        <div class="dash-screen tab-content" id="v-pills-tabContent">
          <!-- ----------- -->
          <div class="src-dash tab-pane fade show active" id="v-pills-dashboard" role="tabpanel"
            aria-labelledby="v-pills-dashboard-tab">
            <div class="dash-top">
              <div class="dash-top-cont-box">
                
                <div class="dash-top-cont-item">
                  <div class="cont-item-info">
                    <div class="cont-item-info-top">
                      <h1>
                      <?php
                        echo $u_d_count;
                        ?>
                      </h1>
                    </div>
                    <div class="cont-item-info-down">
                      <h2>Drivers</h2>
                    </div>
                    <div class="border"></div>
                  </div>
                </div>
                <div class="dash-top-cont-item">
                  <div class="cont-item-info">
                    <div class="cont-item-info-top">
                      <h1>
                        <?php
                        echo $u_c_count;
                        ?>
                      </h1>
                    </div>
                    <div class="cont-item-info-down">
                      <h2>Customer</h2>
                    </div>
                    <div class="border"></div>
                  </div>
                </div>
                <div class="dash-top-cont-item">
                  <div class="cont-item-info">
                    <div class="cont-item-info-top">
                      <h1>
                        <?php
                        echo $vcount;
                        ?>
                      </h1>
                    </div>
                    <div class="cont-item-info-down">
                      <h2>Vehicles</h2>
                    </div>
                    <div class="border"></div>
                  </div>
                </div>
                <div class="dash-top-cont-item">
                  <div class="cont-item-info">
                    <div class="cont-item-info-top">
                      <h1>
                      <?php
                        echo $u_t_count;
                        ?>
                      </h1>
                    </div>
                    <div class="cont-item-info-down">
                      <h2>Bookings</h2>
                    </div>
                    <div class="border"></div>
                  </div>
                </div>
              </div>
              
            </div> 
            <div class="dash-down"></div>
          </div>
        <!-- -----driver screen----- -->
          <div class="src-driv tab-pane fade" id="v-pills-driver" role="tabpanel" aria-labelledby="v-pills-driver-tab">
            <div class="driver-screen">
              <div class="head">
                <div class="head-item">
                  <h1>Driver</h1>
                </div>
                <!-- <div class="head-item">
                    <button>Add</button>
                </div> -->
              </div>
              <div class="body">
                <div class="drv-tb-box">
                  <table>
                    <thead>
                      <td><p>User Name</p></td>
                      <td><p>Name</p></td>
                      <td><p>Phone Number</p></td>
                      <td><p>Email</p></td>
                      <td><p>Lisence No</p></td>
                      <td><p>URC</p></td>
                      <td><p>DOJ</p></td>
                      <td><p>Action</p></td>
                    </thead>
                    <tbody>
                      <?php
                        if($d_fetched == true){
                          while($d_rec = mysqli_fetch_assoc($d_run)){
                            $name = $d_rec['first-name'] . " " . $d_rec['last-name'];
                            $pho_no = $d_rec['phn-no'];
                            $ref = $d_rec['ref-cod'];
                            $doj = $d_rec['dt-of-cration'];
                        echo " 
                        <tr>
                          <td><p>$d_rec[user_name]</p></td>
                          <td><p> $name</p></td>
                          <td><p>$pho_no</p></td>
                          <td><p>$d_rec[email]</p></td>
                          <td><p>LWVWG468</p></td>
                          <td><p>$ref</p></td>
                          <td><p>$doj</p></td>
                          
                          <td>
                            <form action='' method='post'>
                              <button>Delete</button>
                            </form>
                          </td>
                        </tr>";
                      }
                    }
                      ?>
                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
            <!-- -----Customer screen----- -->
          <div class="src-cust tab-pane fade" id="v-pills-cust" role="tabpanel" aria-labelledby="v-pills-cust-tab">
            <div class="customer-screen">
              <div class="head">
                <div class="head-item">
                  <h1>Customer</h1>
                </div>
                <div class="head-item"><button>Add</button></div>
              </div>
              <div class="body">
                <div class="drv-tb-box">
                  <table>
                    <thead>
                      <td><p>User Name</p></td>
                      <td><p>Name</p></td>
                      <td><p>Phone Number</p></td>
                      <td><p>Email</p></td>
                      <td><p>Date Of Joined</p></td>
                      <td><p>URC</p></td>
                      <td><p>Action</p></td>
                    </thead>
                    <tbody>
                      <?php
                        if($c_fetched == true){
                          while($c_rec = mysqli_fetch_assoc($c_run)){
                            $f_nm = $c_rec['first-name'] ;
                            $l_nm = $c_rec['last-name'] ;
                            $phn = $c_rec['phn-no'] ;
                            $doj = $c_rec['dt-of-cration'] ;
                            $ref = $c_rec['ref-cod'] ;

                            echo "
                            <tr>
                            <td><p>$c_rec[user_name]</p></td>
                            <td><p>$f_nm  $l_nm</p></td>
                            <td><p>$phn</p></td>
                            <td><p>$c_rec[email]</p></td>
                            <td><p>$doj</p></td>
                            <td><p>$ref</p></td>
                            <td>
                              <form action='delete.php' method='post'>
                                <button>Delete</button></td>
                              </form>
                            </tr>";
                          }
                        }
                        else{
                          echo "ERROR";
                        }
                      ?>
                    
                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- -----Vehicles screen----- -->
          <div class="src-vehi tab-pane fade" id="v-pills-vehicles" role="tabpanel" aria-labelledby="v-pills-vehicles-tab">
            <div class="vehicles-screen">
              <div class="head">
                <div class="head-item">
                  <h1>Vehicles</h1>
                </div>
                <div class="head-item">
                <a href="add-vehi.php">
                  <button>Add</button>
                </a>
                </div>
              </div>
              <div class="body">
                <div class="drv-tb-box">
                  <table>
                    <thead>
                      <td><p>ID</p></td>
                      <td><p>Company</p></td>
                      <td><p>Modal</p></td>
                      <td><p>Type</p></td>
                      <td><p>Number of Vehicle</p></td>
                      <td><p>Date of Registration</p></td>
                      <td><p>Action</p></td>


                    </thead>
                    <tbody>

                    <?php
                    while($vrec = mysqli_fetch_assoc($vrun)){
                        $id = $vrec['vehi_id'];
                        echo "
                        <tr>
                        <form action='delete.php' method='POST'>
                          <td><p>$vrec[vehi_id]</p></td>
                          <td><p>$vrec[company]</p></td>
                          <td><p>$vrec[modal]</p></td>
                          <td><p>$vrec[type]</p></td>
                          <td><p style='text-transform: uppercase;'>$vrec[car_no]</p></td>
                          <td><p>$vrec[dt_creation]</p></td>
                          <td><button name='id' value='$vrec[vehi_id]' type='submit'>Delete</button></td>
                          </form>
                        
                          ";
                      }
                      ?>
                      </tr>
                      </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- -----Bookings screen----- -->
          <div class="src-bok tab-pane fade" id="v-pills-book" role="tabpanel" aria-labelledby="v-pills-book-tab">
            <div class="bookings-screen">
              <div class="head">
                <div class="head-item">
                  <form action="">
                    <div class="lab">
                      <label>From Date*</label>
                      <label>From Time*</label>
                      <label>To Date*</label>
                      <label>To Date*</label>
                    </div>
                    <div class="inp">
                      <input type="date" />
                      <input type="time" />
                      <input type="date" />
                      <input type="date" />
                    </div>
                    <div class="head-button"><button>Filter</button></div> 
                  </form>
                </div>
              </div>
              <div class="body">
                <div style="overflow-y: scroll  " class="drv-tb-box">
                  <table>
                    <thead>
                      <td><p>Customer Name</p></td>
                      <td><p>Status</p></td>
                      <td><p>Pick Location</p></td>
                      <td><p>Drop Location</p></td>
                      <td><p>Car</p></td>
                      <td><p>Driver Name</p></td>
                      <td><p>Distance</p></td>
                      <td><p>Fair</p></td>
                    </thead>
                    <tbody>
                      <?php
                        if($b_fetched == true){
                          while($b_rec = mysqli_fetch_assoc($b_run)){
                            $driver_nm = $b_rec['driver-nm'];
                          echo "
                          <tr>
                            <td><p>$b_rec[user_name]</p></td>
                            <td><p>$b_rec[status]</p></td>
                            <td><p>$b_rec[pick_loc]</p></td>
                            <td><p>$b_rec[drop_loc]</p></td>
                            <td><p>$b_rec[modal] [$b_rec[car_no]]</p></td>
                            <td><p>$driver_nm</p></td>
                            <td><p>$b_rec[distance]Km.</p></td>
                            <td><p>$b_rec[fair]Rs.</p></td>
                          </tr>";
                        }
                      }
                     ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- -----Refferals screen----- -->
          <div class="src-ref tab-pane fade" id="v-pills-ref" role="tabpanel" aria-labelledby="v-pills-ref-tab">
            <div class="reff-screen dscreen">
              <div class="head">
                <div class="head-item">
                  <h1>Refferal Codes</h1>
                </div>
                <div class="head-item"><button>Add</button></div>
              </div>
              <div class="body">
                <div style="overflow-y: scroll" class="drv-tb-box">
                  <table>
                    <thead>
                      <td><p>User Name</p></td>
                      <td><p>Name</p></td>
                      <td><p>Role</p></td>
                      <td><p>Refferal Code</p></td>
                    </thead>
                    <tbody>

                    <?php
                    if($r_fetched == true){
                      while($r_rec = mysqli_fetch_assoc($r_run)){
                        $name = $r_rec['first-name'] . " " . $r_rec['last-name'];
                        $ref_s = $r_rec['self-ref-cod'];
                      echo "
                        <tr>
                          <td><p>$r_rec[user_name]</p></td>
                          <td><p>$name</p></td>
                          <td><p>$r_rec[role]</p></td>
                          <td><p>$ref_s</p></td>
                        </tr>";
                      }
                  }
                     ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- -----Report screen----- -->
          <div class="src-repo tab-pane fade" id="v-pills-repo" role="tabpanel" aria-labelledby="v-pills-repo-tab">
            <div class="report-screen dscreen">
              <div class="head">
                <div class="head-item">
                  <h1>Reports</h1>
                </div>
              </div>
              <div class="body">

                <div class="repo-opt">

                  <div class="repo-btn">
                    <form action="cust_repo.php" method="post">
                    <button type="submit">Customers</button>
                    </form>
                  </div>

                  <div class="repo-btn">
                    <form action="cust_feed-repo.php" method="post">
                    <button type="submit">Customer Reviews</button>
                    </form>
                  </div>

                  <div class="repo-btn">
                    <form action="driver_repo.php" method="post">
                    <button type="submit">Drivers</button>
                    </form>
                  </div>

                  <div class="repo-btn">
                    <form action="driver_pay_repo.php" method="post">
                    <button type="submit">Driver Payout</button>
                    </form>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <!-- --------- -->
        </div>
      </div>
    </div>
    <!-- -----END---- -->
  </div>
</body>

</html>