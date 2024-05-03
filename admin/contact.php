<?php
include "../config.php"; // Include the config file to establish database connection

if (isset($_POST["send"])) {
    $name = $_POST["name"];
    $email = $_POST["userEmail"];
    $subject = $_POST["subject"];
    $content = $_POST["content"];

    $toEmail = "pappumahato000@gmail.com";
    $mailHeaders = "From: " . $name . "<" . $email . ">\r\n";
    
    // Database query to insert contact information
    $result = mysqli_query($conn, "INSERT INTO contact (user_name, user_email, subject, content) VALUES ('$name', '$email', '$subject', '$content')");
    
    if ($result) {
        echo 'Your contact information is received successfully.';
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    
    // Sending email notification
    if (mail($toEmail, $subject, $content, $mailHeaders)) {
        $message = "Your contact information is received successfully.";
        $type = "success";
    }
}
?>
<html>
<!-- Your HTML content goes here -->

</html>