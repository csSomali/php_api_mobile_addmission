<?php
$HostName = "localhost"; // Replace with your host name
$DatabaseName = "proposal"; // Replace with your database name
$HostUser = "root"; // Replace with your database username
$HostPass = ""; // Replace with your database password

$con = mysqli_connect($HostName, $HostUser, $HostPass, $DatabaseName);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

$query = "SELECT * FROM courses";
$result = mysqli_query($con, $query);

if (!$result) {
    echo "Failed to fetch data from database.";
    exit();
}

$rows = array();

while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

// Convert the array to JSON format
$jsonResponse = json_encode($rows);

// Echo the JSON response
echo $jsonResponse;

mysqli_close($con);
?>
