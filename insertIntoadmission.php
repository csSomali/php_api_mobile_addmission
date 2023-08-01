<?php 

include ("connec.php");
$json = file_get_contents('php://input');
$obj = json_decode($json, true);


$StudentID = $obj['StudentID'];
$FirstName = $obj['FirstName'];
$LastName = $obj['LastName'];
$DateOfBirth = $obj['DateOfBirth'];
$Gender = $obj['Gender'];
$ContactNumber = $obj['ContactNumber'];
$Email = $obj['Email'];
$Address = $obj['Address'];

$AdmissionStatus = $obj['AdmissionStatus'];

// Establish your database connection (example using mysqli)
$mysqli = new mysqli('localhost', 'root', '', 'proposal');

// Check for connection errors
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Prepare the insert statement
$stmt = $mysqli->prepare("INSERT INTO Students (StudentID, FirstName, LastName, DateOfBirth, Gender, ContactNumber, Email, Address, AdmissionStatus) 
                          VALUES (?, ?, ?, ?, ?, ?, ?,  ?, ?)");

// Bind the values to the statement
$stmt->bind_param("issssssss", $StudentID, $FirstName, $LastName, $DateOfBirth, $Gender, $ContactNumber, $Email, $Address,$AdmissionStatus);

// Execute the statement
if ($stmt->execute()) {
    $MSG ="Application Submited successfully!";
     $json = json_encode($MSG);
     echo $json;
} else {
    echo "Error inserting data: " . $stmt->error;
}

// Close the statement and database connection
$stmt->close();
$mysqli->close();


?>