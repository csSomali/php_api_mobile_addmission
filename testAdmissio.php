<?php
// ... (existing PHP code)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = 'uploads/';
    $imageData = isset($_POST['Image']) ? base64_decode($_POST['Image']) : null;
    $imageName = isset($_POST['Image']) ? $_POST['StudentID'] . '.jpg' : '';

    // MySQL database connection
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'proposal';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $studentID = $_POST['StudentID'];
    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $dateOfBirth = $_POST['DateOfBirth'];
    $gender = $_POST['Gender'];
    $contactNumber = $_POST['ContactNumber'];
    $email = $_POST['Email'];
    $address = $_POST['Address'];
    $nationality = $_POST['Nationality'];
    $admissionStatus = $_POST['AdmissionStatus'];

    $sql = "INSERT INTO students (StudentID, FirstName, LastName, DateOfBirth, Gender, ContactNumber, Email, Address, Nationality, AdmissionStatus, Image)
            VALUES ('$studentID', '$firstName', '$lastName', '$dateOfBirth', '$gender', '$contactNumber', '$email', '$address', '$nationality', '$admissionStatus', ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("b", $imageData);

    if ($stmt->execute()) {
        echo 'Data inserted successfully';
    } else {
        echo 'Error inserting data: ' . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
