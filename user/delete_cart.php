<?php
// Include the database connection settings
require 'helpers/setting.php';  

// Check if the 'id' parameter is present in the URL
if (isset($_GET['id'])) {
    $cart_id = $_GET['id'];

    // Sanitize the cart_id to prevent SQL injection
    $cart_id = mysqli_real_escape_string($al, $cart_id);

    // SQL query to delete the cart item where the status is 0 (pending)
    $sql = "DELETE FROM cart WHERE id = '$cart_id' AND status = 0";

    // Execute the query
    if (mysqli_query($al, $sql)) {
        header("Location: booking-1.php?message=Cart item deleted successfully.");
        exit();
    } else {
        // Log the error and query for debugging
        echo "Error deleting cart item: " . mysqli_error($al) . "<br>";
        echo "SQL Query: " . $sql;
    }
} else {
    echo "No cart item ID provided.";
}
?>