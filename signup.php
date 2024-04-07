<?php

// Handle form submission
// if (isset($_POST['submit'])) {
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "restaurant_review";

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $userpassword = $_POST['password'];

    // Create connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare statement and bind parameters
    $stmt = $conn->prepare("INSERT INTO reviewer (reviewer_firstname, reviewer_lastname, reviewer_username, reviewer_email, reviewer_password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $firstname, $lastname, $username, $email, $userpassword);

    // Execute statement
    if ($stmt->execute()) {
        echo "Registration successful";
    } else {
        echo "Registration failed. Try again";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
 //   }

//    echo "PHP working";




?>
