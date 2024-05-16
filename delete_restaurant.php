<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM restaurants WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: full_list.php");
    exit();
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
