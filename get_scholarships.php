<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proposal";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch scholarship data
$sql = "SELECT id, title, description, imageLink FROM scholarship";
$result = $conn->query($sql);

$scholarships = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $scholarships[] = $row;
    }
}

// Close the connection
$conn->close();

// Return scholarships as JSON
echo json_encode($scholarships);
?>
