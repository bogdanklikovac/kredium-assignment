# Kredium assignment

This is a Laravel-based project. It serves as an application template for managing clients, loans, and related data. It includes user authentication and a dashboard for administrators.

## Requirements

Before getting started, ensure you have the following installed:

- PHP (>= 8.1)
- Composer
- MySQL
- Laravel

## Installation

1. **Clone the repository:**

    ```bash
    git clone https://your-repository-url.git
    cd your-repository-folder
    ```

2. **Install PHP dependencies using Composer:**

    ```bash
    composer install
    ```

3. **Copy the example environment file:**

    ```bash
    cp .env.example .env
    ```

4. **Generate the application key:**

    ```bash
    php artisan key:generate
    ```

5. **Set up the database:**

    - Update your `.env` file with your database configuration (DB_DATABASE, DB_USERNAME, DB_PASSWORD, etc.).
    - Run the database migrations:

    ```bash
    php artisan migrate
    ```

6. **Set up the database:**

    - Update your `.env` file with your database configuration (DB_DATABASE, DB_USERNAME, DB_PASSWORD, etc.).
    - Run the database migrations:

    ```bash
    php artisan migrate
    ```

7. **Run all seeders:**

    ```bash
    php artisan db:seed

    ```
8. ** Install the Node.js dependencies

Install the Node.js dependencies:

```bash
npm install
```

9. **Run development server:**

    ```bash
    npm run dev
    ```

10. **Run the application locally:**

    ```bash
    php artisan serve
    ```

   Your application should now be available at [http://localhost:8000](http://localhost:8000).

## Available Routes

- **Login Page**: `/login`
- **Dashboard**: `/dashboard`
- **Client List**: `/clients`
- **Loan Reports**: `/report`

