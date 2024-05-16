![image](https://github.com/minhajulislam101/Restaurant-Data-Entry-and-Management-System/assets/62748402/667bd3ee-d1f1-4815-b03f-82d38c8fa54e)
![image](https://github.com/minhajulislam101/Restaurant-Data-Entry-and-Management-System/assets/62748402/4145766d-ada7-48a8-bcd6-6b05b8fba380)


# Restaurant Data Entry and Management System

This project is a simple web application for managing restaurant data. It includes features for adding, editing, and deleting restaurant entries, as well as searching for restaurants based on various criteria. The application also includes a dark mode and light mode toggle for better user experience.

## Features
- Add new restaurant entries with details such as name, location, cuisine type, price range, rating, and website.
- Edit existing restaurant entries.
- Delete restaurant entries.
- Search for restaurants by name, location, price range, and rating.
- Toggle between dark mode and light mode.
- Responsive design.

## Installation

To run this project locally, follow these steps:

### Prerequisites
- [XAMPP](https://www.apachefriends.org/index.html) (or any other PHP and MySQL server)
- Web browser

### Steps
1. **Clone the repository:**
    ```bash
    git clone https://github.com/minhajulislam101/restaurant_project.git
    ```

2. **Move the project folder to the XAMPP `htdocs` directory:**
    ```bash
    mv restaurant_project /path/to/xampp/htdocs/
    ```

3. **Start XAMPP:**
    - Open the XAMPP Control Panel.
    - Start the Apache and MySQL services.

4. **Create the database:**
    - Open your web browser and go to `http://localhost/phpmyadmin/`.
    - Create a new database named `restaurant_db`.

5. **Import the database schema:**
    - With the `restaurant_db` database selected, click on the `Import` tab.
    - Choose the `restaurant_db.sql` file from the project folder and import it.

6. **Configure database connection:**
    - Open `db.php` in the project folder.
    - Update the database credentials if necessary (default values are usually fine for XAMPP):
      ```php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "restaurant_db";
      ```

7. **Run the project:**
    - Open your web browser and go to `http://localhost/restaurant_project/index.html`.

## Usage

### Adding a Restaurant
1. Fill in the restaurant details in the provided form.
2. Click on the "Add Restaurant" button.

### Editing a Restaurant
1. Go to the "Full List" page to see all restaurant entries.
2. Click on the "Edit" link next to the restaurant you want to edit.
3. Update the restaurant details and click "Update Restaurant".

### Deleting a Restaurant
1. Go to the "Full List" page to see all restaurant entries.
2. Click on the "Delete" link next to the restaurant you want to delete.

### Searching for Restaurants
1. Use the search form on the main page to enter search criteria.
2. Click on the "Search" button to see the results.

### Toggling Dark Mode
1. Use the toggle switch at the top of the page to switch between dark mode and light mode.

## License
This project is open source and available under the [MIT License](LICENSE).

## Contributing
Contributions are welcome! Please open an issue or submit a pull request for any improvements or bug fixes.
