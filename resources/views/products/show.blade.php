@extends('layouts.app')

@section('title', 'View Product')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0"><i class="bi bi-eye"></i> Product Details</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th width="30%"><i class="bi bi-hash"></i> ID</th>
                            <td>{{ $product->id }}</td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-tag"></i> Name</th>
                            <td><strong>{{ $product->name }}</strong></td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-card-text"></i> Description</th>
                            <td>{{ $product->description }}</td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-currency-dollar"></i> Price</th>
                            <td><span class="badge bg-success fs-6">${{ number_format($product->price, 2) }}</span></td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-box"></i> Quantity</th>
                            <td><span class="badge bg-info fs-6">{{ $product->quantity }} units</span></td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-calendar"></i> Created At</th>
                            <td>{{ $product->created_at->format('F d, Y - g:i A') }}</td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-calendar-check"></i> Updated At</th>
                            <td>{{ $product->updated_at->format('F d, Y - g:i A') }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Back to List
                    </a>
                    <div>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('products.destroy', $product) }}"
                              method="POST"
                              style="display: inline-block;"
                              onsubmit="return confirm('Are you sure you want to delete this product?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
