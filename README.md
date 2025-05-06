# Student Management

A web-based application for managing university students, built with Laravel 9+.

## Requirements
- PHP 8.x
- Laravel 9+
- MySQL
- Composer
- Node.js and NPM

## Setup Instructions

1. Clone the repository  
   `git clone https://github.com/prav-program/management-student.git`

2. Navigate to the project  
   `cd student-management`

3. Install dependencies  
   `composer install`  
   `npm install && npm run dev`

4. Configure `.env`  
   Copy `.env.example` to `.env` and set your DB credentials

5. Run migrations and seeders  
   `php artisan migrate --seed`

6. Start local server  
   `php artisan serve`

## Features

- Full CRUD operations for Students
- Teacher-student relationship management
- Soft delete and restore functionality
- Integrated DataTables for pagination, search, and sorting
- Authentication using Laravel UI (login, register, etc.)