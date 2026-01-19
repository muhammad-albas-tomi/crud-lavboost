@extends('admin.layouts.app')

@section('title', 'Order Details')

@section('page-title', 'Order Details')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card table-card">
            <div class="card-header">
                <i class="bi bi-cart-check me-2"></i>Order Information
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th width="30%"><i class="bi bi-hash me-2"></i>ID</th>
                            <td>{{ $order->id }}</td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-receipt me-2"></i>Order Number</th>
                            <td><strong>{{ $order->order_number }}</strong></td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-person me-2"></i>Customer Name</th>
                            <td>{{ $order->customer_name }}</td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-envelope me-2"></i>Customer Email</th>
                            <td>{{ $order->customer_email }}</td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-telephone me-2"></i>Customer Phone</th>
                            <td>{{ $order->customer_phone }}</td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-currency-dollar me-2"></i>Total Amount</th>
                            <td><span class="badge bg-success fs-6">{{ \App\Helpers\CurrencyHelper::formatRupiah($order->total_amount) }}</span></td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-info-circle me-2"></i>Status</th>
                            <td>
                                @php
                                    $statusColors = [
                                        'pending' => 'warning',
                                        'processing' => 'info',
                                        'completed' => 'success',
                                        'cancelled' => 'danger'
                                    ];
                                    $color = $statusColors[$order->status] ?? 'secondary';
                                    $statusIcons = [
                                        'pending' => 'clock',
                                        'processing' => 'gear',
                                        'completed' => 'check-circle',
                                        'cancelled' => 'x-circle'
                                    ];
                                    $icon = $statusIcons[$order->status] ?? 'question-circle';
                                @endphp
                                <span class="badge bg-{{ $color }} fs-6">
                                    <i class="bi bi-{{ $icon }} me-1"></i>{{ ucfirst($order->status) }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-sticky me-2"></i>Notes</th>
                            <td>{{ $order->notes ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-calendar me-2"></i>Created At</th>
                            <td>{{ $order->created_at->format('F d, Y - g:i A') }}</td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-calendar-check me-2"></i>Updated At</th>
                            <td>{{ $order->updated_at->format('F d, Y - g:i A') }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('orders.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-2"></i>Back to List
                    </a>
                    <div>
                        <a href="{{ route('orders.edit', $order) }}" class="btn btn-primary">
                            <i class="bi bi-pencil me-2"></i>Edit
                        </a>
                        <form action="{{ route('orders.destroy', $order) }}"
                              method="POST"
                              style="display: inline-block;"
                              onsubmit="return confirm('Are you sure you want to delete this order?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash me-2"></i>Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
