<?php
$mysqli = new mysqli('localhost', 'root', '', 'proposal');


if ($mysqli->connect_errno) {
    echo json_encode(['error' => 'Failed to connect to MySQL: ' . $mysqli->connect_error]);
    exit();
}


$query = "SELECT * FROM Students";
$result = $mysqli->query($query);


if ($result) {
    $students = [];
    
    
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
    
    
    echo json_encode($students);
} else {
    echo json_encode(['error' => 'Error fetching data: ' . $mysqli->error]);
}

$mysqli->close();
?>
