# Documentation Index

Selamat datang di dokumentasi Laravel Admin Dashboard CRUD System.

## 📚 Daftar Dokumentasi

### 1. [README.md](../README.md)
**Mulai di sini!** Panduan instalasi dan overview singkat project.

### 2. [ARCHITECTURE.md](ARCHITECTURE.md)
**Wajib dibaca untuk memahami struktur project.**

Berisi:
- Overview arsitektur MVC
- Struktur folder lengkap
- Penjelasan setiap komponen (Controllers, Models, Views, Routes)
- Alur data (request flow)
- Database schema detail
- Frontend architecture
- Coding conventions
- Security features

**Cocok untuk:** Developer baru yang ingin memahami big picture project.

### 3. [DEVELOPER_GUIDE.md](DEVELOPER_GUIDE.md)
**Panduan praktis untuk development.**

Berisi:
- Quick start untuk developer
- Cara menambah modul CRUD baru (step-by-step)
- Customizing views
- Common tasks dan cara melakukannya
- Debugging tips
- Best practices
- Troubleshooting common issues
- Testing guide
- Performance tips

**Cocok untuk:** Developer yang akan mulai mengembangkan atau mengubah project.

### 4. [API.md](API.md)
**Referensi cepat untuk coding.**

Berisi:
- CurrencyHelper documentation
- Blade patterns (loops, conditionals, forms, pagination, alerts)
- Controller patterns
- Model patterns (scopes, accessors, mutators, relationships)
- Utility functions
- Common queries (Eloquent)
- Quick reference untuk Artisan commands

**Cocok untuk:** Referensi sehari-hari saat coding.

### 5. [CHANGELOG.md](CHANGELOG.md)
**Riwayat perubahan project.**

Berisi:
- Version history
- Features yang ditambahkan
- Breaking changes
- Bug fixes
- Enhancements

**Cocok untuk:** Melihat apa yang baru di setiap versi.

## 🎯 Panduan Pembacaan Berdasarkan Role

### 👨‍💻 Developer Baru

Urutan membaca yang disarankan:
1. **README.md** - Untuk instalasi dan overview
2. **ARCHITECTURE.md** - Untuk memahami struktur
3. **DEVELOPER_GUIDE.md** - Untuk mulai development
4. **API.md** - Sebagai referensi saat coding

### 🏗️ Architect/Lead Developer

Fokus ke:
- **ARCHITECTURE.md** - Memahami desain system
- **API.md** - Patterns dan conventions
- **CHANGELOG.md** - Men tracking perubahan

### 🔧 Maintenance Developer

Fokus ke:
- **DEVELOPER_GUIDE.md** - Troubleshooting dan best practices
- **API.md** - Quick reference
- **CHANGELOG.md** - Breaking changes

### 🎨 Frontend Developer

Fokus ke:
- **ARCHITECTURE.md** - Bagian Frontend Architecture
- **DEVELOPER_GUIDE.md** - Customizing Views section
- **API.md** - Blade Patterns section

### 🔙 Backend Developer

Fokus ke:
- **ARCHITECTURE.md** - Database schema dan alur data
- **DEVELOPER_GUIDE.md** - Menambah modul CRUD baru
- **API.md** - Controller dan Model patterns

## 🚖 Quick Links

### Tutorial Cepat

**Menambah Product Baru:**
1. Buka `/products/create`
2. Isi form
3. Submit

**Mengubah Status User:**
1. Buka `/users`
2. Klik tombol edit pada user
3. Ubah status dropdown
4. Submit

**Cek Revenue:**
1. Buka dashboard `/admin/dashboard`
2. Lihat card "Total Revenue"

**Search Data:**
1. Buka halaman index module apapun
2. Ketik di search box
3. Hasil muncul real-time

## 📖 Istilah dan Konvensi

### Istilah

- **CRUD** - Create, Read, Update, Delete
- **Model** - Representasi database table
- **Controller** - Business logic
- **View** - Blade template
- **Route** - URL endpoint
- **Migration** - Database schema changes
- **Seeder** - Sample data
- **Factory** - Data generation
- **Middleware** - Request filtering layer

### Naming Conventions

- **Database:** Snake_case (e.g., `order_number`)
- **Models:** PascalCase singular (e.g., `Product`, `Order`)
- **Controllers:** PascalCase + Controller (e.g., `ProductController`)
- **Views:** kebab-case (e.g., `products/index.blade.php`)
- **Routes:** kebab-case plural (e.g., `/products`, `/categories`)
- **Variables:** camelCase (e.g., `$productName`, `$userId`)

## 🔍 Cara Mencari Informasi

### Ingin mengetahui cara menambah fitur?
→ Baca [DEVELOPER_GUIDE.md](DEVELOPER_GUIDE.md) - "Cara Menambah Modul CRUD Baru"

### Ingin memahami struktur file?
→ Baca [ARCHITECTURE.md](ARCHITECTURE.md) - "Struktur Folder"

### Ingin mencari syntax blade?
→ Baca [API.md](API.md) - "Blade Patterns"

### Error saat development?
→ Baca [DEVELOPER_GUIDE.md](DEVELOPER_GUIDE.md) - "Troubleshooting"

### Ingin melihat pattern yang digunakan?
→ Baca [ARCHITECTURE.md](ARCHITECTURE.md) - "Coding Conventions"
→ Baca [API.md](API.md) - "Controller Patterns", "Model Patterns"

## 💡 Tips

1. **Gunakan dokumentasi sebagai referensi**, jangan dihapalkan semua
2. **Baca sesuai kebutuhan**, tidak harus semuanya dibaca sekaligus
3. **Bookmark halaman penting** untuk akses cepat
4. **Gunakan search function** (Ctrl+F) di browser untuk mencari topik spesifik
5. **Kembalilah ke dokumentasi** saat stuck, jangan tebak-tebak

## 📞 Need Help?

Jika tidak menemukan jawaban di dokumentasi:
1. Cek [Laravel Documentation](https://laravel.com/docs/12.x)
2. Cek [Bootstrap 5 Documentation](https://getbootstrap.com/docs/5.3/)
3. Tanya ke senior developer atau lead
4. Search error message di Google

---

**Last Updated:** 2026-01-19
