<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
    $city = $_POST['city'];
    $contact_no = $_POST['contact_no'];
    $address = $_POST['address'];

    
    $conn = new mysqli('localhost', 'root', '', 'database_name');
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

   
    $sql = "INSERT INTO users (name, email, password, city, contact_no, address) 
            VALUES ('$name', '$email', '$password', '$city', '$contact_no', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo "Signup successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
