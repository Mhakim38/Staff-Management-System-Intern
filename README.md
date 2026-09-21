<p align="center">
    <h1 align="center">👥 StaffHub</h1>
    <p align="center">
        <strong>Staff Management System</strong>
    </p>
</p>

<p align="center">
    A simple and organized web-based system for managing staff information,
    leave requests and workplace announcements.
</p>

---

## About StaffHub

StaffHub is a web-based **Staff Management System** developed using Laravel.

The system provides a centralized platform for managing staff information and workplace-related activities. It is designed for two types of users: **Admin** and **Staff**, with different access and functionalities.

StaffHub aims to make staff management simpler, more organized and efficient.

## User Roles

### 👨‍💼 Staff

Staff members can:

- View and update their profile
- View employment information
- Apply for leave
- Track leave request status
- View leave history
- View workplace announcements
- Change their password

### 🛠️ Admin

Administrators can:

- Add new staff
- View staff information
- Update staff information
- Delete staff records
- Manage leave requests
- Approve or reject leave applications
- Manage workplace announcements
- View administrative information

## CRUD Functionality

The main CRUD functionality of the system focuses on **Staff Management**:

- **Create** — Add new staff records
- **Read** — View staff information
- **Update** — Edit existing staff information
- **Delete** — Remove staff records

## Technologies Used

StaffHub is developed using:

- Laravel
- PHP
- MySQL
- Blade
- HTML
- CSS
- JavaScript
- Vite
- Font Awesome

## Installation

Clone the repository:

```bash
git clone https://github.com/Mhakim38/Staff-Management-System-Intern.git
```

Navigate to the project directory:

```bash
cd Staff-Management-System-Intern
```

Install PHP dependencies:

```bash
composer install
```

Install frontend dependencies:

```bash
npm install
```

Create the environment file:

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

Configure your database connection inside the `.env` file.

Then run the migrations:

```bash
php artisan migrate
```

Start Vite:

```bash
npm run dev
```

Run the Laravel development server:

```bash
php artisan serve
```

## Project Progress

- [x] Landing Page
- [x] Login Page
- [x] Registration Page
- [x] Staff Dashboard Interface
- [ ] Admin and Staff Role Management
- [ ] Staff CRUD
- [ ] Staff Profile Management
- [ ] Leave Management
- [ ] Announcement Management
- [ ] Admin Dashboard
- [ ] Database Integration

## Project Purpose

This system is developed as an internship project to demonstrate the implementation of a web-based Staff Management System using Laravel.

The project focuses on staff record management, role-based access, leave management and workplace communication through a simple and user-friendly interface.

## License

This project is developed for educational and internship purposes.
