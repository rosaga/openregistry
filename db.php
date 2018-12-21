<?php

// This is the db connect file
$servername = "localhost";
$username = "root";
$password = "@Microsoft2010";
$database ="masomo bora";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>