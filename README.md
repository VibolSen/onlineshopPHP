# Online Shop

A simple PHP-based online shop application.

## Description
This project is a basic e-commerce platform developed using PHP, designed to showcase fundamental online shop functionalities. It includes user authentication, product browsing, a shopping cart, checkout process, and an admin panel for managing products, categories, users, and orders.

## Features
- User Authentication (Registration, Login, Logout)
- Product Catalog with Categories
- Shopping Cart functionality
- Checkout Process
- Admin Panel for:
    - Product Management (Create, Read, Update, Delete)
    - Category Management (Create, Read, Update, Delete)
    - User Management (View, Edit Roles)
    - Order Management (View, Edit Status)
- **Multi-language Support (English and Khmer)**: Users can switch between English and Khmer languages, with dynamic font loading for optimal display.

## Installation

To set up the project locally, follow these steps:

1.  **Clone the repository:**
    ```bash
    git clone https://github.com/VibolSen/onlineshopPHP.git
    cd onlineshopPHP
    ```

2.  **Set up a web server (e.g., Apache with XAMPP/WAMP/MAMP):**
    *   Place the `onlineshop` folder in your web server's document root (e.g., `htdocs` for XAMPP).

3.  **Database Setup:**
    *   Create a MySQL database named `onlineshop`.
    *   Import the `database.sql` file located in the project root into your newly created database.

4.  **Configure Database Connection:**
    *   Open `app/config/config.php` and update the database credentials if they differ from the defaults (`DB_HOST`, `DB_USER`, `DB_PASS`, `DB_NAME`).

5.  **Access the Application:**
    *   Open your web browser and navigate to `http://localhost/onlineshop/` (or your configured URL).

## Usage

### Public Area
- Browse products, add them to the cart, and proceed to checkout.
- Register and log in to manage your profile and view past orders.
- Switch between English and Khmer using the language selector in the header.

### Admin Panel
- Log in with an admin account (you can create one or modify an existing user's role in the database).
- Navigate to `http://localhost/onlineshop/admin`
- Manage products, categories, users, and orders.
- Change the admin panel language using the language selector in the admin header.

## Technologies Used
- PHP
- MySQL
- HTML5
- CSS3 (Bootstrap 4.5.2)
- JavaScript (jQuery)
- Google Fonts (Poppins, Hanuman)

## Contributing
Contributions are welcome! Please feel free to fork the repository, make your changes, and submit a pull request.

## License
[Specify your license here, e.g., MIT License]
