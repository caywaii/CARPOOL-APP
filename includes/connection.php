<?php
$servername = "localhost";
$username = "";
$password = "";
$database = "carpool";
$home = "http://localhost/carpool-draft";

//Prepared Hostinger

// $servername = "localhost";
// $username = "u235219407_carpoolapp";
// $password = "carpoolApp123";
// $database = "u235219407_caywaiicarpool";
// $home = "https://carpoolapp.caryl.tech/";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
session_start();

?>