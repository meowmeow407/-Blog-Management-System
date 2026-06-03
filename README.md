# Chronicle - Modern Blog & Notice Board Platform

Chronicle is a high-performance, fully responsive blogging and notice board application built using **Laravel 11**, **MySQL**, and **jQuery/AJAX**. It features a glassmorphic dark-theme by default with a fully functional light-theme toggle, dynamic filtering, and a secure administration CRUD dashboard.

---

## 🌟 Key Features

### 1. User Facing Frontend
* **Responsive Grid Layout**: Fully optimized and elegant layout for mobile, tablet, and desktop screens.
* **Instant AJAX Search & Filters**: Search posts dynamically by keyword, category tabs (e.g. Admit Card, Result, Syllabus, Job Alerts, News), or publication date without full page reloads.
* **Debounced Search**: Integrated 400ms debounce to optimize database performance while typing.
* **Light / Dark Theme Toggle**: A modern, interactive button that toggles between a glassmorphic dark mode and a clean, high-contrast light mode, persisting preferences using local storage (`localStorage`).
* **Clean Reading Experience**: Blog detail views include estimated reading duration, visual banners, and sidebars highlighting recent updates.

### 2. Admin Dashboard & Authentication
* **Security & Auth Guards**: Clean login and registration (signup) forms to manage administrators.
* **Full CRUD Management**: Authorised administrators can add new blogs, upload banners, edit content/metadata, and delete posts (which also cleans up stored media).

---

## 🚀 Setup & Installation Instructions

To run this project locally, follow these steps:

### Prerequisites
Make sure you have **PHP (>= 8.2)**, **Composer**, and **MySQL** installed on your system.

### Step 1: Clone and Install Dependencies
```bash
git clone https://github.com/meowmeow407/-Blog-Management-System.git
cd -Blog-Management-System
composer install
npm install
```

### Step 2: Configure Environment
Copy the example `.env` file and update your database credentials:
```bash
cp .env.example .env
```
Inside your `.env` file, configure your MySQL database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog_db
DB_USERNAME=root
DB_PASSWORD=your_password
```

### Step 3: Run Database Migrations and Seeders
Create the tables and seed them with 25 initial posts and a default admin user:
```bash
php artisan migrate:refresh --seed
```

### Step 4: Link Storage
Generate the symbolic link so that uploaded blog banners are accessible publicly:
```bash
php artisan storage:link
```

### Step 5: Start the Server
Launch the local development server:
```bash
php artisan serve
```
Open [http://127.0.0.1:8000](http://127.0.0.1:8000) in your web browser.

---

## 🔐 Default Admin Account
For testing and verification purposes, you can log in to the admin panel using the following seeded credentials:
* **Login URL**: `http://127.0.0.1:8000/admin/login`
* **Email Address**: `admin@blog.com`
* **Password**: `admin123`

---

## 🛠️ Built With
* **Backend**: Laravel 11
* **Frontend**: HTML5, Vanilla CSS, jQuery (AJAX)
* **Database**: MySQL
* **Icons & Fonts**: FontAwesome 6, Google Fonts (Inter & Outfit)
