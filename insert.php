<?php

session_start();
$_SESSION['logedin'] = true;
$curr_user = $_SESSION['user_name'];

// system Variables---------->
$server = "localhost"; 
$user = "root"; 
$password = ""; 
$database = "ola_admin";
$conn = mysqli_connect($server, $user, $password, $database); 
if(!$conn){
echo"Failed"; 
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Retrieve the data sent from JavaScript
    $data = json_decode(file_get_contents('php://input'), true);
  
    // Access the data
    $key1 = $data['key1'];
    $key2 = $data['key2'];
  
    echo "disance " . $key1;
    echo "fair " . $key2;

    $sql = "INSERT INTO `trip` (`id`, `user_name`,`distance`, `fair`) VALUES ('','$curr_user','$key1','$key2') ";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "Done";
    }
  }
?>