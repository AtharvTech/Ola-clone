<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign Up</title>

  <!-- -----Fonts----- -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">

  
<!-- -----StyleSheets----- -->
  <link rel="stylesheet" href="style.css" />

<!-- -----Script----- -->
<script src="https://smtpjs.com/v3/smtp.js"></script>
<link rel="script" href="src.js" />


<!-- ------PHP------- -->
<?php
    
    //variables-------------->
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "ola_admin";
    $showtxt = false;
    $everythingset = false;
    $passfil = "";
    $passmiss_match="";
    $unique_pass=true;
    $conn = mysqli_connect($server, $user, $password, $database);


    //creation of the table-------->

    // CREATE TABLE `ola_admin`.`dummy` (`user_name` VARCHAR(11) NOT NULL , `first-name` VARCHAR(10) NOT NULL , `last-name` VARCHAR(10) NOT NULL , `birthdate` DATE NOT NULL , `gender` VARCHAR(7) NOT NULL , `phno-no` BIGINT(11) NOT NULL , `email` VARCHAR(28) NOT NULL , `password` VARCHAR(15) NOT NULL , `conf-pass` VARCHAR(15) NOT NULL , `ref-cod` VARCHAR(9) NOT NULL , `role` VARCHAR(10) NOT NULL , `self-ref-cod` VARCHAR(9) NOT NULL , `dt-of-creation` TIMESTAMP NOT NULL ) ENGINE = InnoDB;


    //connection with table-------->
      if($_SERVER["REQUEST_METHOD"] == "POST"){
        //take [name attri]
        $bday_dd = $_POST["dd"];
        $bday_mm = $_POST["mm"];
        $bday_yy = $_POST["yy"];
        $birthdate = $bday_yy . $bday_mm . $bday_dd;
        $conf_pass = $_POST["conf_pass"];
        $email = $_POST["email"];
        $first_name = $_POST["fname"];
        $last_name = $_POST["lname"];
        $password = $_POST["password"];
        $phn_no = $_POST["phone_no"];
        $ref_cod = $_POST["ref_cod"];
        $role = $_POST["role"];
        $gender = $_POST["gender"];
        $uniuser_name = $first_name.rand(99999, 11111);
        $rand_ascii_1 = rand (97, 122);
        $rand_ascii_2 = rand (97, 122);
        $rand_ascii_3 = rand (97, 122);
        $self_ref_cod =  rand(99, 11) . chr($rand_ascii_1) . chr($rand_ascii_3) . rand(99, 11) . chr($rand_ascii_2) ;


        //Inserting the records-------->
        if( (isset($birthdate)) &&  (isset($conf_pass)) && (isset($email)) && (isset($first_name)) && (isset($last_name)) && (isset($last_name)) && (isset($password)) && (isset( $phn_no)) && (isset($ref_cod)) && (isset($role)) && (isset($gender))){
                  $everythingset = true;
                  if($password == $conf_pass){

                    $sql = "SELECT * FROM `users` WHERE password = '$password'";
                    $result = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($result);
                    // echo $count ;
                        if($count <= 0){
                            $unique_pass = true;
                            $sql = "INSERT INTO `users` (`user_name`,`first-name`, `last-name`, `birthdate`, `gender`, `phn-no`, `email`, `password`, `conf-pass`, `ref-cod`, `role`, `self-ref-cod`,`dt-of-cration`) VALUES ('$uniuser_name','$first_name', '$last_name', '$birthdate', '$gender', '$phn_no', '$email', '$password', '$conf_pass', '$ref_cod', '$role','$self_ref_cod' , current_timestamp())";
                            $result = mysqli_query($conn, $sql);
                                if($result){
                                    $showtxt = true;
                                    session_start();
                                    $_SESSION['logedin'] = true; 
                                    $_SESSION['user_name'] = $username;
                                    header('location: registered.php');
                                    exit();
                                  }
                                
                        }
                        else{
                          $unique_pass = false;
                        }
                  }
                  else{
                    $passmiss_match =true;
                  }
        }
        else{
    
          $showtxt = false;
          $everythingset = false;
        }


       
      }

?>
</head>

<body>
  <div class="sign-main" style="  background-color:rgb(224,224,224); ">
    <!-- -------------- Sign In Hero Section -------------- -->
    <div class="sign-hero" style="width: 100%;height: 100vh;padding: 0;margin: 0;color: white;display: flex;flex-direction: column;justify-content: center;align-items: center;border-radius: 20px;background-color: transperant; ">


    <?php

    // $unique_pass = false;
    if($unique_pass == false){
      echo '<div class="alert" style="margin: 0;padding: 0;background-color: ;color: black;height: 5%;width: auto;display: flex;justify-content: center;"><h3 style="color:red">Password is already in use, It must be unique </h3></div>';
    }
    ?>
      <div class="sign-inp" >
        <!---------------- Sign In Hero Left Section ---------------->
        <div class="sign-left">
          <div class="sign-left-back"></div>
        </div>
        <!---------------- Sign In Hero Right Section ---------------->
        <div class="sign-right">
          <div class="sign-right-back">
            <div class="sign-form">
              <?php
                  if(!$conn){
                    echo "<lable>Connection Failed</lable>";
                  }
                  ?> 

              <h2>Sign Up</h2>
              <div class="sign-inp-field">
                <p>
                  Let`s get your all set up so you can verify your personal
                  account and begin setting up your profie.
                </p>
                <!---------------- Sign In Hero Left Form Section ---------------->
                <form action="" method="POST" class="sign-in-form">
                  <div class="sign-inp-form">
                    <div class="sign-inp-form-left">
                      <lable class="sign">Refferal Code</lable>
                      <input class="signup-form-field" value="" name="ref_cod"  type="text" maxlength="8" />
                      <lable class="sign">First Name</lable>
                      <input class="signup-form-field" value="" name="fname" type="text" required maxlength="9" />
                      <lable class="sign">Birth Date</lable>
                      <div class="sep-box">
                        <input class="signup-form-field sep" value="" name="dd" type="text"  placeholder="DD" required minlength="2" maxlength="2" />
                        <input class="signup-form-field sep" value="" name="mm" type="text"  placeholder="MM" required minlength="2" maxlength="2" />
                        <input class="signup-form-field sep" value="" name="yy" type="text"  placeholder="YYYY" required maxlength="4" minlength="4" />
                      </div>
                      <lable class="sign">Phone Number</lable>
                      <input class="signup-form-field" value=""  name="phone_no" type="text" maxlength="10" />
                      <lable class="sign">Password</lable>
                      <input class="signup-form-field" value="" name="password"  type="password" required maxlength="8" />
                    </div>
                    <!---------------- Sign In Hero Right Form Section ---------------->
                    <div class="sign-inp-form-right">
                      <lable class="sign">Register as</lable>
                      <select name="role"  required>
                        <option value="Customer" name="as-cust">Customer</option>
                        <option value="Driver" name="as-drv" >Driver</option>
                      </select>
                      <lable class="sign">Last Name</lable>
                        <input class="signup-form-field" value="" name="lname" type="text" required maxlength="7" />
                      <lable class="sign">Gender</lable>
                       <select name="gender">
                        <option value="male" name="male">Male</option>
                        <option value="female" name="female">Female</option>
                        <option value="other" name="other">Other</option>
                       </select>
                        <lable class="sign">Email</lable>
                        <input class="signup-form-field mailid" value=""  name="email" type="email" required maxlength="35" />
                        <lable class="sign">Confirm Password</lable>
                        <input class="signup-form-field" value="" name="conf_pass"  type="password" required maxlength="8" />
                      </div>
                    </div>
                    <!---------------- Sign In Hero footer Form Section ---------------->
                    
                    <div class="terms">
                      <input id="terms" type="checkbox" required />
                      <p>I agree to all the
                        <p id="mark"> Terms </p> and <p id="mark">Privacy Policy</p>
                      </p>
                      <button class="create-acc" id="btn" type="submit">Create Account</button>
                      <?php

                      if($passmiss_match == true){
                        echo '<h3 style="color:red; background-color:white; font-size:100%; font-weight:500; margin:0; padding:0"> Password & confirm password must match</h3>';
                      }
                      
                      ?>
                      <p class="log-button">Already have an account? <p id="mark"> Log in</p></p>
                    </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>