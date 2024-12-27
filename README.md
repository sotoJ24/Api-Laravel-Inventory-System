
# API-Laravel-Inventory-System

The **API-Laravel-Inventory-System** is a RESTful API built with Laravel to streamline inventory management. It provides endpoints to handle products, categories, and stock levels, making it easy to integrate with various frontends or third-party applications.

## Features

- **Product Management**: CRUD operations for products in your inventory.  
- **Category Management**: Organize your inventory into categories for better management.  
- **Stock Control**: Track stock levels and update them dynamically.  
- **RESTful API**: Easily connect with other applications via structured endpoints.  

## Requirements

Before running the application, ensure you have the following installed:

- **PHP**: Version 8.1 or higher  
- **Composer**: Dependency manager for PHP  
- **Postman** (or any API testing tool): To test API endpoints  
- **MySQL or any SQL database**  
- **XAMPP or similar stack** (optional for local development)  

## Installation Steps

Follow these steps to set up the API on your local machine:

1. **Clone the Repository**  
   ```bash
   git clone https://github.com/sotoJ24/Api-Laravel-Inventory-System.git
   cd Api-Laravel-Inventory-System
   ```

2. **Install Dependencies**  
   Run the following command to install PHP dependencies:  
   ```bash
   composer install
   ```

3. **Environment Setup**  
   Copy the `.env.example` file to create a new `.env` file:  
   ```bash
   cp .env.example .env
   ```  
   Update the `.env` file with your database configuration:  
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=inventory_system
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Generate Application Key**  
   ```bash
   php artisan key:generate
   ```

5. **Run Migrations**  
   Create the database tables by running:  
   ```bash
   php artisan migrate
   ```

6. **Run the Application**  
   Start the local development server:  
   ```bash
   php artisan serve
   ```  
   Access the API at [http://127.0.0.1:8000](http://127.0.0.1:8000).

## API Documentation

Use a tool like Postman to test the following API endpoints:

### Endpoints Overview:

#### Products
- **GET** `/api/products` - List all products  
- **POST** `/api/products` - Create a new product  
- **GET** `/api/products/{id}` - Retrieve a specific product  
- **PUT** `/api/products/{id}` - Update a product  
- **DELETE** `/api/products/{id}` - Delete a product  

#### Categories
- **GET** `/api/categories` - List all categories  
- **POST** `/api/categories` - Create a new category  
- **GET** `/api/categories/{id}` - Retrieve a specific category  
- **PUT** `/api/categories/{id}` - Update a category  
- **DELETE** `/api/categories/{id}` - Delete a category  

## Laravel Documentation

For detailed Laravel framework documentation, visit: [Laravel Documentation](https://laravel.com/docs).

## Contributing

Contributions are welcome! If you encounter any issues or have feature requests, feel free to open an issue or submit a pull request.
