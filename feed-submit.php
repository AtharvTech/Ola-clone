<?php
  session_start();
  $curr_user = $_SESSION['user_name'];
//   echo $curr_user;
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
      $overall_exp = $_POST['overall-exp'];
      $drv_rate = $_POST['drv-rat'];
      $drv_skill = $_POST['drv-skill'];
      $book_proc = $_POST['book-poc'];
      $price = $_POST['price'];
      $safety = $_POST['safe'];
      $comm = $_POST['comments'];



      $sql = "INSERT INTO `feedback`(`id`, `user_name`, `overall_rate`, `drv_rate`, `drv_skill`, `book_process`, `price`, `safe`, `comment`) VALUES ('','$curr_user','$overall_exp','$drv_rate','$drv_skill','$book_proc','$price','$safety','$comm')";
      $result = mysqli_query($conn, $sql);
      if($result){
        header("location:index.php");
      }
      else{
        echo "done";
      }

    }

}
?>
