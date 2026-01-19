# MAKALAH

## **SISTEM INFORMASI MANAJEMEN ADMIN DASHBOARD CRUD MENGGUNAKAN LARAVEL 12 DAN BOOTSTRAP 5**

Disusun oleh:
Tim Developer Laravel CRUD System

---

## **ABSTRAK**

Makalah ini membahas tentang pengembangan sistem informasi manajemen admin dashboard dengan fitur CRUD (Create, Read, Update, Delete) menggunakan framework Laravel 12 dan Bootstrap 5. Sistem ini dirancang untuk mempermudah pengelolaan data pada aplikasi berbasis web melalui antarmuka yang intuitif dan modern. Proses pengembangan mengikuti pola arsitektur MVC (Model-View-Controller) yang merupakan standar industri dalam pengembangan aplikasi web modern. Sistem ini mencakup manajemen produk, kategori, pesanan, dan pengguna dengan fitur lengkap seperti validasi data, pagination, pencarian real-time, dan format mata uang Rupiah.

**Kata Kunci:** Laravel, Bootstrap, CRUD, MVC, Web Application

---

## **BAB I**
## **PENDAHULUAN**

### **1.1 Latar Belakang**

Perkembangan teknologi informasi yang pesat telah membawa perubahan signifikan dalam cara pengelolaan data organisasi. Kebutuhan akan sistem informasi yang efisien dan efektif untuk mengelola data operasional menjadi semakin penting. Sistem manajemen berbasis web menyediakan solusi yang fleksibel dan dapat diakses dari berbagai lokasi, memungkinkan pengelolaan data secara real-time.

Laravel sebagai framework PHP yang populer menyediakan struktur yang elegan dan tools yang powerful untuk pengembangan aplikasi web. Dilengkapi dengan Bootstrap 5 untuk antarmuka pengguna yang responsif dan modern, Laravel memungkinkan developer membangun sistem CRUD (Create, Read, Update, Delete) dengan cepat dan aman.

### **1.2 Rumusan Masalah**

Berdasarkan latar belakang di atas, rumusan masalah dalam makalah ini adalah:

1. Bagaimana merancang arsitektur sistem manajemen admin dashboard menggunakan Laravel 12?
2. Bagaimana mengimplementasikan operasi CRUD untuk manajemen data produk, kategori, pesanan, dan pengguna?
3. Bagaimana mengintegrasikan Bootstrap 5 untuk menciptakan antarmuka pengguna yang responsif dan modern?
4. Bagaimana menerapkan konsep MVC dalam pengembangan sistem ini?

### **1.3 Tujuan Penulisan**

Tujuan penulisan makalah ini adalah:

1. Mendeskripsikan arsitektur dan struktur sistem manajemen admin dashboard menggunakan Laravel 12
2. Menjelaskan implementasi operasi CRUD pada berbagai modul data
3. Menampilkan integrasi Bootstrap 5 dalam pembuatan antarmuka pengguna
4. Menganalisis penerapan konsep MVC dalam pengembangan sistem

### **1.4 Manfaat Penelitian**

Manfaat yang diharapkan dari penulisan makalah ini adalah:

1. **Secara Teoretis:** Memberikan kontribusi terhadap pengembangan ilmu pengetahuan di bidang rekayasa perangkat lunak, khususnya pengembangan aplikasi web berbasis framework.
2. **Secara Praktis:** Menjadi referensi bagi developer dalam membangun sistem manajemen berbasis web menggunakan Laravel dan Bootstrap.

---

## **BAB II**
## **TINJAUAN PUSTAKA**

### **2.1 Framework Laravel**

Laravel adalah framework aplikasi web dengan sintaks yang ekspresif dan elegan. Laravel menyederhanakan tugas-tugas umum dalam pengembangan web seperti autentikasi, routing, session, dan caching. Laravel versi 12 yang digunakan dalam project ini merupakan versi terbaru dengan berbagai peningkatan fitur dan performa.

**Keunggulan Laravel:**
- Sistem Routing yang powerful
- Eloquent ORM untuk pengelolaan database
- Blade Template Engine untuk view
- Built-in validation dan security features
- Artisan CLI untuk automasi

### **2.2 Bootstrap 5**

Bootstrap adalah framework CSS yang paling populer di dunia untuk pengembangan desain responsif dan mobile-first. Bootstrap 5 memberikan komponen UI yang siap pakai dan sistem grid yang fleksibel.

**Fitur Utama Bootstrap 5:**
- Responsive grid system
- Prebuilt components (cards, modals, forms, dll)
- Bootstrap Icons
- Utility classes
- Customizable via CSS variables

### **2.3 Konsep MVC (Model-View-Controller)**

MVC adalah pola arsitektur yang memisahkan aplikasi menjadi tiga komponen utama:

1. **Model:** Representasi data dan business logic. Berinteraksi dengan database.
2. **View:** Antarmuka pengguna. Menampilkan data kepada user.
3. **Controller:** Logika aplikasi. Menghubungkan Model dan View.

### **2.4 CRUD Operations**

CRUD adalah singkatan dari empat operasi dasar dalam pengelolaan data:

- **Create:** Membuat data baru
- **Read:** Membaca/menampilkan data
- **Update:** Mengubah data yang sudah ada
- **Delete:** Menghapus data

### **2.5 Database dan Migration**

Database adalah kumpulan data yang terorganisir. Laravel menggunakan Eloquent ORM dan Migration untuk mengelola struktur database. Migration memungkinkan developer untuk version control skema database.

---

## **BAB III**
## **METODOLOGI PENELITIAN**

### **3.1 Metode Pengembangan**

Metode yang digunakan dalam pengembangan sistem ini adalah **Software Development Life Cycle (SDLC)** dengan pendekatan iteratif.

### **3.2 Tahapan Pengembangan**

#### **3.2.1 Tahap Perencanaan (Planning)**

Tahap ini mencakup:
- Analisis kebutuhan sistem
- Menentukan fitur-fitur yang akan dibangun
- Menentukan teknologi yang akan digunakan

**Spesifikasi Sistem:**
- Backend: Laravel 12 (PHP 8.2+)
- Frontend: Bootstrap 5.3.2
- Database: SQLite
- Icons: Bootstrap Icons 1.11.1

#### **3.2.2 Tahap Desain (Design)**

Tahap ini mencakup perancangan:
- Struktur database (Database Schema)
- Arsitektur MVC
- User Interface (UI/UX)
- Routing dan URL structure

#### **3.2.3 Tahap Implementasi (Implementation)**

Pada tahap ini, sistem dikoding sesuai dengan desain yang telah dibuat. Implementasi dilakukan dengan pendekatan MVC.

#### **3.2.4 Tahap Pengujian (Testing)**

Pengujian sistem mencakup:
- Functional testing
- Integration testing
- User acceptance testing

#### **3.2.5 Tahap Deployment (Deployment)**

Sistem siap digunakan setelah melalui tahap pengujian yang memadai.

---

## **BAB IV**
## **HASIL DAN PEMBAHASAN**

### **4.1 Struktur Project**

```
crud-lavboost/
├── app/
│   ├── Helpers/
│   │   └── CurrencyHelper.php      # Helper format mata uang
│   ├── Http/
│   │   └── Controllers/
│   │       ├── DashboardController.php
│   │       ├── ProductController.php
│   │       ├── CategoryController.php
│   │       ├── OrderController.php
│   │       └── UserController.php
│   └── Models/
│       ├── Product.php
│       ├── Category.php
│       ├── Order.php
│       └── User.php
├── database/
│   ├── migrations/                  # Schema database
│   └── seeders/                     # Data sample
├── resources/
│   └── views/
│       └── admin/
│           ├── layouts/
│           │   └── app.blade.php    # Main layout
│           ├── dashboard.blade.php
│           ├── products/
│           ├── categories/
│           ├── orders/
│           └── users/
└── routes/
    └── web.php                       # Route definitions
```

### **4.2 Konfigurasi Database**

#### **4.2.1 File composer.json**

File [composer.json](../composer.json) berisi konfigurasi project dan dependencies:

```json
{
    "name": "laravel/laravel",
    "type": "project",
    "require": {
        "php": "^8.2",
        "laravel/framework": "^12.0",
        "laravel/tinker": "^2.10.1"
    },
    "autoload": {
        "psr-4": {
            "App\\": "app/",
            "Database\\Factories\\": "database/factories/",
            "Database\\Seeders\\": "database/seeders/"
        }
    }
}
```

**Penjelasan Kode:**
- `"php": "^8.2"` - Project memerlukan PHP versi 8.2 atau lebih tinggi
- `"laravel/framework": "^12.0"` - Menggunakan Laravel versi 12
- **autoload** - Konfigurasi autoloading class dengan PSR-4

#### **4.2.2 Migration: Products Table**

File: [database/migrations/2026_01_19_045409_create_products_table.php](../database/migrations/2026_01_19_045409_create_products_table.php)

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();                    // Primary key auto-increment
            $table->string('name');           // Kolom nama produk (VARCHAR 255)
            $table->text('description');      // Kolom deskripsi (TEXT)
            $table->decimal('price', 10, 2);  // Kolom harga (DECIMAL 10,2)
            $table->integer('quantity');      // Kolom jumlah (INT)
            $table->timestamps();             // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');    // Drop table products
    }
};
```

**Penjelasan Kode:**
- `Schema::create('products', ...)` - Membuat tabel baru bernama 'products'
- `$table->id()` - Membuat primary key dengan nama 'id' (BIGINT UNSIGNED, AUTO_INCREMENT)
- `$table->string('name')` - Kolom VARCHAR dengan panjang default 255 karakter
- `$table->text('description')` - Kolom TEXT untuk deskripsi panjang
- `$table->decimal('price', 10, 2)` - Kolom DECIMAL dengan 10 digit total, 2 digit di belakang koma. Contoh: 99999999.99
- `$table->integer('quantity')` - Kolom INTEGER untuk jumlah stok
- `$table->timestamps()` - Membuat dua kolom: `created_at` dan `updated_at` (TIMESTAMP)
- `Schema::dropIfExists()` - Menghapus tabel jika ada (dipanggil saat rollback)

**Database Schema Result:**
```sql
CREATE TABLE products (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    quantity INT NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
```

### **4.3 Model: Eloquent ORM**

#### **4.3.1 Model Product**

File: [app/Models/Product.php](../app/Models/Product.php)

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
    ];
}
```

**Penjelasan Kode:**
- `namespace App\Models;` - Model berada di namespace App\Models
- `extends Model` - Product mewarisi class Model dari Eloquent ORM
- **$fillable** - Array yang berisi kolom-kolom yang boleh diisi melalui mass assignment (create/update)

**Konsep Mass Assignment:**
Mass assignment adalah teknik mengisi model dengan array data. Contoh:

```php
// Tanpa mass assignment (tidak efisien)
$product = new Product();
$product->name = 'Laptop';
$product->description = 'Laptop Gaming';
$product->price = 15000000;
$product->quantity = 10;
$product->save();

// Dengan mass assignment (efisien)
Product::create([
    'name' => 'Laptop',
    'description' => 'Laptop Gaming',
    'price' => 15000000,
    'quantity' => 10
]);
```

#### **4.3.2 Model Order**

File: [app/Models/Order.php](../app/Models/Order.php)

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_number',
        'customer_name',
        'customer_email',
        'customer_phone',
        'total_amount',
        'status',
        'notes',
    ];

    protected $casts = [
        'total_amount' => 'decimal:2',
    ];
}
```

**Penjelasan Kode Tambahan:**
- **$casts** - Array untuk type casting atribut model
- `'total_amount' => 'decimal:2'` - Mengubah kolom total_amount menjadi tipe decimal dengan 2 digit di belakang koma saat diakses dari model

### **4.4 Controller: Business Logic**

#### **4.4.1 ProductController**

Controller adalah tempat business logic berada. [ProductController.php](../app/Http/Controllers/ProductController.php) meng-handle semua request terkait produk.

##### **Method: index() - Menampilkan Semua Data**

```php
public function index()
{
    // Query database: ambil semua produk, urutkan terbaru, pagination 10 per halaman
    $products = Product::orderBy('created_at', 'desc')->paginate(10);

    // Return view dengan mengirim data produk menggunakan compact()
    return view('admin.products.index', compact('products'));
}
```

**Penjelasan Kode:**
- `Product::orderBy('created_at', 'desc')` - Mengurutkan data berdasarkan kolom created_at secara descending (terbaru di atas)
- `.paginate(10)` - Membagi data menjadi halaman-halaman, 10 data per halaman
- `compact('products')` - Membuat array asosiatif `['products' => $products]`
- `view('admin.products.index', ...)` - Me-render file Blade dari `resources/views/admin/products/index.blade.php`

**Query SQL yang dihasilkan:**
```sql
SELECT * FROM products ORDER BY created_at DESC LIMIT 10 OFFSET 0;
```

##### **Method: create() - Menampilkan Form Create**

```php
public function create()
{
    // Return view form create (form input data produk baru)
    return view('admin.products.create');
}
```

**Penjelasan:**
Method ini hanya menampilkan form kosong untuk input data baru. Tidak ada query database di sini.

##### **Method: store() - Menyimpan Data Baru**

```php
public function store(Request $request)
{
    // VALIDASI INPUT dari form
    $request->validate([
        'name' => 'required|string|max:255',        // Nama wajib, string, max 255
        'description' => 'required|string',         // Deskripsi wajib, string
        'price' => 'required|numeric|min:0',        // Harga wajib, angka, min 0
        'quantity' => 'required|integer|min:0',     // Quantity wajib, integer, min 0
    ]);

    // SIMPAN DATA KE DATABASE
    Product::create($request->all());

    // REDIRECT ke halaman list produk dengan pesan sukses
    return redirect()->route('products.index')
        ->with('success', 'Product created successfully.');
}
```

**Penjelasan Kode:**
- **$request->validate()** - Validasi input dari form. Jika gagal, otomatis redirect back dengan error message
  - `required` - Field wajib diisi
  - `string` - Harus berupa string
  - `max:255` - Maksimal 255 karakter
  - `numeric` - Harus berupa angka
  - `integer` - Harus berupa integer
  - `min:0` - Minimal 0
- **Product::create($request->all())** - Membuat record baru di database dengan data dari form
- **redirect()->route('products.index')** - Redirect ke route dengan nama 'products.index'
- **->with('success', 'message')** - Menyimpan flash message yang akan ditampilkan sekali setelah redirect

**Alur Data:**
```
User isi form → Submit → Validasi → Simpan ke DB → Redirect dengan pesan sukses
```

##### **Method: show() - Menampilkan Detail Satu Data**

```php
public function show(Product $product)
{
    // Return view detail produk dengan data produk
    return view('admin.products.show', compact('product'));
}
```

**Penjelasan Kode:**
- **Route Model Binding** - Laravel otomatis mencari produk berdasarkan ID dari URL
- Contoh URL: `/products/5` → Laravel otomatis menjalankan `Product::find(5)`
- Jika tidak ditemukan, otomatis 404 Not Found

##### **Method: edit() - Menampilkan Form Edit**

```php
public function edit(Product $product)
{
    // Return view form edit dengan data produk
    return view('admin.products.edit', compact('product'));
}
```

**Penjelasan:**
Method ini menampilkan form edit yang sudah terisi dengan data produk yang akan diedit.

##### **Method: update() - Mengupdate Data**

```php
public function update(Request $request, Product $product)
{
    // VALIDASI INPUT dari form (sama seperti store)
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'quantity' => 'required|integer|min:0',
    ]);

    // UPDATE DATA DI DATABASE
    $product->update($request->all());

    // REDIRECT ke halaman list produk dengan pesan sukses
    return redirect()->route('products.index')
        ->with('success', 'Product updated successfully.');
}
```

**Penjelasan Kode:**
- **$product->update()** - Mengupdate record yang sudah ada di database
- Query SQL yang dihasilkan:
```sql
UPDATE products SET name = ?, description = ?, price = ?, quantity = ?, updated_at = ? WHERE id = ?
```

##### **Method: destroy() - Menghapus Data**

```php
public function destroy(Product $product)
{
    // HAPUS DATA DARI DATABASE
    $product->delete();

    // REDIRECT ke halaman list produk dengan pesan sukses
    return redirect()->route('products.index')
        ->with('success', 'Product deleted successfully.');
}
```

**Penjelasan Kode:**
- **$product->delete()** - Menghapus record dari database
- Query SQL yang dihasilkan:
```sql
DELETE FROM products WHERE id = ?
```

#### **4.4.2 DashboardController**

File: [app/Http/Controllers/DashboardController.php](../app/Http/Controllers/DashboardController.php)

```php
<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_products' => Product::count(),
            'total_categories' => Category::count(),
            'total_orders' => Order::count(),
            'total_users' => User::count(),
            'pending_orders' => Order::where('status', 'pending')->count(),
            'completed_orders' => Order::where('status', 'completed')->count(),
            'total_revenue' => Order::where('status', 'completed')->sum('total_amount'),
            'recent_orders' => Order::orderBy('created_at', 'desc')->take(5)->get(),
            'recent_products' => Product::orderBy('created_at', 'desc')->take(5)->get(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
```

**Penjelasan Kode:**
- `Product::count()` - Menghitung total jumlah produk
- `Order::where('status', 'pending')->count()` - Menghitung pesanan dengan status pending
- `Order::where('status', 'completed')->sum('total_amount')` - Menjumlahkan total_amount dari pesanan completed
- `->take(5)->get()` - Mengambil 5 data terakhir
- **Query examples:**
```sql
-- count()
SELECT COUNT(*) FROM products;

-- where()->count()
SELECT COUNT(*) FROM orders WHERE status = 'pending';

-- sum()
SELECT SUM(total_amount) FROM orders WHERE status = 'completed';

-- take()->get()
SELECT * FROM orders ORDER BY created_at DESC LIMIT 5;
```

### **4.5 Routing**

File: [routes/web.php](../routes/web.php)

```php
<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});

// Admin Dashboard
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

// Resource Routes
Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::resource('orders', OrderController::class);
Route::resource('users', UserController::class);
```

**Penjelasan Kode:**
- `Route::get('/', ...)` - Route untuk URL root (/), redirect ke dashboard
- `Route::get('/admin/dashboard', [DashboardController::class, 'index'])` - Route untuk GET request ke /admin/dashboard, memanggil method index di DashboardController
- `->name('admin.dashboard')` - Memberi nama route untuk referensi di aplikasi
- `Route::resource('products', ProductController::class)` - Membuat multiple route untuk CRUD operations

**Resource Routes yang dihasilkan:**

| HTTP Method | URL | Controller Method | Route Name | Description |
|-------------|-----|-------------------|------------|-------------|
| GET | /products | index | products.index | List all products |
| GET | /products/create | create | products.create | Form create |
| POST | /products | store | products.store | Save new product |
| GET | /products/{id} | show | products.show | Show single product |
| GET | /products/{id}/edit | edit | products.edit | Form edit |
| PUT/PATCH | /products/{id} | update | products.update | Update product |
| DELETE | /products/{id} | destroy | products.destroy | Delete product |

### **4.6 View: Blade Template Engine**

#### **4.6.1 Layout Utama**

File: [resources/views/admin/layouts/app.blade.php](../resources/views/admin/layouts/app.blade.php)

Bagian penting dari layout:

```blade
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard - Laravel CRUD')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
```

**Penjelasan Blade Directives:**
- `{{ csrf_token() }}` - Menampilkan CSRF token untuk keamanan form
- `@yield('title', 'default')` - Placeholder yang bisa diisi oleh child view
- `{{ $variable }}` - Menampilkan variable (escaped untuk keamanan XSS)

**Sidebar dengan Active State:**

```blade
<ul class="components">
    <li>
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-house-door"></i>
            Dashboard
        </a>
    </li>
    <li>
        <a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.*') ? 'active' : '' }}">
            <i class="bi bi-box-seam"></i>
            Products
            <span class="badge bg-white text-primary">{{ App\Models\Product::count() }}</span>
        </a>
    </li>
</ul>
```

**Penjelasan:**
- `{{ route('route.name') }}` - Mengenerate URL berdasarkan nama route
- `request()->routeIs('pattern')` - Mengecek apakah route saat ini cocok dengan pattern
- `{{ App\Models\Product::count() }}` - Menampilkan jumlah produk secara real-time

**Flash Messages:**

```blade
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong class="me-2"><i class="bi bi-exclamation-triangle-fill"></i></strong>
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
```

**Penjelasan:**
- `@if(session('success'))` - Mengecek apakah ada flash session 'success'
- `@if($errors->any())` - Mengecek apakah ada error validasi
- `@foreach($errors->all() as $error)` - Loop menampilkan semua error
- `{{ session('key') }}` - Menampilkan data dari session

#### **4.6.2 View Index Products**

File: [resources/views/admin/products/index.blade.php](../resources/views/admin/products/index.blade.php)

```blade
@extends('admin.layouts.app')

@section('title', 'Products - Admin Dashboard')

@section('page-title', 'Products')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="mb-1">Products Management</h4>
        <p class="text-muted mb-0">Manage your product inventory</p>
    </div>
    <a href="{{ route('products.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-2"></i>Add Product
    </a>
</div>

<div class="card table-card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>All Products</span>
        <div class="search-box">
            <input type="text" class="form-control" placeholder="Search products..." id="searchInput">
            <i class="bi bi-search"></i>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0" id="productsTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Created At</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            <strong>{{ $product->name }}</strong>
                        </td>
                        <td>
                            <p class="mb-0 text-truncate" style="max-width: 200px;">{{ Str::limit($product->description, 50) }}</p>
                        </td>
                        <td>
                            <span class="fw-bold text-success">{{ \App\Helpers\CurrencyHelper::formatRupiah($product->price) }}</span>
                        </td>
                        <td>
                            <span class="badge bg-{{ $product->quantity > 10 ? 'success' : ($product->quantity > 0 ? 'warning' : 'danger') }}">
                                {{ $product->quantity }} in stock
                            </span>
                        </td>
                        <td>{{ $product->database->format('M d, Y') }}</td>
                        <td class="text-end">
                            <div class="btn-group" role="group">
                                <a href="{{ route('products.show', $product) }}"
                                   class="btn btn-sm btn-info"
                                   data-bs-toggle="tooltip"
                                   title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('products.edit', $product) }}"
                                   class="btn btn-sm btn-warning"
                                   data-bs-toggle="tooltip"
                                   title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('products.destroy', $product) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this product?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            data-bs-toggle="tooltip"
                                            title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <i class="bi bi-inbox fs-1 text-muted d-block mb-3"></i>
                            <h5 class="text-muted">No products found</h5>
                            <p class="text-muted">Get started by creating your first product.</p>
                            <a href="{{ route('products.create') }}" class="btn btn-primary">
                                <i class="bi bi-plus-lg me-2"></i>Add Product
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($products->hasPages())
    <div class="card-footer bg-white">
        {{ $products->appends(request()->query())->links() }}
    </div>
    @endif
</div>
@endsection
```

**Penjelasan Blade Directives:**
- `@extends('admin.layouts.app')` - Menginherit layout dari file app.blade.php
- `@section('title', '...')` - Mengisi section 'title' di layout
- `@section('content') ... @endsection` - Mengisi section 'content' di layout
- `@forelse($products as $product) ... @empty ... @endforelse` - Loop dengan handling jika kosong
- `@if($products->hasPages()) ... @endif` - Conditional: jika ada pagination
- `@csrf` - Menambahkan hidden input CSRF token
- `@method('DELETE')` - Menambahkan hidden input _method dengan value DELETE

**Penjelasan Logic:**
- `Str::limit($text, 50)` - Membatasi text sampai 50 karakter
- `\App\Helpers\CurrencyHelper::formatRupiah($amount)` - Format angka ke Rupiah
- Ternary operator: `$product->quantity > 10 ? 'success' : 'warning'` - Jika > 10 maka 'success', else 'warning'
- `{{ $products->appends(request()->query())->links() }}` - Pagination links dengan maintain query parameters

**JavaScript untuk Search:**

```blade
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const table = document.getElementById('productsTable');

        searchInput.addEventListener('keyup', function() {
            const filter = searchInput.value.toLowerCase();
            const rows = table.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) {
                const row = rows[i];
                const cells = row.getElementsByTagName('td');
                let found = false;

                for (let j = 0; j < cells.length; j++) {
                    const cell = cells[j];
                    if (cell) {
                        const textValue = cell.textContent || cell.innerText;
                        if (textValue.toLowerCase().indexOf(filter) > -1) {
                            found = true;
                            break;
                        }
                    }
                }

                row.style.display = found ? '' : 'none';
            }
        });
    });
</script>
@endpush
```

**Penjelasan:**
- `@push('scripts')` - Menambahkan kode ke section 'scripts' di layout
- Event listener 'keyup' pada input search
- Loop melalui semua baris tabel
- Sembunyikan baris yang tidak cocok dengan search query
- Real-time client-side filtering

#### **4.6.3 View Dashboard**

File: [resources/views/admin/dashboard.blade.php](../resources/views/admin/dashboard.blade.php)

```blade
@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard Overview')

@section('content')
<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stats-card">
            <div class="card-body d-flex align-items-center">
                <div class="icon primary">
                    <i class="bi bi-box-seam"></i>
                </div>
                <div class="ms-3">
                    <h3>{{ $stats['total_products'] }}</h3>
                    <p>Total Products</p>
                </div>
            </div>
        </div>
    </div>
    <!-- ... more stats cards ... -->
</div>
```

**Penjelasan:**
- `{{ $stats['total_products'] }}` - Menampilkan total produk dari controller
- Bootstrap Grid System:
  - `col-xl-3` - Pada extra large, ambil 3 dari 12 kolom (25%)
  - `col-md-6` - Pada medium, ambil 6 dari 12 kolom (50%)
- Bootstrap Icons untuk visual

### **4.7 Helper Functions**

File: [app/Helpers/CurrencyHelper.php](../app/Helpers/CurrencyHelper.php)

```php
<?php

namespace App\Helpers;

class CurrencyHelper
{
    /**
     * Format number to Indonesian Rupiah
     *
     * @param float $amount
     * @return string
     */
    public static function formatRupiah($amount)
    {
        return 'Rp ' . number_format($amount, 0, ',', '.');
    }

    /**
     * Format number to Indonesian Rupiah with decimal
     *
     * @param float $amount
     * @param int $decimals
     * @return string
     */
    public static function formatRupiahDecimal($amount, $decimals = 2)
    {
        return 'Rp ' . number_format($amount, $decimals, ',', '.');
    }
}
```

**Penjelasan:**
- `number_format($amount, 0, ',', '.')` - Format angka dengan:
  - 0 digit di belakang koma
  - ',' sebagai decimal separator
  - '.' sebagai thousand separator

**Contoh Penggunaan:**
```php
// Di controller atau view
$price = 1500000;
echo CurrencyHelper::formatRupiah($price);
// Output: Rp 1.500.000

echo CurrencyHelper::formatRupiahDecimal($price, 2);
// Output: Rp 1.500.000,00
```

### **4.8 Database Seeding**

File: [database/seeders/DatabaseSeeder.php](../database/seeders/DatabaseSeeder.php)

```php
<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Call seeder lain
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            OrderSeeder::class,
        ]);

        // Buat admin user
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'status' => 'active',
            'role' => 'admin',
        ]);

        // Buat 5 regular users
        User::factory(5)->create([
            'status' => 'active',
        ]);
    }
}
```

**Penjelasan:**
- `$this->call([...])` - Menjalankan seeder lain
- `User::factory()->create([...])` - Membuat 1 user dengan data custom
- `User::factory(5)->create([...])` - Membuat 5 users
- Factory menggunakan Faker library untuk data dummy

**Menjalankan Seeder:**
```bash
php artisan db:seed
# Atau
php artisan migrate:fresh --seed
```

### **4.9 Keamanan Aplikasi**

#### **4.9.1 CSRF Protection**

Laravel menyediakan proteksi CSRF (Cross-Site Request Forgery) secara otomatis:

```blade
<form action="{{ route('products.destroy', $product) }}" method="POST">
    @csrf
    @method('DELETE')
    <!-- form fields -->
</form>
```

**Penjelasan:**
- `@csrf` directive menambahkan hidden input:
```html
<input type="hidden" name="_token" value="...">
```
- Laravel memvalidasi token ini pada setiap POST request
- Mencegah request dari domain berbahaya

#### **4.9.2 XSS Protection**

Blade template engine otomatis escape output:

```blade
{{ $user_input }}  <!-- Escaped -->
{!! $user_input !!}`` <!-- Not escaped (use with caution) -->
```

#### **4.9.3 SQL Injection Protection**

Eloquent ORM menggunakan prepared statements:

```php
// Aman - Eloquent menggunakan prepared statements
Product::where('name', $userInput)->get();

// Aman - Parameter binding
DB::select('SELECT * FROM products WHERE name = ?', [$userInput]);
```

#### **4.9.4 Validation**

Validasi input untuk mencegah data yang tidak valid:

```php
$request->validate([
    'email' => 'required|email',
    'price' => 'required|numeric|min:0',
]);
```

### **4.10 Fitur-fitur Sistem**

#### **4.10.1 Pagination**

Pagination memungkinkan data ditampilkan per halaman:

```php
// Controller
$products = Product::orderBy('created_at', 'desc')->paginate(10);
```

```blade
<!-- View -->
{{ $products->links() }}
```

**Query SQL yang dihasilkan:**
```sql
-- Halaman 1
SELECT * FROM products ORDER BY created_at DESC LIMIT 10 OFFSET 0;

-- Halaman 2
SELECT * FROM products ORDER BY created_at DESC LIMIT 10 OFFSET 10;
```

#### **4.10.2 Real-time Search**

Pencarian client-side menggunakan JavaScript:

```javascript
searchInput.addEventListener('keyup', function() {
    const filter = searchInput.value.toLowerCase();
    // Filter logic...
});
```

#### **4.10.3 Status Badges**

Menampilkan status dengan warna berbeda:

```blade
<span class="badge bg-{{ $product->quantity > 10 ? 'success' : 'warning' }}">
    {{ $product->quantity }} in stock
</span>
```

Logic:
- quantity > 10: Badge hijau (success)
- quantity <= 10: Badge kuning (warning)
- quantity = 0: Badge merah (danger)

### **4.11 Flow Diagram Sistem**

```
┌─────────┐
│  USER   │
└────┬────┘
     │ HTTP Request
     ▼
┌─────────────────────────────────────┐
│              ROUTES                 │
│         (routes/web.php)            │
└────┬────────────────────────────────┘
     │ Route to Controller
     ▼
┌─────────────────────────────────────┐
│           CONTROLLER                │
│  (ProductController, OrderCtrl...)  │
│  - Validate Input                   │
│  - Business Logic                   │
└────┬────────────────────────────────┘
     │ Eloquent ORM
     ▼
┌─────────────────────────────────────┐
│             MODEL                   │
│   (Product, Order, Category...)     │
│  - Database Operations              │
└────┬────────────────────────────────┘
     │ SQL Query
     ▼
┌─────────────────────────────────────┐
│           DATABASE                  │
│         (SQLite/MySQL)              │
└─────────────────────────────────────┘

     │ Data Return
     ▼
┌─────────────────────────────────────┐
│           VIEW                      │
│      (Blade Templates)              │
│  - Render HTML                      │
│  - Display Data                     │
└────┬────────────────────────────────┘
     │ HTML Response
     ▼
┌─────────────────────────────────────┐
│          BROWSER                    │
│       (Display UI)                  │
└─────────────────────────────────────┘
```

---

## **BAB V**
## **PENUTUP**

### **5.1 Kesimpulan**

Berdasarkan pembahasan dalam makalah ini, dapat disimpulkan bahwa:

1. **Sistem Berhasil Dibangun:** Sistem manajemen admin dashboard CRUD berhasil dikembangkan menggunakan Laravel 12 dan Bootstrap 5 dengan fitur lengkap untuk manajemen produk, kategori, pesanan, dan pengguna.

2. **Arsitektur MVC Tercapai:** Penerapan pola MVC (Model-View-Controller) berjalan dengan baik, memisahkan business logic, data access, dan presentation layer secara efektif.

3. **Fitur CRUD Lengkap:** Semua operasi CRUD (Create, Read, Update, Delete) berfungsi dengan baik, didukung validasi input, pagination, dan pencarian real-time.

4. **UI/UX Modern:** Antarmuka pengguna menggunakan Bootstrap 5 menghasilkan tampilan yang responsif, modern, dan user-friendly dengan warna-warna konsisten dan komponen yang interaktif.

5. **Keamanan Terjamin:** Sistem menerapkan berbagai fitur keamanan Laravel seperti CSRF protection, XSS protection, SQL injection prevention, dan validasi input.

6. **Code Quality:** Kode yang dihasilkan bersih, terstruktur, dan mengikuti best practices dari Laravel dan konsep OOP.

### **5.2 Saran**

Beberapa saran untuk pengembangan selanjutnya:

1. **Autentikasi & Autorisasi:** Menambahkan sistem login dan role-based access control (RBAC) untuk keamanan lebih lanjut.

2. **Export/Import:** Menambahkan fitur export data ke Excel/CSV dan import dari file.

3. **Advanced Filtering:** Menambahkan filter multi-kriteria dan date range picker.

4. **Audit Log:** Mencatat semua aktivitas user untuk audit trail.

5. **API Development:** Mengembangkan REST API untuk mobile app atau integrasi sistem lain.

6. **Testing:** Menambahkan automated testing (PHPUnit) untuk meningkatkan reliability.

7. **Caching:** Mengimplementasikan caching (Redis) untuk meningkatkan performa.

8. **Notifications:** Menambahkan sistem notifikasi email atau browser untuk event penting.

---

## **DAFTAR PUSTAKA**

1. Taylor Otwell. (2024). *Laravel Documentation - Version 12.x*. Retrieved from https://laravel.com/docs

2. The Bootstrap Authors. (2023). *Bootstrap 5 Documentation*. Retrieved from https://getbootstrap.com/docs/5.3/

3. Otto, M. (2023). *Bootstrap Icons - Version 1.11*. Retrieved from https://icons.getbootstrap.com/

4. PHP Framework. (2024). *Eloquent ORM Documentation*. Laravel Documentation.

5. W. Jason Gilmore. (2023). *Easy Laravel 5: A Guide to the Latest Version of the Laravel Framework.

6. Matt Stauffer. (2023). *Laravel: Up and Running: A Framework for Building Modern PHP Apps.

7. FreeCodeCamp. (2024). *Model-View-Controller (MVC) Pattern*.

---

## **LAMPIRAN**

### **Lampiran 1: Struktur Database Lengkap**

```sql
-- Table: products
CREATE TABLE products (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    quantity INT NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

-- Table: categories
CREATE TABLE categories (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    slug VARCHAR(255) NOT NULL,
    is_active TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

-- Table: orders
CREATE TABLE orders (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    order_number VARCHAR(255) NOT NULL,
    customer_name VARCHAR(255) NOT NULL,
    customer_email VARCHAR(255) NOT NULL,
    customer_phone VARCHAR(20) NOT NULL,
    total_amount DECIMAL(10,2) NOT NULL,
    status VARCHAR(20) NOT NULL,
    notes TEXT,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

-- Table: users
CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    status VARCHAR(20) NOT NULL,
    role VARCHAR(20) NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
```

### **Lampiran 2: Perintah Artisan yang Berguna**

```bash
# Server
php artisan serve                    # Start development server

# Database
php artisan migrate                  # Run migrations
php artisan migrate:fresh            # Drop all tables & re-run migrations
php artisan migrate:rollback         # Rollback last migration
php artisan migrate:refresh          # Rollback & migrate again
php artisan db:seed                  # Run database seeders

# Clear Cache
php artisan view:clear               # Clear compiled views
php artisan config:clear             # Clear config cache
php artisan route:clear              # Clear route cache
php artisan cache:clear              # Clear application cache

# Route
php artisan route:list               # List all routes
php artisan route:cache              # Cache routes

# Generate
php artisan make:controller Name     # Generate controller
php artisan make:model Name          # Generate model
php artisan make:migration name      # Generate migration

# Tinker (Interactive Shell)
php artisan tinker                   # Interactive REPL
```

### **Lampiran 3: Validasi Rules yang Umum**

```php
// Common validation rules
$request->validate([
    // Required
    'field' => 'required',

    // String
    'name' => 'required|string|max:255|min:3',

    // Number
    'price' => 'required|numeric|min:0|max:999999.99',

    // Integer
    'quantity' => 'required|integer|min:0',

    // Email
    'email' => 'required|email|unique:users,email',

    // Date
    'date' => 'required|date|after:today',

    // File
    'image' => 'required|image|mimes:jpg,png|max:2048', // max 2MB

    // Enum
    'status' => 'required|in:pending,processing,completed,cancelled',

    // Array
    'tags' => 'required|array|min:1|max:5',
    'tags.*' => 'string|max:50',
]);
```

---

**TANGGAL: 19 Januari 2026**

**OLEH: Tim Developer**

**VERSI DOKUMEN: 1.0**
