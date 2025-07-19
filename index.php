
<?php
      $showbtn_login ="";
      $showbtn_logout="";
      $admin = "";

      session_start();
      if((!isset($_SESSION['logedin'])) || $_SESSION['logedin'] != true){
        $showbtn_login = true;
      }
      else{
        $showbtn_logout = true;
        $_SESSION['user_name'];

        if($_SESSION['user_name'] == 'admin62' ){
          $admin = true;
        }

      }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <script src="src.js"></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>

    <!-- **********fonts********** -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
    <!-- **********Icons********** -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0"
    />

    <!-- **********Stylesheets********** -->
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />

    <!-- **********Scripts********** -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
      

  </head>
  <body>
    <div class="main">
      <!------------------------ Navbar Section ------------------------>
      <div class="navbar">
        <div class="logo"><h1>Trippo</h1></div>
        <div class="nav-content">
          <?php 
                        if($showbtn_login == true){
                          echo '
                          <button class="content-item" >
                          <a href="log_in.php">Log In</a>
                          </button>
                          ';

                          echo '
                          <button class="content-item"><a href="sign_up.php">Sign Up</a></button>
                          ';
                          
                        }

                        if($showbtn_logout == true){
                          echo '
                          <button class="content-item"><a href="profile.php">My Account</a></button>
                          ';
                        }
                        
                        if($admin == true){
                          echo '
                          <button class="content-item"><a href="admin.php">Dashboard</a></button>
                          ';
                        }

                        
            ?>                
        </div>
      </div>

      <!------------------------ Hero Section ------------------------>
      <div class="hero">
        <h1>
          The best way to <br />
          Get arround the town
        </h1>

        </div>

      <!--****************** About Section ******************-->
      <div class="about">
        <div class="about-inner">
          <!------------------ Inner Left Section -------------------->
          <div class="inner-left">
            <div class="about-img-left"></div>
            <div class="about-img-right"></div>
          </div>
          <!------------------- Inner Right Section ------------------->
          <div class="inner-right">
            <div class="inner-right-back">
              <label>ABOUT OUR COMPANY</label>
              <h1>Professional and Dedicated</h1>
              <h3>Online Taxi Service</h3>
              <p>
              Experience the freedom of hassle-free transportation with our innovative taxi booking platform. Simply enter your pickup location and destination, choose your preferred vehicle type, and let us handle the rest. Our team of experienced drivers is dedicated to providing safe and efficient rides.
              </p>
              <button id="discover">DISCOVER MORE</button>
            </div>
          </div>
        </div>
      </div>

      <!-- ****************** OUR SERVICE Section******************  -->
      <div class="service">
        <div class="top">
          <label>OUR SERVICE</label>
          <h1>Best Taxi Service</h1>
          <h3>For Your Town</h3>
          <p>
          Welcome to our premier taxi booking service, where convenience and reliability meet. With just a few clicks, you can secure a ride to your destination, whether it's a quick trip to the airport or a night out on the town. Our fleet of professional drivers is dedicated to providing top-notch service, ensuring you reach your destination safely and on time.
          </p>
        </div>
        <div class="bottom">
          <div class="swiper-back">
            <div class="swiper mySwiper">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="ser-img"></div>
                  <div class="ser-img-text">
                    <h3>Rapid City Reach</h3>
                    <p>Get the fastest rides</p>
                  </div>
                </div>

                <div class="swiper-slide">
                  <div class="ser-img"></div>
                  <div class="ser-img-text">
                    <h3>Online Booking</h3>
                    <p>Book anytime from anywhere in city</p>
                  </div>
                </div>

                <div class="swiper-slide">
                  <div class="ser-img"></div>
                  <div class="ser-img-text">
                    <h3>Airport Transport</h3>
                    <p>Airport rides on time</p>
                  </div>
                </div>

                <div class="swiper-slide">
                  <div class="ser-img"></div>
                  <div class="ser-img-text">
                    <h3>Home Pickup</h3>
                    <p>Quick home pickup</p>
                  </div>
                </div>

                <div class="swiper-slide">
                  <div class="ser-img"></div>
                  <div class="ser-img-text">
                    <h3>Multi-Payment Options</h3>
                    <p>Pay via Cash, card or online</p>
                  </div>
                </div>

                <div class="swiper-slide">
                  <div class="ser-img"></div>
                  <div class="ser-img-text">
                    <h3>Verified Staff</h3>
                    <p>Background checked staff</p>
                  </div>
                </div>

                <div class="swiper-slide">
                  <div class="ser-img"></div>
                  <div class="ser-img-text">
                    <h3>24*7 Service</h3>
                    <p>Avail service anyday at anytime</p>
                  </div>
                </div>

                <div class="swiper-slide">
                  <div class="ser-img"></div>
                  <div class="ser-img-text">
                    <h3>32k+ Vehicles</h3>
                    <p>Choose your taxi from a wide range of models</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- ******************   BOOK TAXI FORM Section******************  -->

      <div class="book-form-back">
        <div class="form-back-left">
          <div class="form-box">
            <div class="form-box-top">
              <label for="">TAXI BOOKING</label>
              <h2>Book Your Taxi</h2>
              <h5>Online</h5>
              <p>
              With just a few clicks, secure a ride to your destination. Hurry up !</p>
            </div>

            <form action="" class="book-taxi">
              <div class="form-box-bottom">
                <div class="form-box-bottom-back">
                  <div class="book-inp">
                    <input type="text" placeholder="Username"  name="username"/>
                  </div>
                  <div class="book-inp">
                    <input type="text" placeholder="Phone Number" name="phoneNo"/>
                  </div>
                  <div class="book-inp" >

                      <select  name="passanger" style="  height: 100%;width: 80%;margin: 0;padding:0;color: black;font-size: 100%;border: none;text-ailgn:center;box-sizing:border-box;background-color: white;">
                          <option style="background-color: white; text-align:center" value="1">1</option>
                          <option style="background-color: white; text-align:center" value="2">2</option>
                          <option style="background-color: white; text-align:center" value="3">3</option>
                          <option style="background-color: white; text-align:center" value="4">4</option>
                          <option style="background-color: white; text-align:center" value="5">5</option>
                          <option style="background-color: white; text-align:center" value="6">6</option>

                      </select>
                  </div>
                  <div class="book-inp">
                    <input type="text" placeholder="Pick up Destination" />
                  </div>
                  <div class="book-inp">
                    <input type="text" placeholder="Drop Destination" />
                  </div>
                  <div class="book-inp">
                    <input type="date" placeholder="Select Date" />
                  </div>
                  <div class="book-inp">
                    <input type="time" placeholder="Time" />
                  </div>
                </div>

                <div class="form-book-btn">
                    
 
                                      
                    <?php
                        if($showbtn_login == true){
                          echo '
                          <a href="log_in.php" style="  margin: 0;padding: 0;height: 100%;width: 100%;border-color: yellow;">
                          <button type="button">Log In</button>
                          </a>
                          ';
                        }
                        if($showbtn_login == false){
                          echo '
                          <a href="book.php" style="  margin: 0;padding: 0;height: 100%;width: 100%;border-color: yellow;">
                          <button type="button">
                          Book Taxi
                          </button>
                          </a>
                           ';
                        }
                        ?> 


                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- ****************** Taxi List Section******************  -->
      <div class="car-types">
        <div class="car-top">
          <label for="">OUR TAXI</label>
          <h1>Choose Our Taxi</h1>
          <h3>Collection</h3>
          <p>
          Choose from our impressive collection of taxis to find the perfect ride for your needs. Whether you're looking for a sleek and stylish sedan, a spacious and comfortable SUV, or a luxurious and elegant limousine, we have a vehicle to suit every preference and occasion.
          </p>
        </div>
        <div class="car-bottom">
          <div class="car-bottom-box">
            <div class="taxi-card">
              <div class="car-img"></div>
              <div class="car-text">
                <h3>Sedan</h3>
                <div class="car-info">
                  <p class="left-para">Initial Charge</p>
                  <p class="right-para">$2.30</p>
                  <p class="left-para">Up To 50 Kms:</p>
                  <p class="right-para">$1.50</p>
                  <p class="left-para">Additional Kilos</p>
                  <p class="right-para">$0.80</p>
                  <p class="left-para">Per Stop Traffic</p>
                  <p class="right-para">$0.03</p>
                  <p class="left-para">Capacity</p>
                  <p class="right-para">4</p>
                  <p class="left-para">Air Conditioner</p>
                  <p class="right-para">Yes</p>
                </div>
                <div class="car-btn">
                  <button class="book-btn">Book Now</button>
                </div>
              </div>
            </div>
            <div class="taxi-card">
              <div class="car-img"></div>
              <div class="car-text">
                <h3>SUV</h3>
                <div class="car-info">
                  <p class="left-para">Initial Charge</p>
                  <p class="right-para">$3.20</p>
                  <p class="left-para">Up To 50 Kms:</p>
                  <p class="right-para">$2.10</p>
                  <p class="left-para">Additional Kilos</p>
                  <p class="right-para">$0.90</p>
                  <p class="left-para">Per Stop Traffic</p>
                  <p class="right-para">$0.05</p>
                  <p class="left-para">Capacity</p>
                  <p class="right-para">6</p>
                  <p class="left-para">Air Conditioner</p>
                  <p class="right-para">Yes</p>
                </div>
                <div class="car-btn">
                  <button class="book-btn">Book Now</button>
                </div>
              </div>
            </div>
            <div class="taxi-card">
              <div class="car-img"></div>
              <div class="car-text">
                <h3>LUXUARY</h3>
                <div class="car-info">
                  <p class="left-para">Initial Charge</p>
                  <p class="right-para">$5.68</p>
                  <p class="left-para">Up To 50 Kms:</p>
                  <p class="right-para">$2.60</p>
                  <p class="left-para">Additional Kilos</p>
                  <p class="right-para">$1.20</p>
                  <p class="left-para">Per Stop Traffic</p>
                  <p class="right-para">$0.08</p>
                  <p class="left-para">Capacity</p>
                  <p class="right-para">4</p>
                  <p class="left-para">Air Conditioner</p>
                  <p class="right-para">Yes</p>
                </div>
                <div class="car-btn">
                  <button class="book-btn">Book Now</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- ****************** DRIVER Section******************  -->
      <div class="driver-box">
        <div class="driver-top">
          <label>OUR SERVICE</label>
          <h1>Our Expert Drivers</h1>
          <p>
          Our team of expert drivers is the backbone of our taxi service, providing safe, reliable, and professional transportation for our valued passengers. With years of experience behind the wheel, our drivers are skilled at navigating even the busiest streets with ease, ensuring that you reach your destination on time and in comfort.
          </p>
        </div>
        <div class="driver-down">
          <div class="driver-swiper-back">
            <div class="swiper driverSwiper">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="driver-img"></div>
                  <div class="driver-nm">
                    <p>Sourabh Mane</p>
                    <span class="material-symbols-outlined"> star </span
                    ><span class="material-symbols-outlined"> star </span
                    ><span class="material-symbols-outlined"> star </span
                    ><span class="material-symbols-outlined"> star </span
                    ><span class="material-symbols-outlined"> star </span>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="driver-img"></div>
                  <div class="driver-nm">
                    <p>James Kooper</p>
                    <span class="material-symbols-outlined"> star </span
                    ><span class="material-symbols-outlined"> star </span
                    ><span class="material-symbols-outlined"> star </span
                    ><span class="material-symbols-outlined"> star_half </span>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="driver-img"></div>
                  <div class="driver-nm">
                    <p>Charles Antonio</p>
                    <span class="material-symbols-outlined"> star </span
                    ><span class="material-symbols-outlined"> star </span
                    ><span class="material-symbols-outlined"> star </span
                    ><span class="material-symbols-outlined"> star </span
                    ><span class="material-symbols-outlined"> star </span>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="driver-img"></div>
                  <div class="driver-nm">
                    <p>Nitin Patil</p>
                    <span class="material-symbols-outlined"> star </span
                    ><span class="material-symbols-outlined"> star </span
                    ><span class="material-symbols-outlined"> star </span
                    ><span class="material-symbols-outlined"> star </span>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="driver-img"></div>
                  <div class="driver-nm">
                    <p>Thomas Daniel</p>
                    <span class="material-symbols-outlined"> star </span
                    ><span class="material-symbols-outlined"> star </span
                    ><span class="material-symbols-outlined"> star </span
                    ><span class="material-symbols-outlined"> star </span
                    ><span class="material-symbols-outlined"> star_half </span>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="driver-img"></div>
                  <div class="driver-nm">
                    <p>kevin Jacob</p>
                    <span class="material-symbols-outlined"> star </span
                    ><span class="material-symbols-outlined"> star </span
                    ><span class="material-symbols-outlined"> star </span
                    ><span class="material-symbols-outlined"> star </span>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="driver-img"></div>
                  <div class="driver-nm">
                    <p>Nick Smith</p>
                    <span class="material-symbols-outlined"> star </span
                    ><span class="material-symbols-outlined"> star </span
                    ><span class="material-symbols-outlined"> star </span
                    ><span class="material-symbols-outlined"> star </span
                    ><span class="material-symbols-outlined"> star </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- ****************** Clients Reviews Section******************  -->
      <div class="reviews-section">
        <div class="reviews-section-top">
          <label for="">OUR SERVICE</label>
          <h1>Our Happy Client`s Reviews</h1>
          <p>
          Our happy clients have shared glowing reviews about our exceptional service. They commend our prompt and reliable drivers, who are not only professional but also friendly, making their rides enjoyable and stress-free.
        </p>
        </div>
        <div class="reviews-section-down">
          <div class="reviews-section-down-back">
            <div class="client">
              <div class="client-top">
                <div class="client-img"></div>
                <div class="client-nm">
                  <h1>Robert Fox</h1>
                  <h3>CEO, Mecoland Ltd.</h3>
                </div>
              </div>
              <div class="client-down">
                <hr />
                <p>
                "Absolutely fantastic service! The drivers are always on time, friendly, and go above and beyond to make sure I have a great experience. Highly recommend to anyone in need of reliable transportation with top-notch customer service!"
                </p>
                <div class="client-star">
                  <span class="material-symbols-outlined"> star </span>
                  <span class="material-symbols-outlined"> star </span>
                  <span class="material-symbols-outlined"> star </span>
                  <span class="material-symbols-outlined"> star </span>
                  <span class="material-symbols-outlined"> star </span>
                </div>
              </div>
            </div>
            <div class="client">
              <div class="client-top">
                <div class="client-img"></div>
                <div class="client-nm">
                  <h1>Ajay More</h1>
                  <h3>UI/UX Designer</h3>
                </div>
              </div>
              <div class="client-down">
                <hr />
                <p>
                "I can't say enough good things about the drivers at this taxi service. They are always prompt, courteous, and professional. I feel safe and comfortable every time I ride with them."
                </p>
                <div class="client-star">
                  <span class="material-symbols-outlined"> star </span>
                  <span class="material-symbols-outlined"> star </span>
                  <span class="material-symbols-outlined"> star </span>
                  <span class="material-symbols-outlined"> star </span>
                  <span class="material-symbols-outlined"> star_half </span>
                </div>
              </div>
            </div>
            <div class="client">
              <div class="client-top">
                <div class="client-img"></div>
                <div class="client-nm">
                  <h1>Nishant Pawar</h1>
                  <h3>Software Developer,</h3>
                </div>
              </div>
              <div class="client-down">
                <hr />
                <p>
                "The drivers are knowledgeable about the area and always take the best routes to get me to my destination quickly. I highly recommend this taxi service to anyone looking for reliable transportation."
                </p>
                <div class="client-star">
                  <span class="material-symbols-outlined"> star </span>
                  <span class="material-symbols-outlined"> star </span>
                  <span class="material-symbols-outlined"> star </span>
                  <span class="material-symbols-outlined"> star </span>
                  <span class="material-symbols-outlined"> star </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- ****************** Footer Section******************  -->
      <div class="footer">
        <div class="footer-back">
          <div class="footer-top">
            <div class="footer-top-content">
              <h1>Trippo</h1>
              <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae
                reiciendis perspiciatis assumenda ab eum, nesciunt deserunt
                rerum nam consectetur at earum tenetur.
              </p>
            </div>
            <div class="footer-top-content">
              <label>Newsletter</label>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Eligendi, ut.
              </p>
              <form action="">
                <input type="email" placeholder="Your Mail Address" />
                <button type="submit">SUBSCRIBE</button>
              </form>
            </div>
            <div class="footer-top-content">
              <label>Official Info</label><br />

              <div class="footer-icontxt-box">
                <div class="icon">
                  <span class="material-symbols-outlined">call</span>
                </div>
                <div class="txt">
                  <p>+9854246618</p>
                </div>
                <div class="icon">
                  <span class="material-symbols-outlined">mail</span>
                </div>
                <div class="txt">
                  <p>namemail.info.com</p>
                </div>
                <div class="icon">
                  <span class="material-symbols-outlined">location_on</span>
                </div>
                <div class="txt">
                  <p>356, South Block, New Delhi</p>
                </div>
              </div>
            </div>
            <div class="footer-top-content">
              <label>Quick Link</label>
              <div class="foot-link-box">
                <a href="">About Us</a>
                <a href="feedback.php">Client Feedback</a>
                <a href="">Our Service</a>
                <a href="">Carrer</a>
                <a href="">Our Team</a>
              </div>
            </div>
          </div>
          <div class="footer-down">
            <div class="footer-down-left">
              &copy;
              <label>Atharv Raut 2024</label>
              <label>All Rights Reserved</label>
            </div>
            <div class="footer-down-right">
              <label for="">Privacy</label>
              <label for="">Terms</label>
              <label for="">Sitemap</label>
              <label for="">Help</label>
            </div>
          </div>
        </div>
      </div>

      <!-- ________________________________________________________________________ -->
      <!-- //----------Swiper Service Script----------// -->
      <script>
        var swiper = new Swiper(".mySwiper", {
          slidesPerView: "auto",
          centeredSlides: true,
          spaceBetween: 70,
        });
      </script>
      <!-- //----------Swiper Driver Script----------// -->
      <script>
        var swiper = new Swiper(".driverSwiper", {
          slidesPerView: 4,
          spaceBetween: 80,
          freeMode: true,
        });
      </script>
    </div>
  </body>
</html>
