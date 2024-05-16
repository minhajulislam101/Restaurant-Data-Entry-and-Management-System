<?php
include 'db.php';

// Retrieve search parameters from the GET request
$search = isset($_GET['search']) ? $_GET['search'] : '';
$search_location = isset($_GET['search_location']) ? $_GET['search_location'] : '';
$search_price_range = isset($_GET['search_price_range']) ? $_GET['search_price_range'] : '';
$search_rating = isset($_GET['search_rating']) ? $_GET['search_rating'] : '';

// Construct the SQL query with the search parameters
$sql = "SELECT * FROM restaurants WHERE name LIKE '%$search%'";

if (!empty($search_location)) {
    $sql .= " AND location LIKE '%$search_location%'";
}

if (!empty($search_price_range)) {
    $sql .= " AND price_range = '$search_price_range'";
}

if (!empty($search_rating)) {
    $sql .= " AND rating = '$search_rating'";
}

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="toggle-switch">
            <label class="switch">
                <input type="checkbox" id="modeToggle">
                <span class="slider"></span>
            </label>
            <span id="modeLabel">Light Mode</span>
        </div>
        <h2>Search Results:</h2>
        <?php
        if ($result->num_rows > 0) {
            echo "<table class='results-table'><tr><th>Name</th><th>Location</th><th>Cuisine Type</th><th>Price Range</th><th>Rating</th><th>Website</th><th>Actions</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["name"]. "</td><td>" . $row["location"]. "</td><td>" . $row["cuisine_type"]. "</td><td>" . $row["price_range"]. "</td><td>" . $row["rating"]. "</td><td><a href='" . $row["website"]. "' target='_blank'>Website</a></td><td><a href='edit_restaurant.php?id=" . $row["id"] . "'>Edit</a> | <a href='delete_restaurant.php?id=" . $row["id"] . "'>Delete</a></td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No results found.</p>";
        }
        ?>
        <button class='back-button' onclick='goBack()'>Go Back</button>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }

        const modeToggle = document.getElementById('modeToggle');
        const modeLabel = document.getElementById('modeLabel');

        modeToggle.addEventListener('change', function() {
            if (this.checked) {
                document.body.classList.remove('light-mode');
                document.body.classList.add('dark-mode');
                modeLabel.textContent = 'Dark Mode';
                localStorage.setItem('theme', 'dark');
            } else {
                document.body.classList.remove('dark-mode');
                document.body.classList.add('light-mode');
                modeLabel.textContent = 'Light Mode';
                localStorage.setItem('theme', 'light');
            }
        });

        // Initialize mode based on previous selection
        document.addEventListener('DOMContentLoaded', () => {
            const savedTheme = localStorage.getItem('theme') || 'light';
            if (savedTheme === 'dark') {
                document.body.classList.add('dark-mode');
                modeToggle.checked = true;
                modeLabel.textContent = 'Dark Mode';
            } else {
                document.body.classList.add('light-mode');
                modeLabel.textContent = 'Light Mode';
            }
        });
    </script>
</body>
</html>
<?php
$conn->close();
?>
