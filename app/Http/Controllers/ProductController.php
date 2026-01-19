<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * METHOD ini dipanggil saat user mengakses URL: GET /products
     *
     * FUNGSI:
     * 1. Mengambil semua data produk dari database
     * 2. Mengurutkan dari yang terbaru (desc = descending)
     * 3. Membagi data ke halaman (pagination) 10 produk per halaman
     * 4. Menampilkan view index.blade.php dengan data produk
     *
     * CONTOH QUERY:
     * SELECT * FROM products ORDER BY created_at DESC LIMIT 10 OFFSET 0
     */
    public function index()
    {
        // Query database: ambil semua produk, urutkan terbaru, pagination 10 per halaman
        $products = Product::orderBy('created_at', 'desc')->paginate(10);

        // Return view dengan mengirim data produk menggunakan compact()
        // compact('products') sama dengan ['products' => $products]
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * METHOD ini dipanggil saat user mengakses URL: GET /products/create
     *
     * FUNGSI:
     * 1. Menampilkan form create (form kosong untuk input data baru)
     * 2. Tidak ada query database di sini, hanya menampilkan view form
     *
     * VIEW: admin.products.create (resources/views/admin/products/create.blade.php)
     */
    public function create()
    {
        // Return view form create (form input data produk baru)
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * METHOD ini dipanggil saat user submit form: POST /products
     *
     * FUNGSI:
     * 1. Menerima data dari form (via $request)
     * 2. Validasi input (apakah semua field terisi dengan benar?)
     * 3. Simpan data baru ke database via Model
     * 4. Redirect user ke list produk dengan pesan sukses
     *
     * ALUR:
     * User isi form → Submit → Validasi → Simpan ke DB → Redirect
     *
     * VALIDATION RULES:
     * - name: wajib diisi, tipe string, max 255 karakter
     * - description: wajib diisi, tipe string
     * - price: wajib diisi, tipe numeric, minimal 0
     * - quantity: wajib diisi, tipe integer, minimal 0
     *
     * JIKA VALIDASI GAGAL: User dikembalikan ke form dengan error message
     * JIKA VALIDASI SUKSES: Data disimpan dan redirect ke list
     */
    public function store(Request $request)
    {
        // VALIDASI INPUT dari form
        // Jika validasi gagal, Laravel otomatis redirect kembali ke form dengan error
        $request->validate([
            'name' => 'required|string|max:255',        // Nama wajib, string, max 255
            'description' => 'required|string',         // Deskripsi wajib, string
            'price' => 'required|numeric|min:0',        // Harga wajib, angka, min 0
            'quantity' => 'required|integer|min:0',     // Quantity wajib, integer, min 0
        ]);

        // SIMPAN DATA KE DATABASE
        // Product::create() = mass assignment (create row di database)
        // $request->all() = ambil semua input dari form
        Product::create($request->all());

        // REDIRECT ke halaman list produk dengan pesan sukses
        // ->with('success', 'message') = simpan flash message untuk ditampilkan di view
        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * METHOD ini dipanggil saat user mengakses URL: GET /products/{id}
     * Contoh: GET /products/5 (menampilkan produk dengan ID 5)
     *
     * FUNGSI:
     * 1. Menerima ID produk dari URL (via Route Model Binding)
     * 2. Menampilkan detail satu produk
     *
     * ROUTE MODEL BINDING:
     * Laravel otomatis mencari produk di database berdasarkan ID
     * Parameter (Product $product) = Laravel cari Product::find($id)
     * Jika tidak ditemukan, otomatis 404 Not Found
     *
     * VIEW: admin.products.show (resources/views/admin/products/show.blade.php)
     */
    public function show(Product $product)
    {
        // Return view detail produk dengan data produk
        // compact('product') = ['product' => $product]
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * METHOD ini dipanggil saat user mengakses URL: GET /products/{id}/edit
     * Contoh: GET /products/5/edit (form edit produk dengan ID 5)
     *
     * FUNGSI:
     * 1. Menerima ID produk dari URL (via Route Model Binding)
     * 2. Menampilkan form edit yang sudah terisi data produk
     *
     * VIEW: admin.products.edit (resources/views/admin/products/edit.blade.php)
     * Form ini memiliki input field yang sudah terisi data produk yang akan diedit
     */
    public function edit(Product $product)
    {
        // Return view form edit dengan data produk
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * METHOD ini dipanggil saat user submit form edit: PUT /products/{id}
     * Contoh: PUT /products/5 (update produk dengan ID 5)
     *
     * FUNGSI:
     * 1. Menerima ID produk dan data baru dari form
     * 2. Validasi input (sama seperti store)
     * 3. Update data di database
     * 4. Redirect user ke list produk dengan pesan sukses
     *
     * ALUR:
     * User edit form → Submit → Validasi → Update DB → Redirect
     *
     * BEDA store() vs update():
     * - store() = membuat data baru (Product::create())
     * - update() = mengubah data yang ada ($product->update())
     */
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
        // $product->update() = update row yang sudah ada di database
        // $request->all() = ambil semua input dari form
        $product->update($request->all());

        // REDIRECT ke halaman list produk dengan pesan sukses
        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * METHOD ini dipanggil saat user mengklik tombol delete: DELETE /products/{id}
     * Contoh: DELETE /products/5 (hapus produk dengan ID 5)
     *
     * FUNGSI:
     * 1. Menerima ID produk dari URL (via Route Model Binding)
     * 2. Hapus data dari database
     * 3. Redirect user ke list produk dengan pesan sukses
     *
     * ALUR:
     * User klik tombol Delete → Konfirmasi → Hapus dari DB → Redirect
     *
     * KEAMANAN:
     * Di view, tombol delete biasanya memiliki confirmation dialog:
     * onclick="return confirm('Are you sure?')"
     * Ini untuk mencegah penghapusan tidak sengaja
     */
    public function destroy(Product $product)
    {
        // HAPUS DATA DARI DATABASE
        // $product->delete() = DELETE FROM products WHERE id = ?
        $product->delete();

        // REDIRECT ke halaman list produk dengan pesan sukses
        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }
}
