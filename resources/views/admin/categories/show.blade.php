@extends('admin.layouts.app')

@section('title', 'Category Details')

@section('page-title', 'Category Details')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card table-card">
            <div class="card-header">
                <i class="bi bi-tags me-2"></i>Category Information
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th width="30%"><i class="bi bi-hash me-2"></i>ID</th>
                            <td>{{ $category->id }}</td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-tag me-2"></i>Name</th>
                            <td><strong>{{ $category->name }}</strong></td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-link me-2"></i>Slug</th>
                            <td><code>{{ $category->slug }}</code></td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-card-text me-2"></i>Description</th>
                            <td>{{ $category->description ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-toggle-on me-2"></i>Status</th>
                            <td>
                                @if($category->is_active)
                                    <span class="badge bg-success fs-6">
                                        <i class="bi bi-check-circle me-1"></i>Active
                                    </span>
                                @else
                                    <span class="badge bg-secondary fs-6">
                                        <i class="bi bi-x-circle me-1"></i>Inactive
                                    </span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-calendar me-2"></i>Created At</th>
                            <td>{{ $category->created_at->format('F d, Y - g:i A') }}</td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-calendar-check me-2"></i>Updated At</th>
                            <td>{{ $category->updated_at->format('F d, Y - g:i A') }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-2"></i>Back to List
                    </a>
                    <div>
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary">
                            <i class="bi bi-pencil me-2"></i>Edit
                        </a>
                        <form action="{{ route('categories.destroy', $category) }}"
                              method="POST"
                              style="display: inline-block;"
                              onsubmit="return confirm('Are you sure you want to delete this category?');">
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
