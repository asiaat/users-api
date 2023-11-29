
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

# Google Authentication Setup 

## Overview
This section details the configuration of Google Authentication for the API in a development environment. It involves setting up OAuth 2.0 client IDs and secrets in the Google API Console and updating the `.env` file of the Laravel application.

## Prerequisites
- A Google Cloud account with access to the API Console.
- The Laravel application with the `.env` file.

## Step-by-Step Configuration

### 1. Create OAuth 2.0 Client ID
- Go to the [Google API Console](https://console.developers.google.com/).
- Select your project or create a new one.
- Navigate to "Credentials" and click on "Create credentials".
- Choose "OAuth client ID".
- Select "Web application" as the application type.

### 2. Set Authorized JavaScript Origins
- Under "Authorized JavaScript origins", add the following URIs for local development:
  - `http://localhost:3000`
  - `http://localhost:8000`

### 3. Set Authorized Redirect URIs
- Under "Authorized redirect URIs", add the following URI for local development:
  - `http://localhost:8000/api/auth/google/callback`
- This URI is where users will be redirected after authenticating with Google in the development environment.

### 4. Obtain Client ID and Secret
- After creating the OAuth client, copy the "Client ID" and "Client Secret".

### 5. Update `.env` File
- Open the `.env` file in your Laravel application.
- Set the `GOOGLE_CLIENT_ID` and `GOOGLE_CLIENT_SECRET` with the values obtained from the Google API Console:
  ```
  GOOGLE_CLIENT_ID=your_google_client_id
  GOOGLE_CLIENT_SECRET=your_google_client_secret
  ```

## Testing the Setup
- Run your Laravel application in the development environment.
- Test the Google Authentication flow to ensure it's working correctly.

## Notes
- The OAuth 2.0 client name in the Google API Console is for identification purposes only and won't be visible to end users.
- The domains and URIs specified should be consistent with your local development environment.
- Regularly check the Google API Console for any changes or updates in the OAuth client settings.

## Troubleshooting
- If authentication fails, verify that the `GOOGLE_CLIENT_ID` and `GOOGLE_CLIENT_SECRET` are correctly set in the `.env` file.
- Ensure that the redirect URI in the Laravel application matches the one set in the Google API Console.
- Check for any domain mismatches or typos in the Google API Console settings.
- This guide focusing on local testing with `localhost` URLs. Ensure that these settings match your actual development setup.


## Post-Installation
After completing these steps, your "Customer" API should be fully set up and operational in your local development environment. You can start developing and testing your API endpoints as per your project requirements.

## Notes
- Ensure that all environment variables in the `.env` file are correctly set to avoid any configuration issues.
- Regularly update your dependencies with Composer to maintain the latest versions.
- Keep your PHP version updated to the latest stable release for optimal performance and security.

Absolutely, I can adjust the Google Authentication setup section to reflect the settings for your test/development environment. Here's the updated section:


