<?php
// Replace these variables with your actual database credentials
$host = "localhost";
$username = "newuser";
$password = "5565";
$database = "crop";

$enteredUsername = $_POST["username"];
$enteredPassword = $_POST["password"];

// Create a connection to the MySQL database
$mysqli = new mysqli($host, $username, $password, $database);

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
// Function to validate user credentials
    // Sanitize user input to prevent SQL injection

    // Fetch user information from the database
    $query = "SELECT * FROM details WHERE username='$username'";
    $result = $mysqli->query($query);

    if ($result && $result->num_rows > 0) {
        // Verify the entered password against the stored hash
        $row = $result->fetch_assoc();
        if ($password === $row['password']) {
            include("first.html");
        } else  {
            echo '<script>alert("invalind credentails.");</script>';
            include('login.php');
        }
    } else {
        return false; // User not found
    }
// Example usage

$mysqli->close();

?>
