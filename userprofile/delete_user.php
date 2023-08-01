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
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Prepare and execute the delete query
    $sql = "DELETE FROM users WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        // Delete successful
        echo "User profile deleted successfully";
    } else {
        // Error in delete
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Data not provided
    echo "Incomplete data";
}

// Close the connection
$conn->close();
?>
