<?php
// Replace DB_HOST, DB_USER, DB_PASS, and DB_NAME with your database credentials
$conn = mysqli_connect("DB_HOST", "DB_USER", "DB_PASS", "DB_NAME");

// Get the form data
$datetime = $_POST['reportDateTime'];
$location = $_POST['location'];
$description = $_POST['description'];
$vehicleLicencePlate = $_POST['vehicleLicencePlate'];
$vehicletype = $_POST['vehicleType'];
$vehiclecolor=$_POST['vehicleColor'];
$drivername=$_POST['driverName'];
$drivercontact=$_POST['driverContact'];
$driverlicence=$_POST['driverLicence'];
$witnessname=$_POST['witnessName'];
$witnesscontact=$_POST['witnessContact'];
$injuries=$_POST['injuries'];
$damages=$_POST['damages'];
$photos =$_POST['photos'];
$policeReportNumber=$_POST['policeReportNumber'];
$additionalcomments=$_POST['additionalComments'];

// Insert data into the bill table
$query = "INSERT INTO accidentreports (ReportDateTime,Location,Description,VehicleLicencePlate,VehicleType,VehicleColor,DriverName,DriverContact,DriverLicense,WitnessName,WitnessContact,Injuries,Damages,Photos,AdditionalComments) 
VALUES ('$datetime',$location', '$description', '$vehicleLicencePlate', '$vehicletype', '$vehiclecolor','$drivername',
'$drivercontact','$driverlicence','$witnessname','$witnesscontact,'$injuries','$damages','$photos','$additionalcomments')";
$result = mysqli_query($conn, $query);

if ($result) {
  echo "Accident reported successfully";
} else {
  echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>