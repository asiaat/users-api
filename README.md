
# Customer API Installation Guide

## Overview
This guide provides a comprehensive walkthrough for setting up the "Customer" API, a Laravel-based project, from cloning the repository to running tests. Follow these steps to ensure a smooth installation and setup process.

## Prerequisites
- PHP version 8.2.12 or higher.
- Composer installed on your system.

## Step-by-Step Installation

### 1. Clone the Repository
Begin by cloning the "Customer" API repository from GitHub:
```
git clone https://github.com/asiaat/users-api.git
```

### 2. Navigate to the Project Directory
Change to the project's directory:
```
cd users-api
```

### 3. Install Dependencies
Run Composer to install the necessary dependencies:
```
composer install
```

### 4. Environment Configuration
Copy the `.env.example` file to create your `.env` file:
```
cp .env.example .env
```
Modify the `.env` file to match your local environment settings.

### 5. Generate Application Key
Generate a unique application key for Laravel:
```
php artisan key:generate
```

### 6. Database Configuration
Set up your local MySQL server details in the `.env` file.

### 7. Run Database Migrations
Execute the migrations to set up your database schema:
```
php artisan migrate
```

### 8. Verify API Routes
Check the API routes to ensure they are correctly set up:
```
php artisan route:list
```

### 9. Run Tests
Execute the Laravel tests to verify that everything is functioning as expected:
```
php artisan test
```

## Post-Installation
After completing these steps, your "Customer" API should be fully set up and operational in your local development environment. You can start developing and testing your API endpoints as per your project requirements.

## Notes
- Ensure that all environment variables in the `.env` file are correctly set to avoid any configuration issues.
- Regularly update your dependencies with Composer to maintain the latest versions.
- Keep your PHP version updated to the latest stable release for optimal performance and security.

