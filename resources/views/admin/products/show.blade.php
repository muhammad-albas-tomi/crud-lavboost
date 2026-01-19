@extends('admin.layouts.app')

@section('title', 'Product Details')

@section('page-title', 'Product Details')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card table-card">
            <div class="card-header">
                <i class="bi bi-box-seam me-2"></i>Product Information
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th width="30%"><i class="bi bi-hash me-2"></i>ID</th>
                            <td>{{ $product->id }}</td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-tag me-2"></i>Name</th>
                            <td><strong>{{ $product->name }}</strong></td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-card-text me-2"></i>Description</th>
                            <td>{{ $product->description }}</td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-currency-dollar me-2"></i>Price</th>
                            <td><span class="badge bg-success fs-6">{{ \App\Helpers\CurrencyHelper::formatRupiah($product->price) }}</span></td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-box me-2"></i>Quantity</th>
                            <td>
                                <span class="badge @if($product->quantity > 50) bg-success @elseif($product->quantity > 20) bg-warning @else bg-danger @endif fs-6">
                                    {{ $product->quantity }} units
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-calendar me-2"></i>Created At</th>
                            <td>{{ $product->created_at->format('F d, Y - g:i A') }}</td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-calendar-check me-2"></i>Updated At</th>
                            <td>{{ $product->updated_at->format('F d, Y - g:i A') }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-2"></i>Back to List
                    </a>
                    <div>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-primary">
                            <i class="bi bi-pencil me-2"></i>Edit
                        </a>
                        <form action="{{ route('products.destroy', $product) }}"
                              method="POST"
                              style="display: inline-block;"
                              onsubmit="return confirm('Are you sure you want to delete this product?');">
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
