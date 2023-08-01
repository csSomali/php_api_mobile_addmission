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
if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['date'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $date = $_POST['date'];

    // Prepare and execute the update query
    $sql = "UPDATE users SET name='$name', email='$email', password='$password', date='$date' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        // Update successful
        echo "User profile updated successfully";
    } else {
        // Error in update
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Data not provided
    echo "Incomplete data";
}

// Close the connection
$conn->close();
?>
