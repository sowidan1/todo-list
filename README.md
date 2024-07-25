# Laravel To-Do List API

A simple To-Do List API built using Laravel.

## Table of Contents

- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [API Endpoints](#api-endpoints)


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
4










# Laravel To-Do List Application

This project is a simple To-Do list application built using the Laravel framework. The application allows users to register, log in, and manage their tasks. Users can add, edit, soft delete, and categorize tasks. Additionally, the project provides RESTful API endpoints for task management.

## Table of Contents

- [Setup and Configuration](#setup-and-configuration)
- [Authentication](#authentication)
- [To-Do List Functionality](#to-do-list-functionality)
- [Database](#database)
- [API Endpoints](#api-endpoints)
- [Instructions to Run the Application](#instructions-to-run-the-application)

## Setup and Configuration

1. **Clone the Repository:**

   \`\`\`bash
   git clone <repository-link>
   cd <repository-directory>
   \`\`\`

2. **Install Dependencies:**

   \`\`\`bash
   composer install
   npm install
   \`\`\`

3. **Copy .env file:**

   \`\`\`bash
   cp .env.example .env
   \`\`\`

4. **Generate Application Key:**

   \`\`\`bash
   php artisan key:generate
   \`\`\`

5. **Configure the Database Connection:**

   Open the \`.env\` file and update the following lines to match your database configuration:

   \`\`\`env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password
   \`\`\`

6. **Run Migrations:**

   \`\`\`bash
   php artisan migrate
   \`\`\`

## Authentication

Laravel's built-in authentication features have been used to implement user registration and login functionality. To enable authentication, run the following command:

\`\`\`bash
php artisan make:auth
\`\`\`

## To-Do List Functionality

The application includes the following To-Do list features:

- **Add Tasks:** Users can create new tasks with a title, description, and status (pending or completed).
- **Edit Tasks:** Users can update the title, description, and status of existing tasks.
- **Soft Delete Tasks:** Users can soft delete tasks, which can be restored later.
- **Categorize Tasks:** Users can categorize tasks (e.g., Work, Personal, Urgent).

## Database

The necessary migrations have been created to define the structure of the database. The main tables include:

- **users:** Stores user information.
- **tasks:** Stores task details, including title, description, status, and category.

To create the tables, run the following command:

\`\`\`bash
php artisan migrate
\`\`\`

## API Endpoints

The application provides the following RESTful API endpoints for managing tasks:

1. **Retrieve a List of Tasks:**

   \`\`\`http
   GET /api/tasks
   \`\`\`

2. **Create a New Task:**

   \`\`\`http
   POST /api/tasks
   \`\`\`

   Request Body:
   \`\`\`json
   {
     "title": "Task Title",
     "description": "Task Description",
     "status": "pending",
     "category": "Work"
   }
   \`\`\`

3. **Update an Existing Task:**

   \`\`\`http
   PUT /api/tasks/{id}
   \`\`\`

   Request Body:
   \`\`\`json
   {
     "title": "Updated Task Title",
     "description": "Updated Task Description",
     "status": "completed",
     "category": "Personal"
   }
   \`\`\`

4. **Soft Delete a Task:**

   \`\`\`http
   DELETE /api/tasks/{id}
   \`\`\`

5. **Restore a Soft-Deleted Task:**

   \`\`\`http
   POST /api/tasks/{id}/restore
   \`\`\`

6. **Pagination:**

   The task listing endpoint supports pagination by passing \`page\` and \`per_page\` query parameters.

   \`\`\`http
   GET /api/tasks?page=1&per_page=10
   \`\`\`

## Instructions to Run the Application

1. **Start the Local Development Server:**

   \`\`\`bash
   php artisan serve
   \`\`\`

2. **Run the Frontend Development Server:**

   \`\`\`bash
   npm run dev
   \`\`\`

3. **Access the Application:**

   Open your browser and go to \`http://127.0.0.1:8000\`.
