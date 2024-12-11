<?php
include '../config.php'; // Include configuration file for common data

$info = "";

// Check if form is submitted
if (isset($_POST['sub'])) {
    // Extract form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $_POST['pass'];

    // Validate form inputs
    if (!empty($name) && !empty($email) && !empty($contact) && !empty($password)) {
        // Check if connection is successful
        if ($conn) {
            // Prepare and execute SQL query
            $query = "INSERT INTO customers (name, email, contact, password) VALUES ('$name', '$email', '$contact', '$password')";
            $result = mysqli_query($conn, $query);

            // Check if query execution was successful
            if ($result) {
                // Redirect to index.php with success message
                $user_id = mysqli_insert_id($conn);
                 // Store user data in session
                 $_SESSION['id'] = $user_id;
                 $_SESSION['name'] = $name;
                echo '<script>alert("Account Created Successfully. Welcome ' . $name . '"); window.location.href = "../index.php";</script>';
            } else {
                // Display error message if query execution failed
                echo '<script>alert("Email Id is already taken.");</script>';
                header("location:../index.php");
            }
        } else {
            // Display error message if database connection failed
            echo '<script>alert("Failed to connect to the database.");</script>';
            header("location:../404.html");
        }
    } else {
        // Display error message if any form field is empty
        echo '<script>alert("Email or Password is required and cannot be empty."); window.location.href = "../index.php";</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>

<body>

</body>

</html>