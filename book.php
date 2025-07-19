<?php

session_start();
$_SESSION['logedin'] = true;

// echo $_SESSION['user_name'];

// system Variables---------->
$server = "localhost"; 
$user = "root"; 
$password = ""; 
$database = "ola_admin";
$conn = mysqli_connect($server, $user, $password, $database); 
if(!$conn){
echo"Failed"; 
}
$curr_user = $_SESSION['user_name']; 
$sql ="SELECT * FROM `users` WHERE user_name = '$curr_user' ";
$run =mysqli_query($conn, $sql);
while($rec = mysqli_fetch_assoc($run)){
  if( $rec['role'] == 'driver' ){
    header("location:index.php");
  }
}

// **************
// local Variables------------>
$post="";
$all_fields = "";
// -------- 
if($_SERVER["REQUEST_METHOD"] == "POST"){


  $sql = "SELECT * FROM `users` WHERE role = 'driver' ORDER BY RAND() LIMIT 1;";
  $d_result = mysqli_query($conn, $sql);
  while($d_result_row = mysqli_fetch_assoc($d_result)){
    $d_fnm = $d_result_row['first-name'];
    $d_lnm = $d_result_row['last-name'];
    $driver = $d_fnm . " " . $d_lnm;
    $_SESSION['driver-nm'] = $d_fnm;
  }
  $call_dd = $_POST["call-dd"]; 
  $call_mm = $_POST["call-mm"]; 
  $call_yy = $_POST["call-yy"]; 
  $call_date = $call_yy . $call_mm . $call_dd;
  $_SESSION['call_date'] = $call_date; 
  
  $drop_loc = $_POST["drop-loc"]; 
  $passanger_no = $_POST["call-pass-no"];
  // $dist =  $_POST["dist"];
  $call_time = $_POST["call-time"]; 
    
  if((isset($call_date)) && (isset($passanger_no)) && (isset($drop_loc)) && (isset($call_time))){
      $sql = "UPDATE `trip` SET `pick_loc`='Sangli',`drop_loc`='$drop_loc',`time`='$call_time',`date`='$call_date',`no_passanger`='$passanger_no',`status`='Completed',`driver-nm`='$driver' WHERE user_name = '$curr_user' ORDER BY `id` DESC LIMIT 1";
      $result = mysqli_query($conn, $sql); 
      if($result){
        header("location: car-select.php");
      }
      else {//post-part
        $post = false;
      }
    }
   else{ //isset-part
      $all_fields = true;
   } 

  } 
// -+-++-+-+-+-+-+-+-+-+-+-+-+
if((!isset($_SESSION['logedin']))|| $_SESSION['logedin'] != true){

    header("location : log_in.php"); 
  } 
  else{ 
    // display current user data----> 
    $sql = "SELECT * FROM `users` WHERE user_name ='$curr_user'"; 
    $result = mysqli_query($conn, $sql); 
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Book Your Taxi</title>

  <!-- ----Fonts---- -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet" />

  <!-- ----Icons---- -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <!-- ----StyleSheet---- -->
  <link rel="stylesheet" href="style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" /> -->

  <!-- ----script---- -->
  <script src="src.js"></script>
  <script src="leaf.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- leafleat CSS--------- -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/gh/tomickigrzegorz/autocomplete@1.8.3/dist/css/autocomplete.min.css" />

  <!-- leafleat JS--------- -->
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
  <script src="https://unpkg.com/leaflet@latest/dist/leaflet.js"></script>
  <script src="https://unpkg.com/leaflet-providers@latest/leaflet-providers.js"></script>
  <script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>
  <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/tomickigrzegorz/autocomplete@1.8.3/dist/js/autocomplete.min.js"></script>
</head>

<body>
  <!-- ---------------------------Body------------------------- -->
  <div class="book-screen-main">
    <?php

      if($all_fields == true){
          echo "<div class='msg'>";
          echo"<h5>Please fill all fields properly !</h5>";
          echo"</div>";
        }
      if($post == true){
          echo "<div class='msg'>";
          echo"<h5> Wrong Information Entered, kindly fill correct information</h5>";
          echo"</div>";
        }
      ?>
    <div class="book-screen-hero">
      <div class="map-box">
        <div id="map" class="map"></div>
      </div>
      <!-- ------------------------------------------------------------------ -->
      <div class="form-box">
        <div class="form-container">
          <div class="user-info">
            <table>
              <tr>
                <?php
                  while($rec = mysqli_fetch_assoc($result)){
                  ?>
                <td>
                  <p>User Name :</p>
                </td>
                <td>
                  <p><?php 
                    echo $rec['user_name']; 
                  ?></p>
                </td>
              </tr>
              <tr>
                <td>
                  <p>Name :</p>
                </td>
                <td>
                  <p><?php 
                    echo $rec['first-name']; 
                    echo " ";
                    echo $rec['last-name'];
                  ?></p>
                </td>
              </tr>
              <tr>
                <td>
                  <p>Phone Number :</p>
                </td>
                <td>
                  <p><?php
                    echo $rec['phn-no'];
                    ?></p>
                </td>
              </tr>
              <?php    
            }
            ?>
            </table>
          </div>
          <form method="POST" class="call-form">
            <div class="call-form-box">
              <div class="call-form-input">
                <p class="you-loc">Your Location</p>
              </div>
              <div class="auto-search-wrapper">
                <input class="call-inp" type="text" name="drop-loc" required autocomplete="off" id="pick" class="full-width"
                  placeholder="Drop Location" />
              </div>
              <div class="call-form-input">
                <select required id="pass_no" name="call-pass-no" class="call-inp">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                </select>
              </div>
              <div class="call-form-input">
                <div class="call-sep-box">
                  <input class="call-sep" required minlength="2" maxlength="2" placeholder="DD" type="text" name="call-dd" />
                  <input class="call-sep" required minlength="2" maxlength="2" placeholder="MM" type="text" name="call-mm" />
                  <input class="call-sep" required minlength="4" maxlength="4" placeholder="YYYY" type="text" name="call-yy" />
                </div>
              </div>
              <div class="call-form-input">
                <input class="call-inp" required type="time" name="call-time" />
              </div>
            </div>
            
            <div class="fair-cal">
              <p id="fair" style="color : black; background-color:white; font-size: 110%">Fair : </p>
              <p name="dist" id="dist" style="color : black; background-color:white; font-size: 110%">Distance :</p>
            </div>
            <div style="margin-top: 23%; height:7%" class="con-btn">
              <a href="confirm.html">
                <button style="font-size: 100%" onclick="take_data();" type="submit">Confirm</button>
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- end------ -->
  </div>
  <script>
    function take_data(){
    // console.log("took the data");
    // const data = document.getElementById('dist');
    // console.log(data);
    // const para_data = data.textContent;

    // Ajax request---------->
    // const xhr = XMLHttpRequest();
    // xhr.open('POST', 'insert.php', true);
    // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    // xhr.send(text=${encodeURIComponent(textContent)});
  }
  </script>

  <!-- -----------------LEAFLET API----------------- -->
  <script>
    //-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+
    var osmMap = L.tileLayer.provider("OpenStreetMap.Mapnik");
    var imageryMap = L.tileLayer.provider("Esri.WorldImagery");

    var baseMaps = {
      OSM: osmMap,
      "World Imagery": imageryMap,
    };

    //   -+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+

    // Map--Layers
    var map = L.map("map", {
      center: [16.840323, 74.619566],
      zoom: 20,
      layers: [imageryMap],
    });
    var mapLayers = L.control.layers(baseMaps).addTo(map);

    //-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+

    //marker-------->
    var marker = L.marker([16.840323, 74.619566]).addTo(map);
    //kolhapur = 16.691307, 74.244865
    //sangli = 16.867634, 74.570389
    // VP = 16.840323,74.619566

    //-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+

    //AUTOCOMPLETE ROUTE
    new Autocomplete("pick", {
      // default selects the first item in
      // the list of results
      selectFirst: true,

      // The number of characters entered should start searching
      howManyCharacters: 2,

      // onSearch
      onSearch: ({ currentValue }) => {
        // You can also use static files
        // const api = '../static/search.json'
        const api = `https://nominatim.openstreetmap.org/search?format=geojson&limit=5&city=${encodeURI(
          currentValue
        )}`;

        /**
         * jquery
         */
        // return $.ajax({
        //     url: api,
        //     method: 'GET',
        //   })
        //   .done(function (data) {
        //     return data;
        //   })
        //   .fail(function (xhr) {
        //     console.error(xhr);
        //   });

        // OR -------------------------------

        /**
         * axios
         * If you want to use axios you have to add the
         * axios library to head html
         * https://cdnjs.com/libraries/axios
         */
        // return axios.get(api)
        //   .then((response) => {
        //     return response.data;
        //   })
        //   .catch(error => {
        //     console.log(error);
        //   });

        // OR -------------------------------

        /**
         * Promise
         */
        return new Promise((resolve) => {
          fetch(api)
            .then((response) => response.json())
            .then((data) => {
              resolve(data.features);
            })
            .catch((error) => {
              console.error(error);
            });
        });
      },
      // nominatim GeoJSON format parse this part turns json into the list of
      // records that appears when you type.
      onResults: ({ currentValue, matches, template }) => {
        const regex = new RegExp(currentValue, "gi");

        // if the result returns 0 we
        // show the no results element
        return matches === 0
          ? template
          : matches
            .map((element) => {
              return `
      <li class="loupe">
        <p>
          ${element.properties.display_name.replace(
                regex,
                (str) => `<b>${str}</b>`
              )}
        </p>
      </li> `;
            })
            .join("");
      },

      // we add an action to enter or click
      onSubmit: ({ object }) => {
        // remove all layers from the map
        map.eachLayer(function (layer) {
          if (!!layer.toGeoJSON) {
            map.removeLayer(layer);
          }
        });

        const { display_name } = object.properties;
        const [lng, lat] = object.geometry.coordinates;

        const marker = L.marker([lat, lng], {
          title: display_name,
        });

        marker.addTo(map).bindPopup(display_name);

        map.setView([lat, lng], 11);

        //routing machine-------------------->
        var control = L.Routing.control({
          waypoints: [L.latLng(16.840323, 74.619566), L.latLng(lat, lng)],
          geocoder: L.Control.Geocoder.nominatim(),
        }).addTo(map);
        //distance found--------------------->
        control.on("routesfound", function (e) {
          var route = e.routes[0];
          var distance = route.summary.totalDistance;
          var disp_dist = distance / 1000;
          document.getElementById("dist").innerHTML = "Distance : " + disp_dist.toFixed(2) + " Km";
          var fair = disp_dist * 8.5;
          document.getElementById("fair").innerHTML = "Fair : " + fair.toFixed(2) + " Rs.";
          console.log(fair);
          console.log("tot distance " + distance / 1000 + " Km");

          // -+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+

          const url = 'insert.php';

          // Define the data to send
          const data = { key1: disp_dist, key2: fair };

          // Make a POST request to the PHP file
          fetch(url, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
          })
          .then(response => {
            if (response.ok) {
              return response.text();
            }
            throw new Error('Network response was not ok.');
          })
          .then(data => {
            console.log(data);
          })
          .catch(error => {
            console.error('There was a problem with your fetch operation:', error);
          });
  
          
          // -+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+


        });
      },

      // get index and data from li element after
      // hovering over li with the mouse or using
      // arrow keys ↓ | ↑
      onSelectedItem: ({ index, element, object }) => {
        console.log("onSelectedItem:", index, element, object);
      },

      // the method presents no results element
      noResults: ({ currentValue, template }) =>
        template(`<li>No results found: "${currentValue}"</li>`),
    });
    //-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+

    var disp_dist = 55;
    // console.log("this is out of the function" + disp_dist);
    //-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+
  </script>
</body>

</html>