<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $cuisine_type = $_POST['cuisine_type'];
    $price_range = $_POST['price_range'];
    $rating = $_POST['rating'];
    $website = $_POST['website'];

    $sql = "UPDATE restaurants SET name='$name', location='$location', cuisine_type='$cuisine_type', price_range='$price_range', rating='$rating', website='$website' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: full_list.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM restaurants WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Restaurant</title>
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
        <h1>Edit Restaurant</h1>
        <form action="edit_restaurant.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="name">Restaurant Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" value="<?php echo $row['location']; ?>" required>

            <label for="cuisine_type">Cuisine Type:</label>
            <input type="text" id="cuisine_type" name="cuisine_type" value="<?php echo $row['cuisine_type']; ?>" required>

            <label for="price_range">Price Range:</label>
            <select id="price_range" name="price_range">
                <option value="low" <?php if ($row['price_range'] == 'low') echo 'selected'; ?>>Low</option>
                <option value="medium" <?php if ($row['price_range'] == 'medium') echo 'selected'; ?>>Medium</option>
                <option value="high" <?php if ($row['price_range'] == 'high') echo 'selected'; ?>>High</option>
            </select>

            <label for="rating">Rating:</label>
            <input type="number" id="rating" name="rating" min="1" max="5" value="<?php echo $row['rating']; ?>" required>

            <label for="website">Website:</label>
            <input type="url" id="website" name="website" value="<?php echo $row['website']; ?>">

            <button type="submit">Update Restaurant</button>
        </form>
    </div>
    <script>
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
}
?>
