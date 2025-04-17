# Laravel + Livewire Shopping Application

A e-commerce application built with Laravel and Livewire.

## Features

- **Product Catalog**: Browse through products
- **User Authentication**: Secure login and registration system
- **Shopping Cart**: Real-time cart management with Livewire

## Tech Stack

- **Backend**: Laravel 12.x
- **Frontend**: Livewire + Alpine.js + Tailwindcss
- **Database**: MySQL

## Requirements

- PHP 8.4 or higher
- Composer
- Node.js & NPM
- MySQL

## Installation

1. Clone the repository
   ```
   git clone https://github.com/matheus-faustino/livewire-shop.git
   ```

2. Navigate to the project directory
   ```
   cd livewire-shop
   ```

3. Instantiate the Docker containers
    ```
    docker compose up -d --build
    ```
4. Run bash from PHP container
    ```
    docker compose exec php bash
    ```

5. Install PHP dependencies
   ```
   composer install
   ```

6. Create a copy of the `.env` file
   ```
   cp .env.example .env
   ```

7. Generate an application key
   ```
   php artisan key:generate
   ```

8. Run database migrations and seeders
   ```
   php artisan migrate --seed
   ```

9. Outside the PHP container, install NPM dependencies
   ```
   npm install
   ```

10. Init local Vite server
   ```
   npm run dev
   ```

## Usage

Visit `http://localhost:8000` in your browser to access the application.

- Create an account
- Access `http://localhost:8025` (a local mail server for testing) and proceed with e-mail verification
- Browse products and add them to your cart

## Roadmap

- [ ] Implement checkout with Stripe payment gateway
- [ ] Implement shipping calculation
- [ ] Implement administrative dashboard for system management
- [ ] Add product reviews and ratings
- [ ] Implement wishlists
- [ ] Add email notifications for orders
- [ ] Implement multi-language support
