# Laravel Admin Dashboard - Arsitektur Project

## 📐 Overview Arsitektur

Project ini menggunakan arsitektur **MVC (Model-View-Controller)** dari Laravel dengan tambahan helper functions untuk format mata uang.

## 🏗️ Struktur Arsitektur

```
┌─────────────────────────────────────────────────────────────┐
│                         Browser                               │
└────────────────────┬────────────────────────────────────────┘
                     │
                     ▼
┌─────────────────────────────────────────────────────────────┐
│                    Routes (web.php)                          │
│              Mendefinisikan URL endpoints                    │
└────────────────────┬────────────────────────────────────────┘
                     │
                     ▼
┌─────────────────────────────────────────────────────────────┐
│                  Controllers                                 │
│         - DashboardController                                │
│         - ProductController                                  │
│         - CategoryController                                 │
│         - OrderController                                    │
│         - UserController                                     │
└───────────┬─────────────────────────────────┬───────────────┘
            │                                 │
            ▼                                 ▼
┌──────────────────────┐         ┌──────────────────────┐
│      Models          │         │      Views           │
│  - Product           │         │  - Dashboard        │
│  - Category          │         │  - Products         │
│  - Order             │         │  - Categories       │
│  - User              │         │  - Orders           │
│                      │         │  - Users            │
└──────────┬───────────┘         └──────────────────────┘
           │
           ▼
┌──────────────────────┐
│    Database (SQLite)  │
│  - products          │
│  - categories        │
│  - orders            │
│  - users             │
└──────────────────────┘
```

## 📂 Struktur Folder Lengkap

Berikut adalah struktur lengkap folder project beserta penjelasan fungsi setiap file:

```
crud-lavboost/
├── app/                                    # Aplikasi logic
│   ├── Helpers/                            # Helper classes
│   │   └── CurrencyHelper.php             # Format mata uang Rupiah
│   ├── Http/                               # HTTP layer
│   │   ├── Controllers/                    # Request handlers
│   │   │   ├── DashboardController.php    # Dashboard logic
│   │   │   ├── ProductController.php      # Products CRUD
│   │   │   ├── CategoryController.php     # Categories CRUD
│   │   │   ├── OrderController.php        # Orders CRUD
│   │   │   └── UserController.php         # Users CRUD
│   │   └── Middleware/                    # HTTP middleware
│   ├── Models/                             # Eloquent models
│   │   ├── Product.php                    # Product model
│   │   ├── Category.php                   # Category model
│   │   ├── Order.php                      # Order model
│   │   └── User.php                       # User model
│   └── Providers/                          # Service providers
├── bootstrap/                             # Framework files
│   ├── app.php                           # Application bootstrap
│   └── cache/                            # Cache files
├── config/                                # Configuration files
│   ├── app.php                           # App configuration
│   ├── database.php                      # Database config
│   └── ...
├── database/                              # Database related
│   ├── migrations/                        # Migration files
│   │   ├── 2026_01_19_045409_create_products_table.php
│   │   ├── 2026_01_19_051135_create_categories_table.php
│   │   ├── 2026_01_19_051135_create_orders_table.php
│   │   ├── 2026_01_19_060347_add_status_to_users_table.php
│   │   └── ...
│   ├── seeders/                           # Data seeder
│   │   ├── DatabaseSeeder.php             # Main seeder
│   │   ├── ProductSeeder.php              # Sample products
│   │   ├── CategorySeeder.php             # Sample categories
│   │   ├── OrderSeeder.php                # Sample orders
│   │   └── UserSeeder.php                 # (belum ada, pakai factory)
│   └── database.sqlite                    # SQLite database file
├── docs/                                  # Dokumentasi
│   ├── INDEX.md                           # Documentation index
│   ├── ARCHITECTURE.md                    # File ini
│   ├── DEVELOPER_GUIDE.md                 # Panduan developer
│   ├── API.md                             # API reference
│   └── CHANGELOG.md                       # Version history
├── public/                                # Public root
│   ├── index.php                         # Entry point
│   └── .htaccess                         # Server config
├── resources/                             # View & assets
│   ├── css/                               # (belum dipakai)
│   ├── js/                                # (belum dipakai)
│   └── views/                             # Blade templates
│       ├── admin/                         # Admin panel views
│       │   ├── layouts/
│       │   │   └── app.blade.php          # Main admin layout
│       │   ├── dashboard.blade.php        # Dashboard page
│       │   ├── products/                  # Product views
│       │   │   ├── index.blade.php        # List products
│       │   │   ├── create.blade.php       # Create form
│       │   │   ├── edit.blade.php         # Edit form
│       │   │   └── show.blade.php         # Detail view
│       │   ├── categories/                # Category views
│       │   ├── orders/                    # Order views
│       │   └── users/                     # User views
│       └── ...
├── routes/                                # Route definitions
│   ├── web.php                           # Web routes
│   ├── console.php                       # Console routes
│   └── api.php                           # API routes (belum dipakai)
├── storage/                               # File storage
│   ├── app/                              # Application files
│   ├── framework/                        # Framework files
│   └── logs/                             # Log files
├── tests/                                 # Testing files
│   ├── Feature/                          # Feature tests
│   └── Unit/                             # Unit tests
├── vendor/                               # Composer packages
├── .env                                   # Environment config
├── .env.example                           # Environment example
├── artisan                                # CLI tool
├── composer.json                          # Dependencies
├── composer.lock                          # Lock file
├── package.json                           # NPM dependencies
├── phpunit.xml                            # PHPUnit config
├── vite.config.js                         # Vite config
└── README.md                              # Project readme
```

## 📁 Penjelasan Detail Setiap Folder

### **1. app/ (Application Logic)**

Berisi seluruh logika bisnis aplikasi.

#### **app/Helpers/CurrencyHelper.php**
Helper class untuk formatting mata uang Indonesia.

**Fungsi:**
- Format angka biasa menjadi format Rupiah Indonesia
- Mendukung format dengan dan tanpa desimal
- Menggunakan titik sebagai pemisah ribuan dan koma untuk desimal

**Methods:**
- `formatRupiah($amount)` - Format ke "Rp 1.500.000"
- `formatRupiahDecimal($amount, $decimals = 2)` - Format ke "Rp 1.500.000,00"

**Digunakan di:**
- Views untuk menampilkan harga
- Dashboard untuk revenue
- Reports (future)

---

#### **app/Http/Controllers/** (Request Handlers)

Berisi controller yang menangani HTTP request dan response.

##### **DashboardController.php**
Controller untuk halaman dashboard utama.

**Methods:**
- `index()` - Menampilkan dashboard dengan statistik
  - Mengambil count semua models
  - Menghitung pending/completed orders
  - Menghitung total revenue dari completed orders
  - Mengambil 5 products dan 5 orders terbaru
  - Return view: `admin.dashboard` dengan data statistik

**Dependencies:**
- Product, Category, Order, User models

---

##### **ProductController.php**
Controller untuk CRUD products.

**Methods:**
- `index()` - Menampilkan list produk dengan pagination (10 per halaman)
- `create()` - Menampilkan form create produk
- `store(Request $request)` - Menyimpan produk baru
  - Validate: name (required), description (required), price (numeric), quantity (integer)
  - Create: Product::create($request->all())
  - Redirect: products.index dengan success message
- `show(Product $product)` - Menampilkan detail produk
- `edit(Product $product)` - Menampilkan form edit produk
- `update(Request $request, Product $product)` - Update produk
  - Validate sama seperti store
  - Update: $product->update($request->all())
  - Redirect dengan success message
- `destroy(Product $product)` - Hapus produk
  - Delete: $product->delete()
  - Redirect dengan success message

**Returns:**
- `admin.products.index`
- `admin.products.create`
- `admin.products.edit`
- `admin.products.show`

---

##### **CategoryController.php**
Controller untuk CRUD categories.

**Methods:**
- `index()` - List kategori dengan pagination
- `create()` - Form create kategori
- `store(Request $request)` - Simpan kategori baru
  - Auto-generate slug dari name menggunakan Str::slug()
  - Handle is_active checkbox
- `show(Category $category)` - Detail kategori
- `edit(Category $category)` - Form edit kategori
- `update(Request $request, Category $category)` - Update kategori
- `destroy(Category $category)` - Hapus kategori

**Features:**
- Auto-slug generation
- Active/Inactive toggle

---

##### **OrderController.php**
Controller untuk CRUD orders.

**Methods:**
- `index()` - List orders dengan pagination
- `create()` - Form create order
- `store(Request $request)` - Simpan order baru
  - Validate order_number (unique)
  - Validate customer info (name, email, phone)
  - Validate total_amount dan status
- `show(Order $order)` - Detail order
- `edit(Order $order)` - Form edit order
- `update(Request $request, Order $order)` - Update order
- `destroy(Order $order)` - Hapus order

**Status Order:**
- pending - Menunggu diproses
- processing - Sedang diproses
- completed - Selesai
- cancelled - Dibatalkan

---

##### **UserController.php**
Controller untuk CRUD users.

**Methods:**
- `index()` - List users dengan pagination
- `create()` - Form create user
- `store(Request $request)` - Simpan user baru
  - Hash password otomatis
  - Set status dan role
- `show(User $user)` - Detail user
- `edit(User $user)` - Form edit user
- `update(Request $request, User $user)` - Update user
  - Password optional (jika kosong tidak diubah)
  - Hash password jika ada input baru
- `destroy(User $user)` - Hapus user

**Features:**
- Password hashing dengan Hash::make()
- Password validation dengan confirmed rule
- Status management (active, inactive, suspended, pending)
- Role management (admin, user)

---

#### **app/Models/** (Eloquent Models)

Berisi model yang merepresentasikan database tables.

##### **Product.php**
Model untuk tabel products.

**Properties:**
- `$fillable` - name, description, price, quantity
- Mass assignment diizinkan untuk fields ini

**Relationships:**
- (Belum ada relasi ke models lain)

**Database:**
- Table: products
- Primary key: id
- Timestamps: created_at, updated_at

---

##### **Category.php**
Model untuk tabel categories.

**Properties:**
- `$fillable` - name, description, slug, is_active
- `$casts` - is_active → boolean

**Features:**
- Slug disimpan di database
- is_active sebagai boolean untuk kemudahan query

---

##### **Order.php**
Model untuk tabel orders.

**Properties:**
- `$fillable` - order_number, customer_name, customer_email, customer_phone, total_amount, status, notes
- `$casts` - total_amount → decimal(2)

**Status:**
- enum: pending, processing, completed, cancelled
- Default: pending

---

##### **User.php**
Model untuk tabel users (extends Authenticatable).

**Properties:**
- `$fillable` - name, email, password, status, role
- `$hidden` - password, remember_token (disembunyikan di JSON/array)
- `$casts` - email_verified_at → datetime, password → hashed

**Authentication:**
- Mendukung Laravel authentication
- Password otomatis hashed

**Custom Fields:**
- `status` - enum: active, inactive, suspended, pending
- `role` - string: admin, user

---

### **2. database/** (Database Layer)**

Berisi migration files dan seeder.

#### **database/migrations/** (Migration Files)

Migration untuk membuat struktur database.

##### **create_products_table.php**
Membuat tabel products.

**Fields:**
- id (bigint, primary key, auto increment)
- name (varchar 255)
- description (text)
- price (decimal 10, 2)
- quantity (integer)
- timestamps (created_at, updated_at)

**Run:** `php artisan migrate`

---

##### **create_categories_table.php**
Membuat tabel categories.

**Fields:**
- id (bigint, primary key)
- name (varchar 255)
- description (text, nullable)
- slug (varchar 255, unique)
- is_active (boolean, default true)
- timestamps

**Features:**
- Slug unique untuk URL-friendly kategori

---

##### **create_orders_table.php**
Membuat tabel orders.

**Fields:**
- id (bigint, primary key)
- order_number (varchar 255, unique)
- customer_name (varchar 255)
- customer_email (varchar 255)
- customer_phone (varchar 20)
- total_amount (decimal 10, 2)
- status (enum: pending, processing, completed, cancelled)
- notes (text, nullable)
- timestamps

**Features:**
- Order number unique untuk memastikan tidak duplikat

---

##### **add_status_to_users_table.php**
Menambah field status dan role ke tabel users.

**Fields Added:**
- status (enum: active, inactive, suspended, pending, default: pending)
- role (string, default: user)

**Location:**
- Ditambahkan setelah field email

---

#### **database/seeders/** (Data Seeders)

Berisi seeder untuk data sample/development.

##### **DatabaseSeeder.php**
Main seeder yang memanggil seeder lain.

**Function:**
- Memanggil CategorySeeder
- Memanggil ProductSeeder
- Memanggil OrderSeeder
- Membuat admin user (status: active, role: admin)
- Membuat 5 regular users (status: active)

**Run:** `php artisan db:seed`

---

##### **ProductSeeder.php**
Membuat 5 sample products.

**Data:**
- Laptop Gaming Pro - Rp 1.299.999 - 15 units
- Wireless Mouse - Rp 29.990 - 150 units
- Mechanical Keyboard - Rp 89.990 - 75 units
- 27" Monitor 4K - Rp 399.990 - 30 units
- USB-C Hub - Rp 49.990 - 200 units

---

##### **CategorySeeder.php**
Membuat 3 sample categories.

**Data:**
- Electronics
- Accessories
- Gaming

---

##### **OrderSeeder.php**
Membuat 3 sample orders.

**Data:**
- ORD-001 - Completed - Rp 1.329.980
- ORD-002 - Processing - Rp 89.990
- ORD-003 - Pending - Rp 499.990

---

### **3. resources/views/** (View Layer)**

Berisi Blade templates untuk frontend.

#### **resources/views/admin/layouts/app.blade.php**
Main layout untuk semua admin pages.

**Components:**
- Sidebar (gradient blue theme, responsive)
- Top navbar (dengan user dropdown)
- Alert messages (success/error)
- Content yield area
- Footer

**Sections:**
- `@yield('title')` - Page title
- `@yield('page-title')` - Page heading
- `@yield('content')` - Main content

**Features:**
- Active menu highlighting di sidebar
- Badge count di menu items
- Responsive sidebar collapse di mobile
- JavaScript untuk sidebar toggle dan tooltips

---

#### **resources/views/admin/dashboard.blade.php**
Dashboard overview page.

**Components:**
- 4 Stats cards dengan icons (Products, Categories, Orders, Users)
- 3 Additional stats (Pending Orders, Completed Orders, Total Revenue)
- Recent Products table (5 items terakhir)
- Recent Orders table (5 items terakhir)
- Quick Actions buttons (Add Product, Category, Order, User)

**Data:**
- $stats['total_products']
- $stats['total_categories']
- $stats['total_orders']
- $stats['total_users']
- $stats['pending_orders']
- $stats['completed_orders']
- $stats['total_revenue']
- $stats['recent_orders']
- $stats['recent_products']

---

#### **resources/views/admin/products/** (Product Views)

**index.blade.php**
- Table list produk
- Pagination (10 per halaman)
- Search box (JavaScript filtering)
- Stock indicator badges (hijau/kuning/merah)
- Format Rupiah untuk price
- Action buttons (view, edit, delete)

**create.blade.php**
- Form create produk
- Fields: name, description, price, quantity
- Validation error display
- Back button dan submit button

**edit.blade.php**
- Form edit produk
- Pre-filled dengan data existing
- Same fields seperti create
- Optional password update

**show.blade.php**
- Detail view produk
- Table info produk
- Stock quantity dengan badge
- Format Rupiah untuk price
- Action buttons

---

#### **resources/views/admin/categories/** (Category Views)

**index.blade.php**
- Table list kategori
- Status badges (Active/Inactive)
- Slug display
- Search dan pagination

**create.blade.php**
- Form create kategori
- Fields: name, description, is_active (checkbox)
- Slug auto-generate (tidak perlu input manual)

**edit.blade.php**
- Form edit kategori
- Pre-filled data
- Slug akan diregenerate saat update

**show.blade.php**
- Detail view kategori
- Status badge dengan icon

---

#### **resources/views/admin/orders/** (Order Views)

**index.blade.php**
- Table list orders
- Status badges dengan icon dan warna:
  - Pending = kuning
  - Processing = biru
  - Completed = hijau
  - Cancelled = merah
- Customer info display
- Format Rupiah untuk total_amount

**create.blade.php**
- Form create order
- Fields: order_number, customer_name, customer_email, customer_phone, total_amount, status, notes
- Status dropdown dengan pilihan

**edit.blade.php**
- Form edit order
- Pre-filled data

**show.blade.php**
- Detail view order
- Status badge besar dengan icon
- Customer information lengkap
- Format Rupiah

---

#### **resources/views/admin/users/** (User Views)

**index.blade.php**
- Table list users
- Avatar circle dengan inisial (huruf pertama nama)
- Role badges: Admin (primary biru), User (info biru muda)
- Status badges dengan icons:
  - Active = hijau + check icon
  - Inactive = abu-abu + dash icon
  - Suspended = merah + x icon
  - Pending = kuning + clock icon
- Email verification dihapus (hanya gunakan status dari CRUD)

**create.blade.php**
- Form create user
- Fields: name, email, password, password_confirmation, status, role
- Password confirmation field
- Status dan role dropdowns

**edit.blade.php**
- Form edit user
- Password optional (hanya isi jika ingin mengubah)
- Password confirmation jika password diisi
- Status dan role editable

**show.blade.php**
- Detail view user
- Large avatar circle dengan inisial
- Role dan status badges
- Email verification DIHAPUS (tidak ditampilkan)
- Joined dan updated dates

---

### **4. routes/** (Route Definitions)**

#### **routes/web.php**
Web route definitions untuk aplikasi.

**Routes:**
- `/` - Redirect ke admin.dashboard
- `/admin/dashboard` - DashboardController@index
- `/products` - Resource routes untuk ProductController
- `/categories` - Resource routes untuk CategoryController
- `/orders` - Resource routes untuk OrderController
- `/users` - Resource routes untuk UserController

**Resource Routes menghasilkan:**
- GET /products - index
- GET /products/create - create
- POST /products - store
- GET /products/{id} - show
- GET /products/{id}/edit - edit
- PUT/PATCH /products/{id} - update
- DELETE /products/{id} - destroy

---

### **5. config/** (Configuration Files)**

Berisi file konfigurasi Laravel.

**File penting:**
- `app.php` - App configuration (name, url, debug, timezone)
- `database.php` - Database connections (SQLite, MySQL, PostgreSQL)
- `mail.php` - Mail configuration

---

### **6. storage/** (File Storage)**

Berisi file yang dibuat saat runtime.

**Subdirectories:**
- `app/` - Application specific files
- `framework/` - Framework cache files
- `logs/` - Log files (laravel.log)
- `database.sqlite` - SQLite database file

---

### **7. public/** (Public Root)**

Folder yang dapat diakses langsungung via web.

**File penting:**
- `index.php` - Entry point aplikasi
- `.htaccess` - Apache configuration
- `build/` - Compiled assets (jika ada)

---

### **8. tests/** (Testing)**

Berisi test files (unit dan feature tests).

**Saat ini belum ada test files** (dapat ditambahkan dengan PHPUnit atau Pest).

---

### **9. vendor/** (Composer Dependencies)**

Berisi library dan packages dari Composer.

**Jangan di-modifikasi!**
- Package diupdate via Composer
- Menambah package: `composer require package/name`

---

## 🔄 Alur Data Lengkap

### Create Product Flow

```
1. User klik "Add Product" button
   ↓ (GET /products/create)
2. ProductController@create()
   ↓
3. View: admin.products.create (form)
   ↓
4. User isi form dan submit
   ↓ (POST /products)
5. ProductController@store()
   ├─ Validate input
   ├─ Product::create($data)
   └─ Redirect → /products dengan success message
   ↓
6. ProductController@index()
   ↓
7. View: admin.products.index (list products baru)
```

---

## 💡 Tips Memahami Project

### Untuk Backend Developer
Fokus ke:
- Controller logic
- Model relationships
- Database schema
- API documentation

### Untuk Frontend Developer
Fokus ke:
- Blade templates
- Bootstrap components
- CSS styling
- JavaScript interactivity

### Untuk Fullstack Developer
Pelajari semua urutan alur data dari request sampai response.

---

Untuk panduan development praktis, lihat [DEVELOPER_GUIDE.md](DEVELOPER_GUIDE.md) - **Quick Start** section.

Berisi logika aplikasi utama.

#### **app/Helpers/CurrencyHelper.php**
Helper class untuk formatting mata uang Rupiah.

**Fungsi:**
- `formatRupiah($amount)` - Format angka ke Rupiah tanpa desimal
- `formatRupiahDecimal($amount, $decimals = 2)` - Format angka ke Rupiah dengan desimal

**Contoh:**
```php
use App\Helpers\CurrencyHelper;

CurrencyHelper::formatRupiah(1500000);
// Output: "Rp 1.500.000"
```

#### **app/Http/Controllers/**

Berisi semua controller yang menangani request dan response.

**DashboardController.php**
- `index()` - Menampilkan dashboard dengan statistik

**ProductController.php**
- `index()` - List semua produk dengan pagination
- `create()` - Form create produk
- `store()` - Simpan produk baru
- `show()` - Detail produk
- `edit()` - Form edit produk
- `update()` - Update produk
- `destroy()` - Hapus produk

**CategoryController.php**
- `index()` - List semua kategori
- `create()` - Form create kategori
- `store()` - Simpan kategori baru dengan auto-slug
- `show()` - Detail kategori
- `edit()` - Form edit kategori
- `update()` - Update kategori
- `destroy()` - Hapus kategori

**OrderController.php**
- `index()` - List semua order
- `create()` - Form create order
- `store()` - Simpan order baru
- `show()` - Detail order
- `edit()` - Form edit order
- `update()` - Update order
- `destroy()` - Hapus order

**UserController.php**
- `index()` - List semua user
- `create()` - Form create user
- `store()` - Simpan user baru dengan password hashing
- `show()` - Detail user
- `edit()` - Form edit user
- `update()` - Update user (optional password)
- `destroy()` - Hapus user

#### **app/Models/

Berisi model Eloquent untuk interaksi dengan database.

**Product.php**
- **Fillable:** name, description, price, quantity
- **Table:** products
- **Relationships:** - (belum ada relasi)

**Category.php**
- **Fillable:** name, description, slug, is_active
- **Table:** categories
- **Casts:** is_active → boolean

**Order.php**
- **Fillable:** order_number, customer_name, customer_email, customer_phone, total_amount, status, notes
- **Table:** orders
- **Casts:** total_amount → decimal(2)

**User.php**
- **Fillable:** name, email, password, status, role
- **Table:** users
- **Hidden:** password, remember_token
- **Casts:** email_verified_at → datetime, password → hashed

### **database/**

Berisi database schema dan data seeder.

#### **database/migrations/**

Berisi semua migration files untuk membuat struktur database.

**Migration yang ada:**
1. `create_users_table` - Tabel users (Laravel default)
2. `create_cache_table` - Tabel cache (Laravel default)
3. `create_jobs_table` - Tabel jobs (Laravel default)
4. `create_products_table` - Tabel products
5. `create_categories_table` - Tabel categories
6. `create_orders_table` - Tabel orders
7. `add_status_to_users_table` - Menambah status dan role ke users

#### **database/seeders/**

Berisi seeder untuk data sample.

**DatabaseSeeder.php**
- Main seeder yang memanggil semua seeder lain

**ProductSeeder.php**
- Membuat 5 sample products

**CategorySeeder.php**
- Membuat 3 sample categories

**OrderSeeder.php**
- Membuat 3 sample orders dengan berbagai status

**UserSeeder.php**
- Belum ada (menggunakan factory di DatabaseSeeder)

### **resources/views/admin/**

Berisi semua Blade templates untuk admin panel.

#### **resources/views/admin/layouts/app.blade.php**

**Main layout** untuk semua admin pages.

**Komponen:**
- Sidebar dengan navigasi
- Top navbar dengan user dropdown
- Alert messages (success/error)
- Content yield area
- Footer

**Features:**
- Responsive sidebar (collapse di mobile)
- Active menu highlighting
- Badge count di sidebar menu

#### **resources/views/admin/dashboard.blade.php**

**Dashboard overview** dengan statistik.

**Isi:**
- 4 Stats cards (Products, Categories, Orders, Users)
- 3 Additional stats (Pending Orders, Completed Orders, Total Revenue)
- Recent Products table (5 items)
- Recent Orders table (5 items)
- Quick Actions buttons

#### **resources/views/admin/products/**

CRUD views untuk Products.

**index.blade.php**
- Table list produk dengan search
- Pagination
- Stock indicator (warna: hijau >50, kuning 20-50, merah <20)
- Action buttons (view, edit, delete)

**create.blade.php**
- Form create produk
- Fields: name, description, price, quantity
- Validation error display

**edit.blade.php**
- Form edit produk
- Pre-filled dengan existing data
- Validation error display

**show.blade.php**
- Detail view produk
- Tabel info produk
- Action buttons

#### **resources/views/admin/categories/**

CRUD views untuk Categories.

**index.blade.php**
- Table list kategori
- Status badge (Active/Inactive)
- Search dan pagination

**create.blade.php**
- Form create kategori
- Fields: name, description, is_active checkbox
- Slug auto-generate

**edit.blade.php**
- Form edit kategori
- Pre-filled data
- Slug auto-generate dari name

**show.blade.php**
- Detail view kategori
- Status badge

#### **resources/views/admin/orders/**

CRUD views untuk Orders.

**index.blade.php**
- Table list order
- Status badges (Pending, Processing, Completed, Cancelled)
- Customer info display
- Format Rupiah untuk total_amount

**create.blade.php**
- Form create order
- Fields: order_number, customer_name, customer_email, customer_phone, total_amount, status, notes
- Status select dropdown

**edit.blade.php**
- Form edit order
- Pre-filled data

**show.blade.php**
- Detail view order
- Status badge dengan icon
- Customer information lengkap

#### **resources/views/admin/users/**

CRUD views untuk Users.

**index.blade.php**
- Table list users
- Avatar dengan inisial
- Role badge (Admin/User)
- Status badge (Active/Inactive/Suspended/Pending)

**create.blade.php**
- Form create user
- Fields: name, email, password, password_confirmation, status, role

**edit.blade.php**
- Form edit user
- Password optional untuk update

**show.blade.php**
- Detail view user
- Avatar circle besar
- Role dan Status badges

### **routes/web.php**

Berisi semua web routes.

**Routes:**
- `/` - Redirect ke dashboard
- `/admin/dashboard` - Dashboard
- `/products` - Resource routes untuk products
- `/categories` - Resource routes untuk categories
- `/orders` - Resource routes untuk orders
- `/users` - Resource routes untuk users

## 🔄 Alur Data

### Alur Create Product

```
User → /products/create (GET)
      ↓
ProductController@create()
      ↓
View: products/create.blade.php (form)
      ↓
User submit form (POST)
      ↓
ProductController@store(request)
      ↓
Validation (name, description, price, quantity)
      ↓
Product::create(request->all())
      ↓
Redirect to /products dengan success message
```

### Alur Update User Status

```
User → /users/{id}/edit (GET)
      ↓
UserController@edit(user)
      ↓
View: users/edit.blade.php (form dengan status dropdown)
      ↓
User pilih status dan submit (PUT/PATCH)
      ↓
UserController@update(request, user)
      ↓
Validation (name, email, status, role)
      ↓
$user->update(request->all())
      ↓
Redirect to /users dengan success message
```

## 🔐 Keamanan

### CSRF Protection
- Otomatis di semua forms (`@csrf`)
- Token divalidasi pada setiap POST/PUT/DELETE request

### Password Hashing
- Otomatis menggunakan bcrypt
- `$data['password'] = Hash::make($data['password'])`

### Validation
- Server-side validation di controller
- Display error messages di views

### SQL Injection Protection
- Eloquent ORM otomatis escape queries
- Parameter binding di semua queries

### XSS Protection
- Blade `{{ }}` otomatis escape output
- Gunakan `{!! !!}` hanya untuk trusted HTML

## 🎨 Frontend Architecture

### Bootstrap 5 Components

**Cards**
- Stats cards di dashboard
- Table cards untuk list views
- Form cards untuk create/edit

**Badges**
- Status indicators
- Role indicators
- Stock indicators

**Tables**
- Responsive tables
- Table hover
- Table striped (opsional)

**Forms**
- Form controls
- Validation states
- Input groups (untuk price)

**Alerts**
- Success messages
- Error messages
- Dismissible alerts

### JavaScript Features

**Search Functionality**
- Inline search di semua index views
- Real-time filtering

**Tooltips**
- Initialized di admin layout
- Action button tooltips

**Confirm Dialogs**
- Delete confirmation
- `onsubmit="return confirm('...')"`

## 📊 Database Schema

### products
```
- id (bigint, PK)
- name (varchar 255)
- description (text)
- price (decimal 10,2)
- quantity (integer)
- created_at (timestamp)
- updated_at (timestamp)
```

### categories
```
- id (bigint, PK)
- name (varchar 255)
- description (text, nullable)
- slug (varchar 255, unique)
- is_active (boolean, default true)
- created_at (timestamp)
- updated_at (timestamp)
```

### orders
```
- id (bigint, PK)
- order_number (varchar 255, unique)
- customer_name (varchar 255)
- customer_email (varchar 255)
- customer_phone (varchar 20)
- total_amount (decimal 10,2)
- status (enum: pending, processing, completed, cancelled)
- notes (text, nullable)
- created_at (timestamp)
- updated_at (timestamp)
```

### users
```
- id (bigint, PK)
- name (varchar 255)
- email (varchar 255, unique)
- email_verified_at (timestamp, nullable)
- password (varchar 255)
- status (enum: active, inactive, suspended, pending, default pending)
- role (varchar 255, default user)
- remember_token (varchar 100)
- created_at (timestamp)
- updated_at (timestamp)
```

## 🚀 Flow Request

### Standard CRUD Flow

```
1. Browser Request
   ↓
2. Route (web.php)
   ↓
3. Middleware (CSRF, session, etc.)
   ↓
4. Controller
   ↓
5. Model (jika perlu database)
   ↓
6. View (Blade template)
   ↓
7. Response ke Browser
```

### Contoh: Create Product Flow

```
1. GET /products/create
   → ProductController@create()
   → Return view('admin.products.create')

2. POST /products
   → Validate request
   → Product::create($data)
   → Redirect with success message
```

## 📝 Coding Conventions

### Controllers
- Method names sesuai resource controller Laravel
- Validation di method store() dan update()
- Redirect dengan flash messages

### Models
- Use fillable property untuk mass assignment
- Casts untuk type conversion
- Eloquent conventions untuk table names

### Views
- Extend admin.layouts.app
- Yield content sections
- Use Bootstrap classes
- Icons dari Bootstrap Icons

### Routes
- Resource routes untuk CRUD
- Named routes untuk referensi
- Grouping untuk prefix (opsional)

## 🔧 Extension Points

### Menambah Modul Baru

1. Create migration
2. Create model
3. Create controller
4. Create views (index, create, edit, show)
5. Add resource route
6. Update sidebar navigation

### Menambah Field ke Model

1. Create migration
2. Run migration
3. Update fillable di model
4. Update views
5. Update validation di controller

## 📚 Resources

- [Laravel Documentation](https://laravel.com/docs)
- [Bootstrap 5 Documentation](https://getbootstrap.com/docs/5.3/)
- [Bootstrap Icons](https://icons.getbootstrap.com/)
