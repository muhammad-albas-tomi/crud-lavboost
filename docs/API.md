# API Documentation - Helpers & Functions

## 📚 Table of Contents

- [CurrencyHelper](#currencyhelper)
- [Common Blade Patterns](#common-blade-patterns)
- [Controller Patterns](#controller-patterns)
- [Model Patterns](#model-patterns)
- [Utility Functions](#utility-functions)

## 💰 CurrencyHelper

Helper class untuk formatting mata uang Rupiah Indonesia.

**Location:** `app/Helpers/CurrencyHelper.php`

### Methods

#### `formatRupiah($amount)`

Format angka ke Rupiah tanpa desimal.

**Parameters:**
- `$amount` (float|int) - Angka yang akan diformat

**Returns:** (string) Format Rupiah

**Example:**
```php
use App\Helpers\CurrencyHelper;

echo CurrencyHelper::formatRupiah(1500000);
// Output: "Rp 1.500.000"

echo CurrencyHelper::formatRupiah(50000);
// Output: "Rp 50.000"
```

#### `formatRupiahDecimal($amount, $decimals = 2)`

Format angka ke Rupiah dengan desimal.

**Parameters:**
- `$amount` (float|int) - Angka yang akan diformat
- `$decimals` (int) - Jumlah desimal (default: 2)

**Returns:** (string) Format Rupiah dengan desimal

**Example:**
```php
use App\Helpers\CurrencyHelper;

echo CurrencyHelper::formatRupiahDecimal(1500000.50);
// Output: "Rp 1.500.000,50"

echo CurrencyHelper::formatRupiahDecimal(1500000, 0);
// Output: "Rp 1.500.000"

echo CurrencyHelper::formatRupiahDecimal(1500000.123, 3);
// Output: "Rp 1.500.000,123"
```

### Usage in Blade Templates

```blade
<!-- Simple format -->
<span class="price">{{ \App\Helpers\CurrencyHelper::formatRupiah($product->price) }}</span>

<!-- With decimal -->
<span class="price">{{ \App\Helpers\CurrencyHelper::formatRupiahDecimal($order->total_amount, 2) }}</span>

<!-- In badge -->
<span class="badge bg-success">
    {{ \App\Helpers\CurrencyHelper::formatRupiah($product->price) }}
</span>
```

### Usage in Controllers

```php
use App\Helpers\CurrencyHelper;

class ReportController extends Controller
{
    public function index()
    {
        $total = Order::sum('total_amount');
        
        return view('report', [
            'total' => CurrencyHelper::formatRupiah($total)
        ]);
    }
}
```

## 🎨 Common Blade Patterns

### Layout Extension

```blade
@extends('admin.layouts.app')

@section('title', 'Page Title')

@section('page-title', 'Page Title')

@section('content')
<!-- Content here -->
@endsection
```

### Loops

```blade
@foreach($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->name }}</td>
    </tr>
@endforeach

@forelse($products as $product)
    <!-- Products exist -->
@empty
    <!-- No products -->
@endforelse
```

### Conditionals

```blade
@if($product->quantity > 50)
    <span class="badge bg-success">High Stock</span>
@elseif($product->quantity > 20)
    <span class="badge bg-warning">Medium Stock</span>
@else
    <span class="badge bg-danger">Low Stock</span>
@endif

@unless($product->is_active)
    <span class="badge bg-secondary">Inactive</span>
@endunless

@isset($product->sale_price)
    <span>Sale!</span>
@endisset

@empty($product->description)
    <p>No description</p>
@endempty
```

### Forms

```blade
<form action="{{ route('products.store') }}" method="POST">
    @csrf
    
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" 
               class="form-control @error('name') is-invalid @enderror" 
               id="name" 
               name="name" 
               value="{{ old('name') }}"
               required>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
```

### Links & Actions

```blade
<!-- Link -->
<a href="{{ route('products.index') }}">Back</a>

<!-- Link with model -->
<a href="{{ route('products.show', $product) }}">View</a>

<!-- Form for DELETE -->
<form action="{{ route('products.destroy', $product) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>

<!-- With confirmation -->
<form action="{{ route('products.destroy', $product) }}" 
      method="POST"
      onsubmit="return confirm('Are you sure?');">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>
```

### Pagination

```blade
<!-- Display pagination -->
{{ $products->links() }}

<!-- Custom pagination -->
{{ $products->appends(['search' => request('search')])->links() }}

<!-- Check if has pages -->
@if($products->hasPages())
    {{ $products->links() }}
@endif
```

### Alerts/Messages

```blade
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
```

## 🎮 Controller Patterns

### Resource Controller

```php
class ProductController extends Controller
{
    public function index()
    {
        // List with pagination
        $items = Model::orderBy('created_at', 'desc')->paginate(10);
        return view('module.index', compact('items'));
    }

    public function create()
    {
        // Show create form
        return view('module.create');
    }

    public function store(Request $request)
    {
        // Validate
        $validated = $request->validate([
            'field' => 'required|string|max:255',
        ]);

        // Create
        Model::create($validated);

        // Redirect with message
        return redirect()
            ->route('module.index')
            ->with('success', 'Message');
    }

    public function show(Model $model)
    {
        // Show single item
        return view('module.show', compact('model'));
    }

    public function edit(Model $model)
    {
        // Show edit form
        return view('module.edit', compact('model'));
    }

    public function update(Request $request, Model $model)
    {
        // Validate
        $validated = $request->validate([
            'field' => 'required|string|max:255',
        ]);

        // Update
        $model->update($validated);

        // Redirect with message
        return redirect()
            ->route('module.index')
            ->with('success', 'Message');
    }

    public function destroy(Model $model)
    {
        // Delete
        $model->delete();

        // Redirect with message
        return redirect()
            ->route('module.index')
            ->with('success', 'Message');
    }
}
```

### Validation Patterns

```php
// Required string
$request->validate([
    'name' => 'required|string|max:255',
]);

// Numeric
$request->validate([
    'price' => 'required|numeric|min:0',
    'quantity' => 'required|integer|min:1',
]);

// Email unique
$request->validate([
    'email' => 'required|email|unique:users,email,' . $user->id,
]);

// Enum
$request->validate([
    'status' => 'required|in:active,inactive,suspended,pending',
]);

// Nullable
$request->validate([
    'description' => 'nullable|string',
]);

// Confirmed (password_confirmation field)
$request->validate([
    'password' => 'required|string|min:8|confirmed',
]);
```

## 📦 Model Patterns

### Basic Model

```php
class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'quantity' => 'integer',
        'is_active' => 'boolean',
    ];

    protected $hidden = [
        'internal_field',
    ];

    protected $appends = [
        'display_price',
    ];

    // Accessor
    public function getDisplayPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    // Mutator
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

    // Scope
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeExpensive($query, $price = 100000)
    {
        return $query->where('price', '>', $price);
    }

    // Relationship
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
```

### Query Scopes Usage

```php
// Using scope
$activeProducts = Product::active()->get();

// Chain scopes
$products = Product::active()->expensive(50000)->get();

// With parameters
$products = Product::expensive(100000)->get();
```

## 🛠️ Utility Functions

### Check Route

```blade
<!-- Check if current route matches -->
@if(request()->routeIs('products.*'))
    <!-- Active -->
@endif

<!-- Multiple routes -->
@if(request()->routeIs(['products.*', 'categories.*']))
    <!-- Active -->
@endif
```

### Get Auth User

```php
// In controller
$user = auth()->user();
$user = Auth::user();

// Check auth
if (auth()->check()) {
    // User is authenticated
}

if (auth()->guest()) {
    // User is guest
}

// Check role
if (auth()->user()->role === 'admin') {
    // Is admin
}
```

### Flash Messages

```php
// Success
return redirect()->route('products.index')
    ->with('success', 'Product created successfully.');

// Error
return redirect()->route('products.index')
    ->with('error', 'Failed to create product.');

// Multiple messages
return redirect()->route('products.index')
    ->with('success', 'Product created')
    ->with('info', 'Email notification sent');
```

### Old Input

```blade
<!-- Get old value -->
<input type="text" name="name" value="{{ old('name') }}">

<!-- With default -->
<input type="text" name="name" value="{{ old('name', $product->name) }}">
```

### URLs

```php
// Current URL
$url = url()->current();
$url = request()->url();
$url = request()->fullUrl();

// Previous URL
$url = url()->previous();
```

### Dates

```blade
<!-- Format date -->
{{ $product->created_at->format('F d, Y') }}
<!-- Output: January 19, 2026 -->

{{ $product->created_at->format('g:i A') }}
<!-- Output: 2:30 PM -->

{{ $product->created_at->diffForHumans() }}
<!-- Output: 1 hour ago -->

{{ $product->created_at->toFormattedDateString() }}
<!-- Output: Jan 19, 2026 -->
```

## 📊 Common Queries

### Basic Queries

```php
// Get all
$products = Product::all();

// Find by ID
$product = Product::find(1);

// Find or fail
$product = Product::findOrFail(1);

// Where
$products = Product::where('price', '>', 100000)->get();
$products = Product::where('is_active', true)->get();

// Multiple where
$products = Product::where('is_active', true)
                    ->where('price', '>', 50000)
                    ->get();

// Or where
$products = Product::where('status', 'active')
                    ->orWhere('status', 'pending')
                    ->get();

// Where in
$products = Product::whereIn('id', [1, 2, 3])->get();

// Where between
$products = Product::whereBetween('price', [50000, 100000])->get();
```

### Ordering & Limiting

```php
// Order by
$products = Product::orderBy('created_at', 'desc')->get();
$products = Product::orderBy('name', 'asc')->get();

// Latest
$products = Product::latest()->get();
$products = Product::oldest()->get();

// Limit
$products = Product::take(5)->get();
$products = Product::limit(10)->get();

// Offset & Limit
$products = Product::offset(10)->limit(5)->get();
```

### Aggregates

```php
// Count
$count = Product::count();
$count = Product::where('is_active', true)->count();

// Sum
$total = Order::sum('total_amount');
$total = Order::where('status', 'completed')->sum('total_amount');

// Average
$avg = Product::avg('price');

// Min/Max
$min = Product::min('price');
$max = Product::max('price');
```

## 🎯 Quick Reference

### Common Blade Directives

```blade
@csrf                    <!-- CSRF token -->
@method('PUT')          <!-- Method spoofing -->
@error('field')         <!-- Validation error -->
@section('name')         <!-- Define section -->
@yield('name')          <!-- Display section -->
@foreach($items)        <!-- Loop -->
@if($condition)         <!-- Conditional -->
@auth                   <!-- If authenticated -->
@guest                  <!-- If guest -->
@can('action')          <!-- Authorization -->
```

### Common Artisan Commands

```bash
# Server
php artisan serve

# Database
php artisan migrate
php artisan migrate:fresh
php artisan migrate:rollback
php artisan db:seed

# Cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Generate
php artisan make:controller NameController
php artisan make:model Name -m
php artisan make:migration name
php artisan make:seeder NameSeeder

# Other
php artisan route:list
php artisan tinker
php artisan queue:work
```

For more information, see [Laravel Documentation](https://laravel.com/docs/12.x)
