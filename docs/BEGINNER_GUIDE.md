# Panduan Belajar untuk Pemula

Panduan ini dirancang khusus untuk mahasiswa/kelompok belajar yang baru mengenal Laravel dan CRUD system.

## 📚 Materi Prasyarat

Sebelum mempelajari project ini, pastikan Anda sudah memahami:

### 1. **PHP Dasar** ⭐⭐⭐ (WAJIB)

- Variabel dan tipe data
- Array (indexed dan associative)
- Conditional (if/else, switch)
- Loops (for, foreach, while)
- Functions
- OOP Basic (Class, Object, Property, Method)

**📖 Sumber Belajar:**

- [PHP Manual](https://www.php.net/manual/en/)
- [W3Schools PHP](https://www.w3schools.com/php/)

### 2. **HTML & CSS** ⭐⭐ (WAJIB)

- HTML structure
- Forms (GET vs POST)
- CSS basics
- Bootstrap grid system

**📖 Sumber Belajar:**

- [W3Schools HTML](https://www.w3schools.com/html/)
- [W3Schools CSS](https://www.w3schools.com/css/)
- [Bootstrap Documentation](https://getbootstrap.com/docs/5.3/getting-started/introduction/)

### 3. **SQL Dasar** ⭐ (Recommended)

- SELECT, INSERT, UPDATE, DELETE
- WHERE clause
- JOIN (basic understanding)

**📖 Sumber Belajar:**

- [W3Schools SQL](https://www.w3schools.com/sql/)

### 4. **MVC Pattern** ⭐⭐ (Recommended)

- Konsep Model-View-Controller
- Separation of concerns

---

## 🎯 Learning Path (Urutan Belajar)

Ikuti urutan ini untuk hasil belajar yang maksimal:

### **Level 1: Understanding the Big Picture** (1-2 Hari)

#### Step 1: Baca Dokumentasi Utama

1. ✅ [README.md](../README.md) - Gambaran project
2. ✅ [docs/INDEX.md](INDEX.md) - Roadmap dokumentasi
3. ✅ [docs/ARCHITECTURE.md](ARCHITECTURE.md) - Arsitektur sistem

**Tujuan:**

- Memahami apa itu CRUD
- Mengetahui 4 modul yang ada
- Paham struktur folder Laravel

---

### **Level 2: Installation & Exploration** (1 Hari)

#### Step 2: Install dan Jalankan Project

```bash
# 1. Clone/download project
cd crud-lavboost

# 2. Install dependencies
composer install

# 3. Setup database
php artisan migrate:fresh --seed

# 4. Jalankan server
php artisan serve
```

#### Step 3: Eksplorasi UI

Buka browser: `http://localhost:8000`

**Coba fitur-fitur ini:**

- [ ] Lihat dashboard dan statistik
- [ ] Klik menu "Products" → lihat list produk
- [ ] Klik tombol "Add Product" → buat produk baru
- [ ] Klik tombol "Edit" pada produk → ubah data
- [ ] Klik tombol "View" → lihat detail
- [ ] Coba fitur search
- [ ] Ulangi untuk Categories, Orders, Users

**Tujuan:**

- Familiar dengan tampilan dan fitur
- Paham alur CRUD dasar
- Melihat data berubah secara real-time

---

### **Level 3: Code Along - Produk Module** (3-5 Hari)

#### Step 4: Pelajari Satu Modul Lengkap

Pelajari file-file berikut secara BERURUTAN:

##### **A. Database Layer** (Menyiapkan tempat penyimpanan)

📁 File: [database/migrations/xxxx_xx_xx_create_products_table.php](../database/migrations/xxxx_xx_xx_create_products_table.php)

**Apa itu Migration?**

- Migration = blueprint/skema tabel database
- Menentukan field apa saja yang ada
- Bisa version control (git)

**Fungsi:**

```php
// Ini membuat tabel dengan kolom:
Schema::create('products', function (Blueprint $table) {
    $table->id();              // ID unik (auto increment)
    $table->string('name');    // Nama produk (text)
    $table->text('description'); // Deskripsi (text panjang)
    $table->decimal('price', 10, 2); // Harga (decimal)
    $table->integer('quantity');     // Jumlah stok (integer)
    $table->timestamps();       // created_at & updated_at (auto)
});
```

**Latihan:**

- Coba buka database `database/database.sqlite`
- Lihat tabel `products` menggunakan DB Browser for SQLite

---

##### **B. Model Layer** (Representasi data sebagai object)

📁 File: [app/Models/Product.php](../app/Models/Product.php)

**Apa itu Model?**

- Model = representasi tabel database sebagai class PHP
- Bridge antara database dan application logic
- Menggunakan Eloquent ORM

**Fungsi:**

```php
class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'quantity'
    ];
}
```

**Penjelasan:**

- `extends Model` = Product adalah model Laravel
- `$fillable` = field yang boleh diisi mass assignment
- Nama class "Product" otomatis mapping ke tabel "products"

**Latihan:**

- Buka terminal, jalankan: `php artisan tinker`
- Coba: `Product::count()` → berapa total produk?
- Coba: `Product::first()` → lihat produk pertama
- Coba: `Product::where('quantity', '<', 20)->get()` → cari produk stok rendah

---

##### **C. Controller Layer** (Business logic)

📁 File: [app/Http/Controllers/ProductController.php](../app/Http/Controllers/ProductController.php)

**Apa itu Controller?**

- Controller = tempat semua logic/aturan bisnis
- Menangani request dari user
- Berinteraksi dengan Model dan View

**7 Method CRUD:**

###### **1. index()** - Menampilkan semua data

```php
public function index()
{
    // Ambil semua produk, urutkan terbaru, pagination 10 per halaman
    $products = Product::orderBy('created_at', 'desc')->paginate(10);

    // Kirim ke view
    return view('admin.products.index', compact('products'));
}
```

**Flow:**

1. User buka `/products`
2. Method `index()` dipanggil
3. Query database untuk ambil produk
4. Kirim data ke view `admin.products.index`

---

###### **2. create()** - Menampilkan form create

```php
public function create()
{
    // Cuma menampilkan form kosong
    return view('admin.products.create');
}
```

**Flow:**

1. User klik "Add Product"
2. Method `create()` dipanggil
3. Tampilkan form input

---

###### **3. store()** - Menyimpan data baru

```php
public function store(Request $request)
{
    // 1. Validasi input
    $request->validate([
        'name' => 'required|string|max:255',  // Nama wajib, max 255 karakter
        'description' => 'required|string',    // Deskripsi wajib
        'price' => 'required|numeric|min:0',   // Harga wajib, minimal 0
        'quantity' => 'required|integer|min:0', // Quantity wajib, minimal 0
    ]);

    // 2. Simpan ke database
    Product::create($request->all());

    // 3. Redirect ke index dengan pesan sukses
    return redirect()->route('products.index')
        ->with('success', 'Product created successfully.');
}
```

**Flow:**

1. User isi form dan klik "Submit"
2. Method `store()` dipanggil
3. Validasi input (jika gagal, kembali ke form dengan error)
4. Simpan ke database via Model
5. Redirect ke list produk dengan pesan sukses

---

###### **4. show()** - Menampilkan detail satu data

```php
public function show(Product $product)
{
    // Model binding: otomatis cari product berdasarkan ID
    return view('admin.products.show', compact('product'));
}
```

**Flow:**

1. User klik tombol "View" pada produk
2. Method `show()` dipanggil dengan ID produk
3. Laravel otomatis cari produk di database (Route Model Binding)
4. Tampilkan detail produk

---

###### **5. edit()** - Menampilkan form edit

```php
public function edit(Product $product)
{
    return view('admin.products.edit', compact('product'));
}
```

**Flow:**

1. User klik tombol "Edit" pada produk
2. Method `edit()` dipanggil dengan ID produk
3. Tampilkan form yang sudah terisi data produk

---

###### **6. update()** - Mengupdate data

```php
public function update(Request $request, Product $product)
{
    // 1. Validasi (sama seperti store)
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'quantity' => 'required|integer|min:0',
    ]);

    // 2. Update data
    $product->update($request->all());

    // 3. Redirect dengan pesan sukses
    return redirect()->route('products.index')
        ->with('success', 'Product updated successfully.');
}
```

**Flow:**

1. User edit form dan klik "Update"
2. Method `update()` dipanggil
3. Validasi input
4. Update data di database
5. Redirect ke list dengan pesan sukses

---

###### **7. destroy()** - Menghapus data

```php
public function destroy(Product $product)
{
    // 1. Hapus data
    $product->delete();

    // 2. Redirect dengan pesan sukses
    return redirect()->route('products.index')
        ->with('success', 'Product deleted successfully.');
}
```

**Flow:**

1. User klik tombol "Delete" dan konfirmasi
2. Method `destroy()` dipanggil
3. Hapus data dari database
4. Redirect ke list dengan pesan sukses

---

##### **D. View Layer** (Tampilan UI)

###### **1. Layout** 📁 [resources/views/admin/layouts/app.blade.php](../resources/views/admin/layouts/app.blade.php)

- Template utama yang dipakai semua halaman
- Sidebar navigation
- CSS & JS includes

###### **2. Index** 📁 [resources/views/admin/products/index.blade.php](../resources/views/admin/products/index.blade.php)

- Tampilkan list produk dalam table
- Tombol-tombol action (Add, Edit, View, Delete)
- Search box
- Pagination

**Konsep Blade:**

```blade
@foreach($products as $product)
    <tr>
        <td>{{ $product->name }}</td>
        <td>{{ $product->price }}</td>
    </tr>
@endforeach
```

###### **3. Create Form** 📁 [resources/views/admin/products/create.blade.php](../resources/views/admin/products/create.blade.php)

- Form input data baru
- CSRF token untuk keamanan
- Validation error display

**Konsep Form:**

```blade
<form method="POST" action="{{ route('products.store') }}">
    @csrf
    <input type="text" name="name" value="{{ old('name') }}">
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</form>
```

###### **4. Edit Form** 📁 [resources/views/admin/products/edit.blade.php](../resources/views/admin/products/edit.blade.php)

- Sama seperti create, tapi form terisi data
- Method PUT untuk update

###### **5. Show Detail** 📁 [resources/views/admin/products/show.blade.php](../resources/views/admin/products/show.blade.php)

- Tampilkan detail lengkap satu produk
- Tombol Back, Edit, Delete

---

##### **E. Routes** (URL mapping)

📁 File: [routes/web.php](../routes/web.php)

**Apa itu Route?**

- Route = mapping URL ke Controller method
- Menentukan URL apa yang menjalankan fungsi apa

**Resource Route:**

```php
Route::resource('products', ProductController::class);
```

**Ini otomatis membuat 7 routes:**

| Method    | URL                   | Controller Method | Purpose            |
| --------- | --------------------- | ----------------- | ------------------ |
| GET       | `/products`           | index             | List semua produk  |
| GET       | `/products/create`    | create            | Form create        |
| POST      | `/products`           | store             | Simpan produk baru |
| GET       | `/products/{id}`      | show              | Detail produk      |
| GET       | `/products/{id}/edit` | edit              | Form edit          |
| PUT/PATCH | `/products/{id}`      | update            | Update produk      |
| DELETE    | `/products/{id}`      | destroy           | Hapus produk       |

**Cek semua routes:**

```bash
php artisan route:list
```

---

### **Level 4: Practice** (3-5 Hari)

#### Latihan 1: Tambah Field

Tambahkan field `sku` (Stock Keeping Unit) ke produk:

1. **Buat migration:**

```bash
php artisan make:migration add_sku_to_products_table
```

2. **Edit migration file:**

```php
$table->string('sku')->unique()->after('name');
```

3. **Jalankan migration:**

```bash
php artisan migrate
```

4. **Update Model:**

```php
protected $fillable = ['name', 'sku', 'description', 'price', 'quantity'];
```

5. **Update Views:**

- Tambah input di create.blade.php
- Tambah input di edit.blade.php
- Tampilkan di index.blade.php dan show.blade.php

6. **Update Controller:**

- Add validation for sku
- Update store() and update()

---

#### Latihan 2: Tambah Fitur Search Category

Tambahkan filter berdasarkan kategori di halaman produk:

1. **Update index() di ProductController:**

```php
public function index(Request $request)
{
    $query = Product::query();

    // Search name
    if ($request->has('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    // Filter by category
    if ($request->has('category') && $request->category) {
        $query->where('category_id', $request->category);
    }

    $products = $query->orderBy('created_at', 'desc')->paginate(10);

    $categories = Category::all(); // Untuk dropdown

    return view('admin.products.index', compact('products', 'categories'));
}
```

2. **Update index.blade.php:**

```blade
<select name="category" class="form-control">
    <option value="">All Categories</option>
    @foreach($categories as $cat)
        <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
            {{ $cat->name }}
        </option>
    @endforeach
</select>
```

---

#### Latihan 3: Tambah Module Baru

Buat modul baru "Suppliers":

1. **Plan field-field yang dibutuhkan:**

- name
- email
- phone
- address
- is_active

2. **Buat migration:**

```bash
php artisan make:migration create_suppliers_table
```

3. **Buat model:**

```bash
php artisan make:model Supplier
```

4. **Buat controller:**

```bash
php artisan make:controller SupplierController --resource
```

5. **Buat views:**

- index.blade.php
- create.blade.php
- edit.blade.php
- show.blade.php

6. **Tambah route:**

```php
Route::resource('suppliers', SupplierController::class);
```

7. **Update sidebar navigation di layout:**

```blade
<a href="{{ route('suppliers.index') }}" class="nav-link">
    <i class="bi bi-truck"></i> Suppliers
</a>
```

---

### **Level 5: Advanced Features** (Opsional)

#### Fitur Tambahan untuk Dicoba:

1. **Export Data to Excel/CSV**
2. **Import Data dari Excel/CSV**
3. **PDF Export**
4. **Email Notifications**
5. **Image Upload**
6. **Data Tables dengan AJAX**
7. **Charts & Graphs**
8. **Role-based Permissions**
9. **Activity Log**
10. **API Endpoints**

---

## 🎓 Tips Belajar

### Untuk Mahasiswa:

1. **Jangan hanya membaca** - ketik ulang kodenya
2. **Eksperimen** - coba ubah-ubah dan lihat efeknya
3. **Break things** - sengaja buat error dan pelajari error message
4. **Tanya "mengapa"** - jangan hanya "apa"
5. **Gunakan resources** - Laravel docs, Google, Stack Overflow

### Untuk Dosen/Guru:

1. **Mulai dari konsep** - jangan langsung coding
2. **Gunakan diagram** - gambar flowchart
3. **Live coding** - demo langsung di kelas
4. **Berikan challenge** - latihan yang menantang
5. **Code review** - review kode mahasiswa

---

## 📞 Getting Help

### Stuck? Coba ini:

1. **Cek dokumentasi:**
    - [Laravel Documentation](https://laravel.com/docs/12.x)
    - [docs/DEVELOPER_GUIDE.md](DEVELOPER_GUIDE.md)
    - [docs/API.md](API.md)

2. **Cek error message:**
    - Baca error dengan teliti
    - Cek line number
    - Google error message

3. **Clear cache:**

```bash
php artisan view:clear
php artisan config:clear
php artisan route:clear
php artisan cache:clear
```

4. **Check logs:**

```bash
tail -f storage/logs/laravel.log
```

5. **Tinker debugging:**

```bash
php artisan tinker
>>> $product = Product::find(1);
>>> $product->name;
```

---

## 📝 Cheatsheet

### Artisan Commands:

```bash
# Server
php artisan serve

# Migration
php artisan migrate
php artisan migrate:fresh
php artisan migrate:rollback
php artisan make:migration create_table_name

# Model
php artisan make:model ModelName

# Controller
php artisan make:controller ControllerName
php artisan make:controller ControllerName --resource

# Seeding
php artisan db:seed
php artisan migrate:fresh --seed

# Tinker
php artisan tinker

# Routes
php artisan route:list
php artisan route:cache
php artisan route:clear

# Cache
php artisan cache:clear
php artisan view:clear
php artisan config:clear
```

---

## 🎯 Checklist Belajar

Selesai belajar jika Anda bisa:

- [ ] Menjelaskan konsep MVC
- [ ] Menjalankan project tanpa error
- [ ] Membuat CRUD sederhana sendiri
- [ ] Menambah field baru ke modul yang ada
- [ ] Membuat modul CRUD baru dari scratch
- [ ] Memahami routing di Laravel
- [ ] Menggunakan Eloquent untuk query database
- [ ] Membuat view dengan Blade template
- [ ] Melakukan form validation
- [ ] Debug error sendiri

---

## 📚 Next Steps

Setelah menguasai dasar-dasar ini, lanjutkan ke:

1. **Authentication & Authorization**
2. **RESTful API Development**
3. **Unit Testing dengan PHPUnit**
4. **Deployment ke Production**
5. **Advanced Eloquent Relationships**
6. **Queue Jobs & Tasks**
7. **Events & Listeners**
8. **Service Containers & Providers**

---

**Selamat Belajar! 🚀**

Ingat: **Practice makes perfect.** Semakin sering Anda coding, semakin paham.

Jangan ragu untuk bertanya jika ada yang membingungkan!
