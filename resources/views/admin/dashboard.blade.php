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

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stats-card">
            <div class="card-body d-flex align-items-center">
                <div class="icon success">
                    <i class="bi bi-tags"></i>
                </div>
                <div class="ms-3">
                    <h3>{{ $stats['total_categories'] }}</h3>
                    <p>Categories</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stats-card">
            <div class="card-body d-flex align-items-center">
                <div class="icon warning">
                    <i class="bi bi-cart-check"></i>
                </div>
                <div class="ms-3">
                    <h3>{{ $stats['total_orders'] }}</h3>
                    <p>Total Orders</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stats-card">
            <div class="card-body d-flex align-items-center">
                <div class="icon info">
                    <i class="bi bi-people"></i>
                </div>
                <div class="ms-3">
                    <h3>{{ $stats['total_users'] }}</h3>
                    <p>Total Users</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Additional Stats -->
<div class="row mb-4">
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card stats-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h6 class="text-muted mb-0">Pending Orders</h6>
                    <span class="badge bg-warning text-dark">{{ $stats['pending_orders'] }}</span>
                </div>
                <h4 class="mb-0">{{ $stats['pending_orders'] }}</h4>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card stats-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h6 class="text-muted mb-0">Completed Orders</h6>
                    <span class="badge bg-success">{{ $stats['completed_orders'] }}</span>
                </div>
                <h4 class="mb-0">{{ $stats['completed_orders'] }}</h4>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card stats-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h6 class="text-muted mb-0">Total Revenue</h6>
                    <span class="badge bg-primary">Rp</span>
                </div>
                <h4 class="mb-0">{{ \App\Helpers\CurrencyHelper::formatRupiah($stats['total_revenue']) }}</h4>
            </div>
        </div>
    </div>
</div>

<!-- Recent Products & Orders -->
<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card table-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="bi bi-box-seam me-2"></i>Recent Products</span>
                <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary">View All</a>
            </div>
            <div class="card-body p-0">
                @if($stats['recent_products']->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stats['recent_products'] as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td><span class="badge bg-success">{{ \App\Helpers\CurrencyHelper::formatRupiah($product->price) }}</span></td>
                                        <td><span class="badge bg-info">{{ $product->quantity }}</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-4">
                        <i class="bi bi-inbox fs-1 text-muted"></i>
                        <p class="text-muted mt-2">No products yet</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-lg-6 mb-4">
        <div class="card table-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="bi bi-cart-check me-2"></i>Recent Orders</span>
                <a href="{{ route('orders.index') }}" class="btn btn-sm btn-primary">View All</a>
            </div>
            <div class="card-body p-0">
                @if($stats['recent_orders']->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Order #</th>
                                    <th>Customer</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stats['recent_orders'] as $order)
                                    <tr>
                                        <td>{{ $order->order_number }}</td>
                                        <td>{{ $order->customer_name }}</td>
                                        <td><span class="badge bg-success">{{ \App\Helpers\CurrencyHelper::formatRupiah($order->total_amount) }}</span></td>
                                        <td>
                                            @php
                                                $statusColors = [
                                                    'pending' => 'warning',
                                                    'processing' => 'info',
                                                    'completed' => 'success',
                                                    'cancelled' => 'danger'
                                                ];
                                                $color = $statusColors[$order->status] ?? 'secondary';
                                            @endphp
                                            <span class="badge bg-{{ $color }}">{{ ucfirst($order->status) }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-4">
                        <i class="bi bi-inbox fs-1 text-muted"></i>
                        <p class="text-muted mt-2">No orders yet</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card table-card">
            <div class="card-header">
                <i class="bi bi-lightning-charge me-2"></i>Quick Actions
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('products.create') }}" class="btn btn-primary w-100 py-3">
                            <i class="bi bi-plus-circle d-block fs-2 mb-1"></i>
                            Add Product
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('categories.create') }}" class="btn btn-success w-100 py-3">
                            <i class="bi bi-tag d-block fs-2 mb-1"></i>
                            Add Category
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('orders.create') }}" class="btn btn-info w-100 py-3">
                            <i class="bi bi-cart-plus d-block fs-2 mb-1"></i>
                            New Order
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('users.create') }}" class="btn btn-warning w-100 py-3">
                            <i class="bi bi-person-plus d-block fs-2 mb-1"></i>
                            Add User
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
