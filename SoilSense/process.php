<?php
// Replace these variables with your actual database credentials
$host = "localhost";
$dbUsername = "newuser";
$dbPassword = "5565";
$dbName = "crop";

// Create a connection to the MySQL database
$mysqli = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Process the form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $co_pass=$_POST["con_password"];
    if($password === $co_pass){

    // Insert data into the database
    $query = "INSERT INTO details (username, password) VALUES ('$username', '$password')";
    if ($mysqli->query($query) === TRUE) {
        echo "<script>alert('Registration successful!')</script>";
        include("login.php");
    } else {
        echo "<script>alert('invalid registeration.')</script>";
    }
}
else{
    echo '<srcipt>alert("confirm password and password not matching")';
}
}

// Close the connection
$mysqli->close();
?>
