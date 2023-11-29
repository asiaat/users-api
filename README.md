<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer API Installation Guide</title>
</head>
<body>
    <h1>API Installation Guide for "Customer" Technical Specification</h1>

    <h2>Overview</h2>
    <p>This guide provides a comprehensive walkthrough for setting up the "Customer" API, a Laravel-based project, from cloning the repository to running tests. Follow these steps to ensure a smooth installation and setup process.</p>

    <h2>Prerequisites</h2>
    <ul>
        <li>PHP version 8.2.12 or higher.</li>
        <li>Composer installed on your system.</li>
    </ul>

    <h2>Step-by-Step Installation</h2>

    <h3>1. Clone the Repository:</h3>
    <p>Begin by cloning the "Customer" API repository from GitHub:</p>
    <pre><code>git clone https://github.com/asiaat/users-api.git</code></pre>

    <h3>2. Navigate to the Project Directory:</h3>
    <p>Change to the project's directory:</p>
    <pre><code>cd users-api</code></pre>

    <h3>3. Install Dependencies:</h3>
    <p>Run Composer to install the necessary dependencies:</p>
    <pre><code>composer install</code></pre>

    <h3>4. Environment Configuration:</h3>
    <p>Copy the <code>.env.example</code> file to create your <code>.env</code> file:</p>
    <pre><code>cp .env.example .env</code></pre>
    <p>Modify the <code>.env</code> file to match your local environment settings.</p>

    <h3>5. Generate Application Key:</h3>
    <p>Generate a unique application key for Laravel:</p>
    <pre><code>php artisan key:generate</code></pre>

    <h3>6. Database Configuration:</h3>
    <p>Set up your local MySQL server details in the <code>.env</code> file.</p>

    <h3>7. Run Database Migrations:</h3>
    <p>Execute the migrations to set up your database schema:</p>
    <pre><code>php artisan migrate</code></pre>

    <h3>8. Verify API Routes:</h3>
    <p>Check the API routes to ensure they are correctly set up:</p>
    <pre><code>php artisan route:list</code></pre>

    <h3>9. Run Tests:</h3>
    <p>Execute the Laravel tests to verify that everything is functioning as expected:</p>
    <pre><code>php artisan test</code></pre>

    <h2>Post-Installation</h2>
    <p>After completing these steps, your "Customer" API should be fully set up and operational in your local development environment. You can start developing and testing your API endpoints as per your project requirements.</p>

    <h2>Notes</h2>
    <ul>
        <li>Ensure that all environment variables in the <code>.env</code> file are correctly set to avoid any configuration issues.</li>
        <li>Regularly update your dependencies with Composer to maintain the latest versions.</li>
        <li>Keep your PHP version updated to the latest stable release for optimal performance and security.</li>
    </ul>
</body>
</html>
