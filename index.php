<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "Contact";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect data from the form
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Prepare an SQL INSERT statement
$sql = "INSERT INTO ContactM (name, email, phone, message) 
        VALUES ('$name', '$email', '$phone', '$message')";

// Execute the query
if ($conn->query($sql) === TRUE) {
    // Redirect to the confirmation page after successful insertion
    header("Location: Confirm.html");
    exit(); // Ensure the script stops execution after the redirect
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>