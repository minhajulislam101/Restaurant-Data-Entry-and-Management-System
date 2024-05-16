<?php
include 'db.php';

$sql = "SELECT * FROM restaurants";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Restaurant List</title>
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
        <h2>Full Restaurant List:</h2>
        <button class='home-button' onclick="window.location.href='index.html'">Home</button>
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
            } else {
                document.body.classList.remove('dark-mode');
                document.body.classList.add('light-mode');
                modeLabel.textContent = 'Light Mode';
            }
        });

        // Initialize mode based on previous selection
        document.addEventListener('DOMContentLoaded', () => {
            if (modeToggle.checked) {
                document.body.classList.add('dark-mode');
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
