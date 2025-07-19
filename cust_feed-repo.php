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
        // customer feedback------------
        $sql = "SELECT * FROM `feedback`";
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
    <title>Customers feedback</title>

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
    <div class="cust-feed-repo-main">
        <div class="drv-repo-hero">
            <div class="head">
                <h1>Trippo</h1>
                <p>Customers Feedback Report</p>
                <div class="left">
                    <p>Admin : Atharv Raut</p>
                </div>
                <div class="right">
                    <p>
                        Date :
                        <?php echo date("l / F-j-Y");?>
                    </p>
                </div>
            </div>
            <div class="body">
                <table>
                    <tr>
                        <td>User Name</td>
                        <td>Overall Experience</td>
                        <td>Driver Ratings </td>
                        <td>Driving Skills of Driver</td>
                        <td>Booking Process</td>
                        <td>Pricing</td>
                        <td>Safety</td>
                        <td>Comments</td>
                    </tr>
                    <?php
                        while($rec = mysqli_fetch_assoc($result)){
                    ?>
                        <tr>
                            <td>
                                <?php
                                    echo $rec['user_name'];
                                ?>
                            </td>
                            <td>
                                <?php
                                    echo $rec['overall_rate'];
                                ?>
                            </td>
                            <td>
                                <?php
                                    echo $rec['drv_rate'];
                                ?>
                            </td>
                       
                            <td>
                                <?php
                                    echo $rec['drv_skill'];
                                ?>
                            </td>
                       
                            <td>
                                <?php
                                    echo $rec['book_process'];
                                ?>
                            </td>
                     
                            <td>
                                <?php
                                    echo $rec['price'];
                                ?>
                            </td>
                        
                            <td>
                                <?php
                                    echo $rec['safe'];
                                ?>
                            </td>
                      
                            <td>
                                <?php
                                    echo $rec['comment'];
                                ?>
                            </td>
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