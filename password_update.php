<?php
// Replace these with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proposal";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the necessary POST data is provided
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the email exists in the database
    $checkEmailQuery = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmailQuery);

    if ($result->num_rows > 0) {
        // Email exists, proceed with the password update
        $sql = "UPDATE users SET password='$password' WHERE email='$email'";
        if ($conn->query($sql) === TRUE) {
            // Update successful
            $message = "YOUR PASSWORD WAS RESET SUCCESSFULLY";
            $response = json_encode(array("message" => $message));
            echo $response;
        } else {
            // Error in update
            $error_message = "Error updating password: " . $conn->error;
            $error_response = json_encode(array("error" => $error_message));
            echo $error_response;
        }
    } else {
        // Email does not exist in the database
        $message = "THE EMAIL DOES NOT EXIST";
        $response = json_encode(array("message" => $message));
        echo $response;
    }
} else {
    // Data not provided
    $message = "Incomplete data";
    $response = json_encode(array("message" => $message));
    echo $response;
}

// Close the connection
$conn->close();
?>
