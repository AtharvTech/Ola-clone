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
      if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_POST["id"];
        $sql="DELETE FROM `vehicles` WHERE `vehi_id` = '$id'";
        $result = mysqli_query($conn, $sql);

        if($result ){
            header("location:admin.php");
        }
        else{
            echo "ERROR";
        }
      }
    }
}
else{
    echo "<h1>YOUR ARE NOT AUTHORISED PERSON</h1>";
}
?>