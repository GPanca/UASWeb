# Data Kendaraan Bermotor di JABAR

## Overview
The **Vehicle Dashboard Application** is a Laravel-based web application designed to manage vehicle data. This application provides separate interfaces and functionalities for two types of users: **Admin** and **User**. The admin has full control over the data, including the ability to create, update, and delete records, while the user has read-only access to the vehicle data.

---

## Features

### 1. **Admin Dashboard**
- **View All Data:** Admin can view all vehicle data in a tabular format.
- **Add New Data:** A modal form to input and save new vehicle data.
- **Edit Data:** A modal form to update existing vehicle records.
- **Delete Data:** A delete button with confirmation to remove records from the database.

### 2. **User Dashboard**
- **View Data:** Users can view vehicle data in a read-only format.
- **Simple and Informative UI:** A clean layout that allows users to focus on the data.

### 3. **Authentication**
- User authentication ensures that only authorized users can access the application.
- Role-based access control determines whether a user sees the admin or user dashboard.

### 4. **CRUD Functionality**
The application implements Create, Read, Update, and Delete operations for managing vehicle data.

### 5. **Logout Functionality**
Users can securely log out of the application.

---

## Technologies Used

- **Backend Framework:** Laravel
- **Frontend Framework:** Bootstrap (for UI design and responsiveness)
- **Database:** MySQL
- **Authentication:** Built-in Laravel authentication

---

## Installation

### Prerequisites
- PHP >= 8.0
- Composer
- MySQL
- A web server (e.g., Apache, Nginx)

### Steps
1. Clone the repository:
   ```bash
   git clone <repository-url>
   ```
2. Navigate to the project directory:
   ```bash
   cd <project-directory>
   ```
3. Install dependencies:
   ```bash
   composer install
   ```
4. Set up the `.env` file:
   ```bash
   cp .env.example .env
   ```
   Configure the database and other environment variables in the `.env` file.

5. Run migrations to create the database schema:
   ```bash
   php artisan migrate
   ```
6. Seed the database (optional, if seeds are available):
   ```bash
   php artisan db:seed
   ```
7. Start the development server:
   ```bash
   php artisan serve
   ```

---

## Usage

### Admin
1. Log in using an admin account.
2. Navigate to the admin dashboard to manage vehicle data:
   - Add new vehicles.
   - Edit existing records.
   - Delete unnecessary data.

### User
1. Log in using a user account.
2. View vehicle data in a read-only format.

---

## Folder Structure

- **Controllers:** `DashboardController`, `VehicleController` manage business logic.
- **Views:**
  - `dashboard/admin.blade.php`: Admin dashboard.
  - `dashboard/user.blade.php`: User dashboard.
- **Models:** `Vehicle` model interacts with the database.
- **Routes:** Defined in `routes/web.php` for resource routing and authentication.

---

## Author
This application was created as part of a coursework project. Contributions and feedback are welcome!
