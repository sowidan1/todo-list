# Laravel To-Do List API

A simple To-Do List API built using Laravel.

## Table of Contents

- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)

## Features

- User authentication (registration and login)
- CRUD operations for to-do items
- Mark to-do items as complete

## Requirements

- PHP >= 8.3
- Composer
- Laravel 11
- MySQL
## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/sowidan1/todo-list.git
2. Install dependencies:
   ```bash
    composer install
3. Copy the .env.example file to .env:
   ```bash
    cp .env.example .env
4. Generate the application key:
   ```bash
    php artisan key:generate
5. Configure your database settings in the .env file:
   ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
4. Migrate the tables
   ```bash
   php artisan migrate
5. Start the Local Development Server:
   ```bash
   php artisan serve
3. **Access the apis:**
    `http://127.0.0.1:8000/api/`.
