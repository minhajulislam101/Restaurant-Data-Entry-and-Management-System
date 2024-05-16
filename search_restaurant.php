<?php
include 'db.php';

$search = $_GET['search'];
$search_location = $_GET['search_location'];
$search_review_count = $_GET['search_review_count'];
$search_price_range = $_GET['search_price_range'];
$search_rating = $_GET['search_rating'];

$sql = "SELECT * FROM restaurants WHERE name LIKE '%$search%'";

if (!empty($search_location)) {
    $sql .= " AND location LIKE '%$search_location%'";
}

if (!empty($search_review_count)) {
    $sql .= " AND review_count = '$search_review_count'";
}

if (!empty($search_price_range)) {
    $sql .= " AND price_range = '$search_price_range'";
}

if (!empty($search_rating)) {
    $sql .= " AND rating = '$search_rating'";
}

$result = $conn->query($sql);

echo "<div class='container'>";
if ($result->num_rows > 0) {
    echo "<h2>Search Results:</h2>";
    echo "<table class='results-table'><tr><th>Name</th><th>Location</th><th>Cuisine Type</th><th>Price Range</th><th>Rating</th><th>Review Count</th><th>Website</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["name"]. "</td><td>" . $row["location"]. "</td><td>" . $row["cuisine_type"]. "</td><td>" . $row["price_range"]. "</td><td>" . $row["rating"]. "</td><td>" . $row["review_count"]. "</td><td><a href='" . $row["website"]. "' target='_blank'>Website</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "<p>No results found.</p>";
}
echo "<button class='back-button' onclick='goBack()'>Go Back</button>";
echo "</div>";

$conn->close();
?>
<script>
    function goBack() {
        window.history.back();
    }
</script>
