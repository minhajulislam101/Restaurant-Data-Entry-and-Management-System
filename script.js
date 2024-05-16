function validateForm() {
    const name = document.getElementById('name').value;
    const location = document.getElementById('location').value;
    const cuisineType = document.getElementById('cuisine_type').value;
    const priceRange = document.getElementById('price_range').value;
    const rating = document.getElementById('rating').value;

    if (!name || !location || !cuisineType || !priceRange || !rating) {
        alert("Please fill out all fields.");
        return false;
    }
    return true;
}

document.getElementById('clearForm').addEventListener('click', function() {
    document.getElementById('restaurantForm').reset();
});

document.getElementById('anotherEntry').addEventListener('click', function() {
    document.getElementById('restaurantForm').reset();
    document.getElementById('name').focus();
});

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
