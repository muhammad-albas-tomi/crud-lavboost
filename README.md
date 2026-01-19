# Laravel Admin Dashboard CRUD System

Sistem manajemen admin dashboard lengkap dengan 4 modul CRUD menggunakan Laravel 12 dan Bootstrap 5.

## 📋 Fitur Utama

- **Dashboard** - Statistik real-time dengan cards dan grafik
- **Products Management** - CRUD lengkap untuk manajemen produk
- **Categories Management** - CRUD lengkap untuk manajemen kategori
- **Orders Management** - CRUD lengkap untuk manajemen pesanan
- **Users Management** - CRUD lengkap untuk manajemen user dengan status dan role

## 🛠️ Tech Stack

- **Backend**: Laravel 12 (PHP 8.5+)
- **Frontend**: Bootstrap 5.3.2
- **Icons**: Bootstrap Icons 1.11.1
- **Database**: SQLite
- **Package Manager**: Composer

## 📦 Prasyarat

Sebelum menjalankan project ini, pastikan sudah terinstall:

- PHP >= 8.2
- Composer
- SQLite (default di PHP)

## 🚀 Instalasi

### 1. Clone Repository

\`\`\`bash
git clone <repository-url>
cd crud-lavboost
\`\`\`

### 2. Install Dependencies

\`\`\`bash
composer install
\`\`\`

### 3. Setup Environment

File `.env` sudah terkonfigurasi dengan SQLite secara default.

### 4. Run Migrations

\`\`\`bash
php artisan migrate
\`\`\`

### 5. Seed Database (Opsional)

\`\`\`bash
php artisan db:seed
\`\`\`

Data sample:

- 3 Categories
- 5 Products
- 3 Orders
- 6 Users (1 admin + 5 users)

### 6. Start Development Server

\`\`\`bash
php artisan serve
\`\`\`

Akses: `http://localhost:8000`

## 🎯 Modul

### Dashboard

- Statistik real-time
- Recent products & orders
- Quick actions

### Products

- name, description, price, quantity
- Format Rupiah
- Stock indicator

### Categories

- name, description, slug, is_active
- Auto-generate slug

### Orders

- order_number, customer info, total_amount, status, notes
- Status: pending, processing, completed, cancelled
- Format Rupiah

### Users

- name, email, password, status, role
- Status: active, inactive, suspended, pending
- Role: admin, user

## 💻 Helper Rupiah

\`\`\`php
\\App\\Helpers\\CurrencyHelper::formatRupiah($amount)
// Output: Rp 1.500.000
\`\`\`

## 🔧 Perintah Penting

\`\`\`bash

# Server

php artisan serve

# Migrate

php artisan migrate
php artisan migrate:fresh

# Seed

php artisan db:seed
php artisan migrate:fresh --seed

# Clear cache

php artisan view:clear
php artisan route:list
\`\`\`

Happy Coding! 🚀
