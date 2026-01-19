# Laravel Admin Dashboard CRUD System

Sistem manajemen admin dashboard lengkap dengan 4 modul CRUD menggunakan Laravel 12 dan Bootstrap 5.

## 📚 Dokumentasi

Untuk dokumentasi lengkap, kunjungi:

### 🌟 Untuk Mahasiswa/Pemula:
- **[BEGINNER_GUIDE.md](docs/BEGINNER_GUIDE.md)** - ⭐ **MULAI DARI SINI!** Panduan lengkap belajar Laravel dengan project ini
- **[VISUAL_GUIDE.md](docs/VISUAL_GUIDE.md)** - Diagram visual alur kerja dan arsitektur sistem

### Untuk Developer:
- **[INDEX.md](docs/INDEX.md)** - 📋 Indeks dokumentasi (panduan membaca berdasarkan role)
- **[ARCHITECTURE.md](docs/ARCHITECTURE.md)** - Arsitektur project dan struktur folder
- **[DEVELOPER_GUIDE.md](docs/DEVELOPER_GUIDE.md)** - Panduan developer lengkap
- **[API.md](docs/API.md)** - API helpers dan functions
- **[CHANGELOG.md](docs/CHANGELOG.md)** - Changelog dan version history

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

- Statistik real-time (Products, Categories, Orders, Users)
- Recent products & orders tables
- Quick actions buttons

### Products

- Fields: name, description, price, quantity
- Format Rupiah
- Stock indicator (warna: >50 hijau, 20-50 kuning, <20 merah)
- Pagination dan search

### Categories

- Fields: name, description, slug, is_active
- Auto-generate slug dari nama
- Active/Inactive toggle
- Pagination dan search

### Orders

- Fields: order_number, customer info, total_amount, status, notes
- Status: pending, processing, completed, cancelled
- Format Rupiah
- Status badges dengan icon
- Pagination dan search

### Users

- Fields: name, email, password, status, role
- Status: active, inactive, suspended, pending
- Role: admin, user
- Avatar dengan inisial
- Password hashing

## 💻 Helper Rupiah

\`\`\`php
\\App\\Helpers\\CurrencyHelper::formatRupiah($amount)
// Output: Rp 1.500.000

\\App\\Helpers\\CurrencyHelper::formatRupiahDecimal($amount, 2)
// Output: Rp 1.500.000,00
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
php artisan config:clear
php artisan route:clear

# Routes
php artisan route:list

# Tinker (interactive shell)
php artisan tinker
\`\`\`

## 📖 Struktur Dokumentasi

### 📁 docs/

- **ARCHITECTURE.md** - Penjelasan lengkap arsitektur:
  - MVC pattern
  - Struktur folder
  - Alur data
  - Database schema
  - Frontend architecture
  - Coding conventions

- **DEVELOPER_GUIDE.md** - Panduan untuk developer:
  - Quick start
  - Cara menambah modul CRUD baru
  - Customizing views
  - Common tasks
  - Debugging
  - Best practices
  - Troubleshooting

- **API.md** - Referensi API dan helpers:
  - CurrencyHelper methods
  - Blade patterns
  - Controller patterns
  - Model patterns
  - Utility functions
  - Common queries
  - Quick reference

- **CHANGELOG.md** - Riwayat perubahan:
  - Version history
  - Features added
  - Bug fixes
  - Breaking changes

## 🎨 Fitur UI/UX

- Modern gradient sidebar (blue theme)
- Responsive design (mobile-friendly)
- Color-coded badges (status indicators)
- Real-time search di semua tables
- Tooltips pada action buttons
- Confirmation dialogs untuk delete
- Empty state messages dengan CTAs
- Toast/alert messages untuk feedback

## 🔐 Keamanan

- CSRF protection otomatis
- Password hashing (bcrypt)
- SQL injection protection
- XSS protection
- Form validation
- Authorization (role-based)

## 📊 Database

**Tables:**
- `products` - Data produk
- `categories` - Data kategori
- `orders` - Data pesanan
- `users` - Data user dengan status & role

## 🐛 Troubleshooting

### Port 8000 busy
\`\`\`bash
php artisan serve --port=8001
\`\`\`

### Database error
\`\`\`bash
php artisan migrate:fresh
\`\`\`

### Clear cache
\`\`\`bash
php artisan view:clear
\`\`\`

## 👥 Kontribusi

1. Fork project
2. Create branch feature (`git checkout -b feature/amazing-feature`)
3. Commit changes (`git commit -m 'Add amazing feature'`)
4. Push ke branch (`git push origin feature/amazing-feature`)
5. Open Pull Request

## 📝 License

Project ini dibuat untuk tujuan pembelajaran dan pengembangan.

## 👨‍💻 Support

Untuk pertanyaan atau masalah:
1. Cek dokumentasi di folder `docs/`
2. Baca [DEVELOPER_GUIDE.md](docs/DEVELOPER_GUIDE.md)
3. Cek [Laravel Documentation](https://laravel.com/docs)

---

Happy Coding! 🚀
