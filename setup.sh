#!/bin/bash

# Install back-end dependencies
echo "Installing back-end dependencies..."
cd back-end || exit
composer install

# Configure the .env file
echo "Configuring the .env file..."
cp .env.example .env
php artisan key:generate

# Run migrations and seeders
echo "Running migrations and seeders..."
php artisan migrate
php artisan db:seed

# Start the back-end server
echo "Starting the back-end server..."
php artisan serve &

# Install front-end dependencies
echo "Installing front-end dependencies..."
cd ../front-end || exit
npm install

# Start the front-end server
echo "Starting the front-end server..."
npm run dev