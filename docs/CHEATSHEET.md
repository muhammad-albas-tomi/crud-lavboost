# Laravel CRUD Cheatsheet

Cheatsheet singkat untuk referensi cepat saat development.

## 🚀 Quick Start

```bash
# Install project
composer install

# Setup database
php artisan migrate:fresh --seed

# Jalankan server
php artisan serve

# Akses: http://localhost:8000
```

---

## 📁 Struktur Project (Cepat)

```
crud-lavboost/
├── app/
│   ├── Http/Controllers/    # Logic business
│   ├── Models/              # Representasi database
│   └── Helpers/             # Utility functions
├── database/
│   ├── migrations/          # Schema database
│   └── seeders/             # Data dummy
├── resources/views/         # Blade templates (UI)
└── routes/
    └── web.php              # URL routing
```

---

## 🎯 7 Method CRUD (Resource Controller)

```php
// 1. GET /products - List semua data
public function index() { ... }

// 2. GET /products/create - Form create
public function create() { ... }

// 3. POST /products - Simpan data baru
public function store(Request $request) { ... }

// 4. GET /products/{id} - Detail satu data
public function show(Product $product) { ... }

// 5. GET /products/{id}/edit - Form edit
public function edit(Product $product) { ... }

// 6. PUT /products/{id} - Update data
public function update(Request $request, Product $product) { ... }

// 7. DELETE /products/{id} - Hapus data
public function destroy(Product $product) { ... }
```

**Buat semua 7 routes sekaligus:**
```php
// routes/web.php
Route::resource('products', ProductController::class);
```

---

## 🔧 Artisan Commands

```bash
# Server
php artisan serve

# Migrations
php artisan migrate                    # Jalankan migration
php artisan migrate:fresh              # Drop semua tabel dan migrasi ulang
php artisan migrate:rollback           # Rollback migration terakhir
php artisan make:migration create_table_name  # Buat migration baru

# Models
php artisan make:model ModelName       # Buat model

# Controllers
php artisan make:controller ControllerName            # Controller kosong
php artisan make:controller ControllerName --resource  # Controller dengan 7 CRUD methods

# Seeding
php artisan db:seed                  # Jalankan seeder
php artisan migrate:fresh --seed     # Migrate + seeder

# Cache & Config
php artisan view:clear                # Clear view cache
php artisan config:clear              # Clear config cache
php artisan route:clear               # Clear route cache
php artisan cache:clear               # Clear semua cache

# Routes
php artisan route:list                # Lihat semua routes

# Tinker (Interactive Shell)
php artisan tinker                    # Test code di terminal
```

---

## 🗄️ Eloquent Query Patterns

```php
use App\Models\Product;

// Ambil semua data
$products = Product::all();

// Ambil dengan pagination (10 per halaman)
$products = Product::paginate(10);

// Ambil satu data by ID
$product = Product::find(1);
// Atau pakai Route Model Binding otomatis

// Urutkan data
$products = Product::orderBy('created_at', 'desc')->get();
$products = Product::latest()->get();  // sama dengan orderBy('created_at', 'desc')

// Filter data (Where)
$products = Product::where('status', 'active')->get();
$products = Product::where('price', '>', 100000)->get();
$products = Product::where('quantity', '<', 20)->get();

// Search (Like)
$products = Product::where('name', 'like', '%'.$search.'%')->get();

// Multiple conditions
$products = Product::where('status', 'active')
                    ->where('price', '>', 100000)
                    ->get();

// Create data
Product::create([
    'name' => 'Laptop',
    'price' => 15000000,
    'quantity' => 50
]);

// Update data
$product = Product::find(1);
$product->update([
    'price' => 14000000
]);

// Delete data
$product = Product::find(1);
$product->delete();

// Delete multiple
Product::where('quantity', 0)->delete();

// Count
$count = Product::count();
$count = Product::where('status', 'active')->count();

// Check if exists
$exists = Product::where('email', 'user@example.com')->exists();
```

---

## 📝 Validation Rules

```php
$request->validate([
    // String
    'name' => 'required|string|max:255',

    // Email
    'email' => 'required|email|unique:users,email',

    // Numeric/Price
    'price' => 'required|numeric|min:0',

    // Integer
    'quantity' => 'required|integer|min:0',

    // Date
    'date' => 'required|date',

    // Enum/Select
    'status' => 'required|in:active,inactive,suspended',

    // Boolean
    'is_active' => 'boolean',

    // Optional (nullable)
    'description' => 'nullable|string',

    // Confirm (password_confirmation field)
    'password' => 'required|min:8|confirmed',

    // Multiple rules
    'field' => 'required|string|min:5|max:100|regex:/^[a-zA-Z]+$/',
]);
```

---

## 🎨 Blade Patterns

```blade
<!-- @extends - Gunakan layout -->
@extends('admin.layouts.app')

<!-- @section - Definisikan section -->
@section('title', 'Page Title')

@section('content')
    <!-- Content here -->
@endsection

<!-- Looping -->
@foreach($products as $product)
    <p>{{ $product->name }}</p>
@endforeach

<!-- Conditional -->
@if($product->quantity > 50)
    <span class="badge bg-success">In Stock</span>
@elseif($product->quantity > 20)
    <span class="badge bg-warning">Low Stock</span>
@else
    <span class="badge bg-danger">Out of Stock</span>
@endif

<!-- Ternary operator -->
{{ $product->is_active ? 'Active' : 'Inactive' }}

<!-- Null coalescing -->
{{ $product->description ?? 'No description' }}

<!-- Route helper -->
<a href="{{ route('products.index') }}">Products</a>
<a href="{{ route('products.show', $product) }}">View</a>

<!-- Form helpers -->
<form method="POST" action="{{ route('products.store') }}">
    @csrf  <!-- CSRF token untuk keamanan -->
    <!-- Form fields -->
</form>

<form method="POST" action="{{ route('products.update', $product) }}">
    @method('PUT')  <!-- Method spoofing untuk PUT/PATCH -->
    @csrf
    <!-- Form fields -->
</form>

<!-- Old value (setelah validation error) -->
<input type="text" name="name" value="{{ old('name') }}">

<!-- Display validation errors -->
@error('name')
    <div class="text-danger">{{ $message }}</div>
@enderror

<!-- Display flash messages -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Pagination links -->
{{ $products->links() }}

<!-- Include partial view -->
@include('partials.header')

<!-- Asset helper -->
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
```

---

## 🔀 Routing

```php
// Basic route
Route::get('/about', function () {
    return view('about');
});

// Route ke controller
Route::get('/products', [ProductController::class, 'index']);

// Resource route (7 CRUD methods)
Route::resource('products', ProductController::class);

// Resource route dengan nama khusus
Route::resource('orders', OrderController::class)
    ->parameters(['orders' => 'order']);

// Group routes dengan prefix
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/products', ProductController::class);
});

// Named routes
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

// Route parameters
Route::get('/products/{id}', [ProductController::class, 'show']);

// Route dengan multiple parameters
Route::get('/products/{product}/reviews/{review}', function ($product, $review) {
    //
});
```

---

## 🛡️ Form Security

```blade
<!-- CSRF Protection (WAJIB untuk semua forms) -->
<form method="POST">
    @csrf
    <!-- Form fields -->
</form>

<!-- Method spoofing untuk PUT/PATCH/DELETE -->
<form method="POST">
    @method('PUT')
    @csrf
    <!-- Form fields -->
</form>
```

---

## 💰 Currency Helper (Rupiah)

```php
use App\Helpers\CurrencyHelper;

// Format tanpa desimal
CurrencyHelper::formatRupiah(1500000);
// Output: Rp 1.500.000

// Format dengan desimal
CurrencyHelper::formatRupiahDecimal(1500000, 2);
// Output: Rp 1.500.000,00

// Di Blade template
{{ \App\Helpers\CurrencyHelper::formatRupiah($product->price) }}
```

---

## 🔍 Common Scenarios

### Search Functionality

```php
// Controller
public function index(Request $request)
{
    $query = Product::query();

    if ($request->has('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    $products = $query->paginate(10);
    return view('products.index', compact('products'));
}
```

### Filter by Category

```php
// Controller
public function index(Request $request)
{
    $products = Product::query();

    if ($request->has('category') && $request->category) {
        $products->where('category_id', $request->category);
    }

    $products = $products->paginate(10);
    $categories = Category::all();

    return view('products.index', compact('products', 'categories'));
}
```

### Soft Delete (Trash)

```php
// Migration
$table->softDeletes();

// Model
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
}

// Query
Product::withTrashed()->get();      // Include deleted
Product::onlyTrashed()->get();      // Only deleted
$product->restore();                // Restore deleted
$product->forceDelete();            // Permanent delete
```

### Relationships

```php
// One to Many
public function products()
{
    return $this->hasMany(Product::class);
}

// Many to One
public function category()
{
    return $this->belongsTo(Category::class);
}

// Usage
$category->products;              // Get products from category
$product->category;               // Get category from product
```

---

## 🐛 Debugging

```php
// Dump & Die (hentikan execution dan tampilkan variable)
dd($variable);

// Dump (tampilkan tanpa hentikan execution)
dump($variable);

// Dump semua variables
dd(request()->all());

// Query debugging (tampilkan SQL query)
\DB::enableQueryLog();
Product::all();
dd(\DB::getQueryLog());

// Logging ke file
\Log::info('Product created', ['product' => $product]);
\Log::error('Error occurred', ['error' => $e->getMessage()]);
```

---

## 📦 Database Query Builder

```php
use Illuminate\Support\Facades\DB;

// Raw query
$users = DB::select('SELECT * FROM users WHERE active = ?', [1]);

// Insert
DB::insert('INSERT INTO users (name, email) VALUES (?, ?)', ['John', 'john@example.com']);

// Update
DB::update('UPDATE users SET votes = 100 WHERE name = ?', ['John']);

// Delete
DB::delete('DELETE FROM users WHERE id = ?', [1]);

// Query Builder
$users = DB::table('users')
            ->where('active', 1)
            ->orderBy('created_at', 'desc')
            ->get();
```

---

## 🔐 Authentication Patterns

```php
// Check if user authenticated
if (Auth::check()) {
    // User is logged in
}

// Get authenticated user
$user = Auth::user();

// Check user role
if (Auth::user()->role === 'admin') {
    // User is admin
}

// Logout
Auth::logout();
```

---

## 📅 Date & Time

```php
// Carbon instance (available by default in Laravel)
$product->created_at->format('F d, Y');
// Output: January 15, 2026

$product->created_at->diffForHumans();
// Output: 2 days ago

$product->created_at->addDays(7);
// Add 7 days

// Format in Blade
{{ $product->created_at->format('d/m/Y H:i') }}
```

---

## 🎯 Tips & Tricks

1. **Gunakan Route Model Binding** - Jangan query manual di controller
   ```php
   // ✅ GOOD
   public function show(Product $product) { }

   // ❌ BAD
   public function show($id) {
       $product = Product::find($id);
   }
   ```

2. **Gunakan Mass Assignment dengan hati-hati**
   ```php
   // Model: define $fillable
   protected $fillable = ['name', 'price'];  // Hanya field ini
   ```

3. **Validation di Controller, bukan di Model**
4. **Business logic di Controller, bukan di View**
5. **Query di Controller atau Model, jangan di View**
6. **Gunakan Service Providers untuk logic yang dipakai di banyak tempat**

---

## 📞 Quick Help

```bash
# Cek routes
php artisan route:list

# Clear cache jika ada error
php artisan view:clear
php artisan config:clear
php artisan route:clear

# Reset database
php artisan migrate:fresh --seed

# Test di tinker
php artisan tinker
>>> Product::count()
>>> Product::first()
```

---

**Happy Coding! 🚀**

Untuk dokumentasi lengkap, lihat [docs/INDEX.md](INDEX.md)
