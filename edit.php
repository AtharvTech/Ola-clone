<?php
session_start();

// Local Variables
  $tab_fill = "";

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
          $curr_user = $_SESSION["user_name"];
          $sql = "SELECT * FROM `users` WHERE user_name = '$curr_user'";
          $result = mysqli_query($conn, $sql);
          while( $row = mysqli_fetch_assoc($result)){
            $act_mail_id = $row['email'];
            $act_address = $row['address'];
            $act_pho_no = $row['phn-no'];
            $act_role = $row['role'];
          }
         }
      
        // echo $act_address;
        // echo $act_mail_id ;
        // echo $act_address;
        // echo $act_pho_no;
        // echo $act_address;

        // -------------Updating Records------------
        if($_SERVER["REQUEST_METHOD"] == "POST"){
          //take [name attri]
          $new_address = $_POST["address"];
          $new_email = $_POST["email"];
          $new_pho_no = $_POST["pho-no"];
          $new_role = $_POST["role"];
        
          // ADDRESS------------>
            if($act_address == NULL  && (isset($new_address)) ){//new sign kelyavr .....adhi kay nsel i.e 
                $sql = "UPDATE `users` SET `address`= '$new_address', `phn-no`= '$act_pho_no', `email` = '$act_mail_id', `role` = '$act_role'  WHERE user_name = '$curr_user' ";
                $result = mysqli_query($conn, $sql);
                if($result){
                  echo" Address updated";
                  exit;
                }
            }
       
            if($act_mail_id != NULL && $act_address != NULL && $act_pho_no != NULL && $act_role != NULL ){
              if( (isset($new_address))){
                $sql = "UPDATE `users` SET `address`= '$new_address', `phn-no`= '$act_pho_no', `email` = '$act_mail_id', `role` = '$act_role'  WHERE user_name = '$curr_user' ";
                $result = mysqli_query($conn, $sql);
                if($result){
                  echo" new Address updated";
                }
              }
              if( (isset($new_pho_no))){
                $sql = "UPDATE `users` SET `address`= '$act_address', `phn-no`= '$new_pho_no', `email` = '$act_mail_id', `role` = '$act_role'  WHERE user_name = '$curr_user' ";
                $result = mysqli_query($conn, $sql);
                if($result){
                  echo" new phn updated";
                }
              }
            }

            // EMAIL------------>
            

            // ROLE------------>
          }
 ?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Information</title>

  <!-- -----Fonts----- -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">

  
<!-- -----StyleSheets----- -->
  <link rel="stylesheet" href="style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>
  <body>

    <div class="box">
      <div class="form-box">
        <form method="POST" >
            <div class=" form-group">
              <label  for="exampleInputaddress">Address</label>
              <input name="address" type="text" class="form-control" id="exampleInputaddress" aria-describedby="emailHelp" placeholder="Enter Address">
            </div>

            <div class="form-group">
              <label for="exampleInputpho-no">Phone Number</label>
              <input maxlength="10" name="pho-no" type="text" class="form-control" id="exampleInputpho-no" placeholder="Phone Number">
            </div>
            
            <div class="form-group">
              <label for="exampleInputemail">Email</label>
              <input name="email" type="email"  class="form-control" id="exampleInputemail" placeholder="Email">
            </div>
          
            <div class="form-group">
              <label for="exampleInputrole">Role</label>
              <select name="role" class="form-control" id="exampleInputrole" >
                <option class="opt-edit" value="customer" >Customer</option>
                <option class="opt-edit" value="Driver">Driver</option>
              </select>
            </div>
        
              <button type="submit" class="mt-3 btn  btn-primary">Submit</button>
            </form>
              
              <a class="mt-1 ml-1 btn btn-primary" href="profile.php">
                <button class="bg-primary border-0 text-light">Cancel</button>
              </a>
      </div>
    </div>
  </body>
</html>