<?php
include 'connect.php';


if (isset($_POST['submit'])) {
  $agency_name = $_POST['agency_name'];
  $agency_type = $_POST['agency_type'];
  $mobile = $_POST['mobile'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $latitude = $_POST['latitude'];
  $longitude = $_POST['longitude'];

  $sql = "INSERT INTO `agencies` (`a_name`,`a_type`,`a_moblie`,`a_mail`,`a_pass`,`a_lat`,`a_lon`) values('$agency_name','$agency_type','$mobile','$email','$pass','$latitude','$longitude')";
  $result = mysqli_query($con, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <style>
    @import url(https://fonts.googleapis.com/css?family=Montserrat);

    /* Basic reset */
    * {
      margin: 0;
      padding: 0;
    }

    html {
      height: 100%;
      /* Image only BG fallback */

      /* Background = gradient + image pattern combo */
      background: linear-gradient(rgba(196, 102, 0, 0.6),
          rgba(155, 89, 182, 0.6));
    }

    body {
      font-family: montserrat, arial, verdana;
    }

    /* Form styles */
    #msform {
      width: 400px;
      margin: 50px auto;
      text-align: center;
      position: relative;
      padding: 20px;
      /* Add padding to the form if needed */
    }

    #msform fieldset {
      background: white;
      border: 0 none;
      border-radius: 3px;
      box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
      padding: 20px 30px;
      box-sizing: border-box;
      width: 80%;
      margin: 0 10%;

      /* Stacking fieldsets above each other */
      position: relative;
    }

    /* Hide all except the first fieldset */
    #msform fieldset:not(:first-of-type) {
      display: none;
    }

    /* Inputs */
    #msform input,
    #msform textarea {
      padding: 15px;
      border: 1px solid #ccc;
      border-radius: 3px;
      margin-bottom: 10px;
      width: 100%;
      box-sizing: border-box;
      font-family: montserrat;
      color: #2c3e50;
      font-size: 13px;
    }

    /* Buttons */
    #msform .action-button {
      width: 100px;
      background: #27ae60;
      font-weight: bold;
      color: white;
      border: 0 none;
      border-radius: 1px;
      cursor: pointer;
      padding: 10px;
      margin: 10px 5px;
      text-decoration: none;
      font-size: 14px;
    }

    #msform .action-button:hover,
    #msform .action-button:focus {
      box-shadow: 0 0 0 2px white, 0 0 0 3px #27ae60;
    }

    /* Headings */
    .fs-title {
      font-size: 15px;
      text-transform: uppercase;
      color: #2c3e50;
      margin-bottom: 10px;
    }

    .fs-subtitle {
      font-weight: normal;
      font-size: 13px;
      color: #666;
      margin-bottom: 20px;
    }

    /* Progressbar */
    #progressbar {
      margin-bottom: 30px;
      overflow: hidden;
      /* CSS counters to number the steps */
      counter-reset: step;
    }

    #progressbar li {
      list-style-type: none;
      color: white;
      text-transform: uppercase;
      font-size: 9px;
      width: 33.33%;
      float: left;
      position: relative;
    }

    #progressbar li:before {
      content: counter(step);
      counter-increment: step;
      width: 20px;
      line-height: 20px;
      display: block;
      font-size: 10px;
      color: #333;
      background: white;
      border-radius: 3px;
      margin: 0 auto 5px auto;
    }

    /* Progressbar connectors */
    #progressbar li:after {
      content: "";
      width: 100%;
      height: 2px;
      background: white;
      position: absolute;
      left: -50%;
      top: 9px;
      z-index: -1;
      /* Put it behind the numbers */
    }

    #progressbar li:first-child:after {
      /* Connector not needed before the first step */
      content: none;
    }

    /* Marking active/completed steps green */
    /* The number of the step and the connector before it = green */
    #progressbar li.active:before,
    #progressbar li.active:after {
      background: #27ae60;
      color: white;
    }

    /* Container for form with max height and scrollbar */
    .form-container {
      max-height: 300px;
      /* Adjust the maximum height as needed */
      overflow-y: auto;
    }

    /* Dropdown styling */
    #msform select {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      margin-bottom: 10px;
      width: 100%;
      box-sizing: border-box;
      font-family: montserrat;
      color: #2c3e50;
      font-size: 13px;
      background-color: white;
      /* Background color of the dropdown */
      appearance: none;
      /* Remove default arrow in some browsers */
    }

    /* Style the select dropdown on hover and focus */
    #msform select:hover,
    #msform select:focus {
      border-color: #27ae60;
      /* Border color on hover and focus */
    }

    /* Style the dropdown arrow */
    /* This may not work in all browsers, as some do not allow styling the arrow */
    #msform select::-ms-expand {
      display: none;
      /* Remove the default arrow in IE */
    }

    #msform select::after {
      content: "\25BC";
      /* Unicode arrow character */
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      pointer-events: none;
      color: #333;
      /* Arrow color */
    }

    /* Style the dropdown options */
    #msform select option {
      padding: 10px;
      font-size: 13px;
      background-color: white;
      /* Background color of options */
      color: #2c3e50;
      /* Text color of options */
    }

    /* Style the dropdown options on hover and selection */
    #msform select option:hover,
    #msform select option:checked {
      background-color: #27ae60;
      /* Background color on hover and selection */
      color: white;
      /* Text color on hover and selection */
    }

    #getLocationButton {
      background-color: #3498db;
      /* Background color */
      color: #fff;
      /* Text color */
      padding: 10px 20px;
      /* Padding around text */
      border: none;
      /* Remove border */
      border-radius: 5px;
      /* Rounded corners */
      cursor: pointer;
      /* Cursor style on hover */
    }

    /* Style for the location display */
    #locationDisplay {
      margin-top: 10px;
      /* Add some spacing below the button */
      font-size: 14px;
      /* Font size for the displayed location */
    }
  </style>
</head>

<body>
  <!-- multistep form -->
  <form id="msform" method="post" autocomplete="off">
    <fieldset>
      <h2 class="fs-title">Register</h2>
      <input type="text" name="agency_name" placeholder="Agency Name" />
      <select name="agency_type" id="user_type" required>
        <option value="" disabled selected>Agency Type</option>
        <option value="1">Fire Department</option>
        <option value="2">Ambulance Services</option>
        <option value="3">Medical</option>
        <option value="4">Animal Rescue</option>
        <option value="5">Police</option>
        <option value="6">NGO</option>
        <option value="7">Air Rescue</option>
        <option value="8">Volunteer Search and Rescue</option>
      </select>
      <input type="text" name="mobile" placeholder="Mobile" />
      <input type="text" name="email" placeholder="Email" />
      <input type="password" name="pass" placeholder="Password" />
      <button type="button" id="getLocationButton">Get My Location</button>
      <div id="locationDisplay"></div>
      <input type="hidden" name="latitude" id="latitude" value="">
      <input type="hidden" name="longitude" id="longitude" value="">
      <input type="submit" name="submit" class="next action-button" value="Submit" />
    </fieldset>
  </form>
  <script>
    function validateForm() {
      var agencyName = document.forms["msform"]["agency_name"].value;
      var agencyType = document.forms["msform"]["agency_type"].value;
      var mobile = document.forms["msform"]["mobile"].value;
      var email = document.forms["msform"]["email"].value;
      var pass = document.forms["msform"]["pass"].value;
      var latitude = document.forms["msform"]["latitude"].value;
      var longitude = document.forms["msform"]["longitude"].value;

      if (agencyName == "") {
        alert("Agency Name must be filled out");
        return false;
      }
      if (agencyType == "") {
        alert("Please select an Agency Type");
        return false;
      }
      if (mobile == "") {
        alert("Mobile must be filled out");
        return false;
      }
      if (email == "") {
        alert("Email must be filled out");
        return false;
      }
      return true;
    }

    document.getElementById("msform").onsubmit = validateForm;
  </script>

  <script>
    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {

          var latitude = position.coords.latitude;
          var longitude = position.coords.longitude;

          document.getElementById("latitude").value = latitude;
          document.getElementById("longitude").value = longitude;

          var locationDisplay = "Latitude: " + latitude + "<br>Longitude: " + longitude;
          document.getElementById("locationDisplay").innerHTML = locationDisplay;
        });
      } else {
        alert("Geolocation is not supported by this browser.");
      }
    }

    document.getElementById("getLocationButton").addEventListener("click", getLocation);
  </script>
</body>

</html>