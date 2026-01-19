# Changelog - Laravel Admin Dashboard

All notable changes to this project will be documented in this file.

## [Unreleased]

### Added
- Initial Laravel 12 project setup
- Bootstrap 5.3.2 integration
- Bootstrap Icons 1.11.1
- SQLite database configuration

### Features

#### Dashboard
- Real-time statistics cards
- Recent products table (5 items)
- Recent orders table (5 items)
- Quick action buttons
- Total revenue calculation

#### Products Module
- Full CRUD operations
- Stock indicator with color coding
- Format Rupiah for prices
- Pagination (10 items per page)
- Search functionality

#### Categories Module
- Full CRUD operations
- Auto-slug generation from name
- Active/Inactive status toggle
- Format Rupiah integration
- Pagination and search

#### Orders Module
- Full CRUD operations
- Order number unique validation
- Status management (pending, processing, completed, cancelled)
- Customer information tracking
- Format Rupiah for amounts
- Status badges with icons

#### Users Module
- Full CRUD operations
- Status management (active, inactive, suspended, pending)
- Role management (admin, user)
- Avatar with initials
- Password hashing (bcrypt)
- Optional password update

### Helpers
- CurrencyHelper::formatRupiah() - Format to Rupiah
- CurrencyHelper::formatRupiahDecimal() - Format to Rupiah with decimals

### Database
- products table (id, name, description, price, quantity, timestamps)
- categories table (id, name, description, slug, is_active, timestamps)
- orders table (id, order_number, customer_name, customer_email, customer_phone, total_amount, status, notes, timestamps)
- users table enhanced (status, role fields added)

### Seeders
- ProductSeeder - 5 sample products
- CategorySeeder - 3 sample categories
- OrderSeeder - 3 sample orders with various statuses
- DatabaseSeeder - Main seeder

### UI/UX
- Modern gradient sidebar
- Responsive design (mobile-friendly)
- Color-coded badges
- Tooltips on action buttons
- Confirmation dialogs for delete
- Empty state messages with CTAs
- JavaScript search functionality

### Security
- CSRF protection on all forms
- Password hashing with bcrypt
- SQL injection protection (Eloquent ORM)
- XSS protection (Blade templating)
- Form validation on all inputs

## [1.0.0] - 2026-01-19

### Initial Release
- Complete admin dashboard CRUD system
- 4 modules: Dashboard, Products, Categories, Orders, Users
- Bootstrap 5 responsive design
- Indonesian Rupiah currency format
- Comprehensive documentation
- Installation guide
- Developer guide
- API documentation
