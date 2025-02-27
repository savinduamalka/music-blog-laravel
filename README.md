# Music Blog 
A Laravel-based application designed to manage and showcase music albums and songs.

## Features
- User management with different roles (admin, artist).
- CRUD operations for songs and albums.
- Session tracking.
- User authentication for Artists and Admins.

### Artists can:
- Add new albums and songs.
- Update their own albums and songs.
- Delete their own albums and songs.

### Admins can:
- View all albums and songs.
- Perform CRUD operations on any album or song.

### Database integration for managing music data.

### Security Features:
- Passwords are hashed using Laravel's built-in hashing mechanism for secure storage.
- Authentication is secured with Web Tokens.

### Field Validations:
- All input fields are validated to ensure data integrity (e.g., required fields, data types, and length constraints).

## Technologies Used
- Framework: Laravel
- Database: MySQL
- Version Control: Git & GitHub

## Getting Started
1. Clone this repository.
2. Install dependencies: `composer install`.
3. Set up a `.env` file and run `php artisan migrate`.
4. Run the development server: `php artisan serve`.




