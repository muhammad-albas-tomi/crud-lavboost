# Panduan Developer - Laravel Admin Dashboard

## 👨‍💻 Panduan Memulai Development

Document ini akan membantu developer baru memahami dan mengembangkan project ini.

## 🎯 Tujuan Dokumentasi

- Memahami struktur project
- Mengetahui cara menambah fitur baru
- Memahami pola yang digunakan
- Best practices untuk development

## 🚀 Quick Start untuk Developer Baru

### 1. Setup Environment

```bash
# Clone project
git clone <repository-url>
cd crud-lavboost

# Install dependencies
composer install

# Setup database
php artisan migrate
php artisan db:seed

# Start server
php artisan serve
```

### 2. Familiarisasi dengan Struktur

Baca urutan dokumentasi ini:
1. ARCHITECTURE.md - Arsitektur dan struktur folder
2. DEVELOPER_GUIDE.md (ini) - Panduan development
3. API.md - API helpers dan functions

## 📁 Memahami Struktur Project

### Controllers

**Lokasi:** `app/Http/Controllers/`

**Pattern:** Resource Controller dengan 7 methods:

```php
class ExampleController extends Controller
{
    public function index()        // List data
    public function create()       // Form create
    public function store(Request)  // Save data
    public function show($id)      // Detail data
    public function edit($id)      // Form edit
    public function update(Request, $id) // Update data
    public function destroy($id)   // Delete data
}
```

### Models

**Lokasi:** `app/Models/`

**Pattern:**

```php
class Product extends Model
{
    protected $fillable = ['field1', 'field2']; // Mass assignment
    protected $casts = ['field' => 'type'];      // Type casting
    protected $hidden = ['password'];            // Sembunyikan di JSON/array
}
```

### Views

**Lokasi:** `resources/views/admin/`

**Naming Convention:**
- `{module}/index.blade.php` - List data
- `{module}/create.blade.php` - Form create
- `{module}/edit.blade.php` - Form edit
- `{module}/show.blade.php` - Detail data

**Pattern:**

```blade
@extends('admin.layouts.app')

@section('title', 'Page Title')

@section('page-title', 'Page Title')

@section('content')
<!-- Content here -->
@endsection
```

## 🛠️ Cara Menambah Modul CRUD Baru

### Step 1: Create Migration

```bash
php artisan make:migration create_items_table
```

Edit migration file:

```php
Schema::create('items', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->text('description')->nullable();
    $table->decimal('price', 10, 2);
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});
```

### Step 2: Create Model

```bash
php artisan make:model Item
```

Edit model:

```php
class Item extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
```

### Step 3: Create Controller

```bash
php artisan make:controller ItemController --resource
```

Edit controller:

```php
class ItemController extends Controller
{
    public function index()
    {
        $items = Item::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.items.index', compact('items'));
    }

    public function create()
    {
        return view('admin.items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'is_active' => 'boolean',
        ]);

        Item::create($request->all());

        return redirect()->route('items.index')
            ->with('success', 'Item created successfully.');
    }

    public function show(Item $item)
    {
        return view('admin.items.show', compact('item'));
    }

    public function edit(Item $item)
    {
        return view('admin.items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'is_active' => 'boolean',
        ]);

        $item->update($request->all());

        return redirect()->route('items.index')
            ->with('success', 'Item updated successfully.');
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index')
            ->with('success', 'Item deleted successfully.');
    }
}
```

### Step 4: Create Views Directory

```bash
mkdir -p resources/views/admin/items
```

Create 4 view files berdasarkan pattern dari modul lain.

### Step 5: Add Route

Edit `routes/web.php`:

```php
use App\Http\Controllers\ItemController;

Route::resource('items', ItemController::class);
```

### Step 6: Update Sidebar Navigation

Edit `resources/views/admin/layouts/app.blade.php`:

```blade
<li>
    <a href="{{ route('items.index') }}" class="{{ request()->routeIs('items.*') ? 'active' : '' }}">
        <i class="bi bi-box"></i>
        Items
        <span class="badge bg-white text-primary">{{ App\Models\Item::count() }}</span>
    </a>
</li>
```

### Step 7: Run Migration

```bash
php artisan migrate
```

## 🎨 Customizing Views

### Mengganti Warna/Style

**Edit:** `resources/views/admin/layouts/app.blade.php`

**Bagian CSS (di <head>):**

```css
/* Ubah warna sidebar */
.sidebar {
    background: linear-gradient(180deg, #1e3c72 0%, #2a5298 100%);
}

/* Ubah warna tombol primary */
.btn-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}
```

### Menambah Kolom di Table

Edit file `index.blade.php` module yang diinginkan:

```blade
<thead>
    <tr>
        <th>ID</th>
        <th>New Column</th> <!-- Tambah ini -->
        <th>Name</th>
        ...
    </tr>
</thead>
<tbody>
    @foreach($items as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->new_column }}</td> <!-- Tambah ini -->
            <td>{{ $item->name }}</td>
            ...
        </tr>
    @endforeach
</tbody>
```

### Menambah Field di Form

Edit file `create.blade.php` dan `edit.blade.php`:

```blade
<div class="mb-3">
    <label for="new_field" class="form-label">
        <i class="bi bi-tag"></i> New Field
    </label>
    <input type="text"
           class="form-control @error('new_field') is-invalid @enderror"
           id="new_field"
           name="new_field"
           value="{{ old('new_field', $item->new_field ?? '') }}"
           required>
    @error('new_field')
        <div class="invalid-feedback d-block">
            {{ $message }}
        </div>
    @enderror
</div>
```

## 🔧 Common Tasks

### Mengubah Validasi

Edit controller di method `store()` dan `update()`:

```php
$request->validate([
    'field_name' => 'required|string|max:255', // Add rules
    'email' => 'required|email|unique:users',
    'age' => 'nullable|integer|min:18',
]);
```

### Menambah Relation

Di Model:

```php
class Product extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
```

Di View:

```blade
<td>{{ $product->category->name }}</td>
```

### Custom Query

Di Controller:

```php
// Active products only
$products = Product::where('is_active', true)->get();

// Search functionality
$products = Product::where('name', 'like', '%'.$request->search.'%')->get();

// Ordering
$products = Product::orderBy('price', 'desc')->get();
```

## 🐛 Debugging

### Enable Debug Mode

File `.env`:

```env
APP_DEBUG=true
```

### Log Debugging

```php
// Log ke file
\Log::info('Debug info', ['data' => $variable]);

// Dump dan die
dd($variable);

// Dump all
dump($variable);
```

### Check Query Log

```php
DB::enableQueryLog();

// Run query

$queries = DB::getQueryLog();
dd($queries);
```

## 📊 Working dengan Database

### Reset Database

```bash
# Hapus semua data dan migrasi ulang
php artisan migrate:fresh

# Hapus semua data, migrasi ulang, dan seed
php artisan migrate:fresh --seed
```

### Tinker untuk Testing

```bash
php artisan tinker
```

```php
// Create data
App\Models\Product::create(['name' => 'Test', 'price' => 10000]);

// Query data
App\Models\Product::all();
App\Models\Product::find(1);
App\Models\Product::where('price', '>', 50000)->get();

// Update data
$product = App\Models\Product::find(1);
$product->update(['price' => 15000]);

// Delete data
App\Models\Product::find(1)->delete();
```

## 🎯 Best Practices

### Controllers

- ✅ Single responsibility per method
- ✅ Validation di store/update
- ✅ Return redirect dengan flash messages
- ✅ Use route names untuk redirects
- ❌ Hardcoded URLs

### Models

- ✅ Use fillable untuk mass assignment
- ✅ Use casts untuk type conversion
- ✅ Define relationships
- ❌ Business logic di model (taruh di service class jika kompleks)

### Views

- ✅ Extend layout
- ✅ Use blade directives (@if, @foreach, etc.)
- ✅ Escape output dengan {{ }}
- ❌ Logic yang kompleks di view

### Routes

- ✅ Use resource routes
- ✅ Group related routes
- ✅ Use route names
- ❌ Hardcoded URLs di views

### Security

- ✅ Always use {{ }} untuk output (auto escape)
- ✅ Validate input
- ✅ Use CSRF tokens (@csrf)
- ✅ Hash passwords
- ❌ Trust user input tanpa validasi

## 🔍 Troubleshooting Common Issues

### Error: "View not found"

**Solution:**
- Check file name (case-sensitive)
- Clear cache: `php artisan view:clear`
- Check path di controller

### Error: "Mass Assignment Exception"

**Solution:**
- Tambah field ke `$fillable` di model
- Atau gunakan ` guarded: []` (tidak disarankan untuk production)

### Error: "SQLSTATE[23000]: Integrity constraint violation"

**Solution:**
- Check unique constraint di database
- Check foreign key constraints
- Pastikan data yang di-insert valid

### Error: "Route not defined"

**Solution:**
- Run `php artisan route:list`
- Check route name di controller/views
- Clear cache: `php artisan route:clear`

### Migration Conflict

**Solution:**
```bash
# Hapus tabel dan migrasi ulang
php artisan migrate:rollback --step=1
php artisan migrate
```

## 📈 Performance Tips

### Eager Loading

Gunakan `with()` untuk menghindari N+1 queries:

```php
// Bad (N+1 queries)
$products = Product::all();
foreach ($products as $product) {
    echo $product->category->name;
}

// Good (2 queries)
$products = Product::with('category')->get();
foreach ($products as $product) {
    echo $product->category->name;
}
```

### Pagination

Gunakan pagination untuk data besar:

```php
$products = Product::paginate(10); // 10 items per page
```

### Select Only Needed Columns

```php
$products = Product::select(['id', 'name', 'price'])->get();
```

## 🧪 Testing

### Manual Testing Flow

1. **Test Create**
   - Buka form create
   - Isi semua field
   - Submit dan cek apakah data tersimpan

2. **Test Read**
   - Buka index page
   - Klik tombol view
   - Cek detail data

3. **Test Update**
   - Buka form edit
   - Ubah beberapa field
   - Submit dan cek apakah data berubah

4. **Test Delete**
   - Klik tombol delete
   - Confirm delete
   - Cek apakah data terhapus

5. **Test Validation**
   - Submit form kosong
   - Submit dengan data invalid
   - Cek error messages muncul

## 📚 Resources untuk Belajar

- [Laravel Documentation](https://laravel.com/docs/12.x)
- [Eloquent ORM](https://laravel.com/docs/12.x/eloquent)
- [Blade Templates](https://laravel.com/docs/12.x/blade)
- [Bootstrap 5](https://getbootstrap.com/docs/5.3/getting-started/)
- [PHP Best Practices](https://phptherightway.com/)

## 💡 Tips untuk Developer Baru

1. **Mulai dari yang sederhana** - Pahami basic CRUD dulu
2. **Baca error message** - Laravel punya error messages yang jelas
3. **Gunakan artisan commands** - Membantu mempercepat development
4. **Ikuti konvensi Laravel** - Jangan reinvent the wheel
5. **Read documentation** - Laravel docs sangat lengkap
6. **Practice TDD** - Test dulu, code later
7. **Version control** - Commit sering dengan pesan yang jelas
8. **Ask questions** - Jangan takut bertanya

## 🤝 Kontribusi ke Project

### Workflow Kontribusi

1. Buat branch baru: `git checkout -b feature/nama-fitur`
2. Buat perubahan
3. Test semua changes
4. Commit dengan pesan yang jelas
5. Push dan buat pull request

### Commit Message Convention

```
feat: add user export feature
fix: validation error in product form
docs: update installation guide
refactor: simplify product controller
style: format blade templates
test: add user creation test
chore: update dependencies
```

Happy Coding! 🚀
