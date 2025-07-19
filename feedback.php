<?php
  session_start();
  $curr_user = $_SESSION['user_name'];
  // echo $curr_user;
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
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <script src="src.js"></script>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Feedback</title>

  <!-- **********fonts********** -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet" />
  <!-- **********Icons********** -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />

  <!-- **********Stylesheets********** -->
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <!-- **********Scripts********** -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</head>

<body>
  <div class="feed-form-main">
    <div class="feed-form-hero">
      <div class="name">
        <h1>Trippo</h1>
        <p>The best way to get around the town !</p>
      </div>
      <form method= "POST" action= "feed-submit.php">
        <div class="box mb-3">          
         <div class="que">
          <label>Overall Experience :</label>
          <div class="que-in">
            <input name="overall-exp" value="Excellent" id="id1" type="radio"><label for="id1">Excellent</label>
            <input name="overall-exp" value="Good" id="id2" type="radio"><label for="id2">Good</label>
            <input name="overall-exp" value="Average" id="id3" type="radio"><label for="id3">Average</label>
            <input name="overall-exp" value="Poor" id="id4" type="radio"><label for="id4">Poor</label>
          </div>
         </div>
         
          <div class="que">
          <label for="">Driver Ratings :</label>
          <div class="que-in">
            <input name="drv-rat" value="Excellent" id="a" type="radio"><label for="a">Excellent</label>
            <input name="drv-rat" value="Good" id="b" type="radio"><label for="b">Good</label>
            <input name="drv-rat" value="Average" id="c" type="radio"><label for="c">Average</label>
            <input name="drv-rat" value="Poor" id="d" type="radio"><label for="d">Poor</label>
          </div>
         </div>

         <div class="que">
          <label for="">Driving Skills of Driver :</label>
          <div class="que-in">
            <input name="drv-skill" value="Excellent" id="i" type="radio"><label for="i">Excellent</label>
            <input name="drv-skill" value="Good" id="ii" type="radio"><label for="ii">Good</label>
            <input name="drv-skill" value="Average" id="iii" type="radio"><label for="iii">Average</label>
            <input name="drv-skill" value="Poor" id="iv" type="radio"><label for="iv">Poor</label>
          </div>
         </div>

         <div class="que">
          <label for="">Booking Process :</label>
          <div class="que-in">
            <input name="book-poc" value="Very Easy" id="idi" type="radio"><label for="idi">Very Easy</label>
            <input name="book-poc" value="Easy" id="idii" type="radio"><label for="idii">Easy</label>
            <input name="book-poc" value="Neutral" id="idiii" type="radio"><label for="idiii">Neutral</label>
            <input name="book-poc" value="Difficult" id="idiv" type="radio"><label for="idiv">Difficult</label>
            <input name="book-poc" value="Very Difficult" id="idv" type="radio"><label for="idv">Very Difficult</label>
          </div>
         </div>

        <div class="que">
          <label for="">Pricing :</label>
          <div class="que-in">
          <input name="price" value="Affordable" id="123" type="radio"><label for="123">Affordable</label>
          <input name="price" value="Expensive" id="1234" type="radio"><label for="1234">Expensive</label>
          <input name="price" value="Neutral" id="1235" type="radio"><label for="1235">Neutral</label>
          <input name="price" value="Cheaper" id="1236" type="radio"><label for="1236">Cheaper</label>
          </div>
        </div>

        <div class="que">
          <label for="">Safety<small>( Did you feel safe during your ride? )</small></label>
          <div class="que-in">
            <input name="safe" value="Yes" id="Yes" type="radio"><label for="Yes">Yes</label>
            <input name="safe" value="No" id="No" type="radio"><label for="No">No</label>
          </div>
        </div>

        <div class="que">
          <label for="">Additional Comments  :</label>
            <input name="comments" type="text" maxlength=20 placeholder="Comments">
        </div>

          <button type="submit" class="btn m-0 btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</body>

</html>