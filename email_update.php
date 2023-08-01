<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proposal";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['email']) && isset($_POST['email'])) {
    $email = $_POST['email'];
    $email = $_POST['email'];

    $checkEmailQuery = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmailQuery);

    if ($result->num_rows > 0) {
        
        $sql = "UPDATE users SET email='$email' WHERE email='$email'";
        if ($conn->query($sql) === TRUE) {
            // Update successful
            $message = "YOUR PASSWORD WAS RESET SUCCESSFULLY";
            $response = json_encode(array("message" => $message));
            echo $response;
        } else {
            
            $error_message = "Error updating password: " . $conn->error;
            $error_response = json_encode(array("error" => $error_message));
            echo $error_response;
        }
    } else {
        
        $message = "THE EMAIL DOES NOT EXIST";
        $response = json_encode(array("message" => $message));
        echo $response;
    }
} else {
    
    $message = "Incomplete data";
    $response = json_encode(array("message" => $message));
    echo $response;
}


$conn->close();
?>
