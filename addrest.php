<?php
session_start();

if(isset($_SESSION['role']) && $_SESSION['role'] == 'moderator') {
    // Moderator is logged in, proceed with adding the restaurant and branches

    $conn = mysqli_connect("localhost", "root", "", "restaurant_review");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get the restaurant details from the form
    $name = $_POST['name'];
    $category = $_POST['category'];
    $branches = $_POST['branches'];

    // Insert the restaurant into the restaurant table
    $sql = "INSERT INTO restaurant (restaurant_name, restaurant_category) VALUES ('$name', '$category')";
    if (mysqli_query($conn, $sql)) {
        // Get the restaurant ID
        $restaurant_id = mysqli_insert_id($conn);

        // Split the branches by comma and insert each into the branch table
        $branch_arr = explode(",", $branches);
        foreach ($branch_arr as $branch) {
            $sql = "INSERT INTO branch (restaurant_id, branch_location) VALUES ('$restaurant_id', '$branch')";
            mysqli_query($conn, $sql);
        }

        // Close the database connection
        mysqli_close($conn);

        // Redirect
        header("Location: addrest.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    // Moderator is not logged in, redirect to login page
    header("Location: moderatorlogin.html");
    exit();
}
?>
