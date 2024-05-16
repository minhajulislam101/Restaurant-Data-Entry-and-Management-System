<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $cuisine_type = $_POST['cuisine_type'];
    $price_range = $_POST['price_range'];
    $rating = $_POST['rating'];
    $website = $_POST['website'];

    $sql = "INSERT INTO restaurants (name, location, cuisine_type, price_range, rating, website) VALUES ('$name', '$location', '$cuisine_type', '$price_range', '$rating', '$website')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
