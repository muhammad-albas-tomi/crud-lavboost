@extends('admin.layouts.app')

@section('title', 'Create Order - Admin Dashboard')

@section('page-title', 'Create Order')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="mb-1">Create New Order</h4>
        <p class="text-muted mb-0">Add a new customer order</p>
    </div>
    <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-2"></i>Back to Orders
    </a>
</div>

<div class="card form-card">
    <div class="card-header">
        <i class="bi bi-plus-circle me-2"></i>Order Information
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('orders.store') }}">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="order_number" class="form-label">
                            Order Number <span class="text-danger">*</span>
                        </label>
                        <input type="text"
                               class="form-control @error('order_number') is-invalid @enderror"
                               id="order_number"
                               name="order_number"
                               value="{{ old('order_number', 'ORD-' . strtoupper(uniqid())) }}"
                               placeholder="ORD-123456"
                               required>
                        @error('order_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="total_amount" class="form-label">
                            Total Amount <span class="text-danger">*</span>
                        </label>
                        <input type="number"
                               class="form-control @error('total_amount') is-invalid @enderror"
                               id="total_amount"
                               name="total_amount"
                               value="{{ old('total_amount') }}"
                               step="0.01"
                               min="0"
                               placeholder="0.00"
                               required>
                        @error('total_amount')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="customer_name" class="form-label">
                            Customer Name <span class="text-danger">*</span>
                        </label>
                        <input type="text"
                               class="form-control @error('customer_name') is-invalid @enderror"
                               id="customer_name"
                               name="customer_name"
                               value="{{ old('customer_name') }}"
                               placeholder="John Doe"
                               required>
                        @error('customer_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="customer_email" class="form-label">
                            Customer Email <span class="text-danger">*</span>
                        </label>
                        <input type="email"
                               class="form-control @error('customer_email') is-invalid @enderror"
                               id="customer_email"
                               name="customer_email"
                               value="{{ old('customer_email') }}"
                               placeholder="john@example.com"
                               required>
                        @error('customer_email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="customer_phone" class="form-label">
                            Customer Phone <span class="text-danger">*</span>
                        </label>
                        <input type="text"
                               class="form-control @error('customer_phone') is-invalid @enderror"
                               id="customer_phone"
                               name="customer_phone"
                               value="{{ old('customer_phone') }}"
                               placeholder="+1234567890"
                               required>
                        @error('customer_phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="status" class="form-label">
                            Order Status <span class="text-danger">*</span>
                        </label>
                        <select class="form-select @error('status') is-invalid @enderror"
                                id="status"
                                name="status"
                                required>
                            <option value="">Select Status</option>
                            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="processing" {{ old('status') == 'processing' ? 'selected' : '' }}>Processing</option>
                            <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                        @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="notes" class="form-label">
                            Order Notes
                        </label>
                        <textarea class="form-control @error('notes') is-invalid @enderror"
                                  id="notes"
                                  name="notes"
                                  rows="4"
                                  placeholder="Add any notes or special instructions">{{ old('notes') }}</textarea>
                        @error('notes')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-between">
                <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-x-lg me-2"></i>Cancel
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg me-2"></i>Create Order
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
