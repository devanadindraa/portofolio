#!/bin/bash

# Install PHP dependencies
composer install --no-dev --optimize-autoloader

# Install NPM dependencies
npm install

# Build assets
npm run build

# Run migrations
php artisan migrate --force

# Seed database
php artisan db:seed --force
