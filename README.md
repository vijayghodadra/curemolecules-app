# CureMolecules Clone (Laravel)

This project is a manual clone of [CureMolecules](https://www.curemolecules.com/) built with Laravel.

## Prerequisites

To run this project, you must have the following installed on your machine:
*   [PHP](https://www.php.net/downloads) (Version 8.1 or higher)
*   [Composer](https://getcomposer.org/)

## Installation

1.  **Install Dependencies**:
    Open a terminal in this directory and run:
    ```bash
    composer install
    ```

2.  **Environment Setup**:
    Copy the example env file regarding your configuration:
    ```bash
    cp .env.example .env
    ```
    Generate application key:
    ```bash
    php artisan key:generate
    ```

3.  **Database Setup**:
    *   Create a MySQL database named `curemolecules`.
    *   Update `.env` with your database credentials (DB_DATABASE, DB_USERNAME, DB_PASSWORD).
    *   Run migrations:
        ```bash
        php artisan migrate
        ```

4.  **Run the Application**:
    ```bash
    php artisan serve
    ```
    Visit `http://localhost:8000` to see the site.

## Structure

*   `app/Http/Controllers`: Contains logic for Home, Products, and Contact pages.
*   `resources/views`: Contains the HTML (Blade) templates.
*   `routes/web.php`: Defines the URL routes.
*   `database/migrations`: Defines the database schema.
