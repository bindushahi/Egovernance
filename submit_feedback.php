<?php
// Connect to the MySQL database
$conn = mysqli_connect("localhost", "root", "", "road safety monitoring system");

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the form data
$licensePlateNo = $_POST['license_plate_no'];
$vehicle = $_POST['vehicle'];
$driverName = $_POST['driver_name'];
$rating = $_POST['rating'];
$category = $_POST['category'];
$description = $_POST['description'];

// Create a timestamp
$timestamp = date('Y-m-d H:i:s');

$query = "INSERT INTO driverfeedback (License_Plate_No, Vehicle, Driver_Name, Rating, category, Description, Datetime) VALUES ('$licensePlateNo', '$vehicle', '$driverName', '$rating', '$category', '$description', '$timestamp')";

$result = mysqli_query($conn, $query);

if ($result) {
    echo "Driver reported successfully";
    header("Location: index.html");
    exit;
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
