<?php

// Database configuration
$host = 'localhost'; // Database host
$username = 'root'; // Database username
$password = ''; // Database password
$database = 'banjara tour and travel'; // Database name

// Attempt to establish a connection to the database
$conn = mysqli_connect($host, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Base URL configuration (optional)
$base_url = 'http://localhost/banjara_tours/'; // Base URL of the application

?>