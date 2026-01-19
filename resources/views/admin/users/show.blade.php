@extends('admin.layouts.app')

@section('title', 'User Details')

@section('page-title', 'User Details')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card table-card">
            <div class="card-header">
                <i class="bi bi-person me-2"></i>User Information
            </div>
            <div class="card-body">
                <div class="text-center mb-4">
                    <div class="avatar-circle bg-primary text-white d-inline-flex align-items-center justify-content-center rounded-circle"
                         style="width: 100px; height: 100px; font-size: 2.5rem;">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <h4 class="mt-3">{{ $user->name }}</h4>
                    <p class="text-muted mb-0">{{ $user->email }}</p>
                </div>

                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th width="30%"><i class="bi bi-hash me-2"></i>ID</th>
                            <td>{{ $user->id }}</td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-person me-2"></i>Name</th>
                            <td><strong>{{ $user->name }}</strong></td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-envelope me-2"></i>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-shield me-2"></i>Role</th>
                            <td>
                                @if($user->role === 'admin')
                                    <span class="badge bg-primary fs-6">
                                        <i class="bi bi-person-check me-1"></i>Admin
                                    </span>
                                @else
                                    <span class="badge bg-info fs-6">
                                        <i class="bi bi-person me-1"></i>User
                                    </span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-toggle-on me-2"></i>Status</th>
                            <td>
                                @if($user->status === 'active')
                                    <span class="badge bg-success fs-6">
                                        <i class="bi bi-check-circle me-1"></i>Active
                                    </span>
                                @elseif($user->status === 'inactive')
                                    <span class="badge bg-secondary fs-6">
                                        <i class="bi bi-dash-circle me-1"></i>Inactive
                                    </span>
                                @elseif($user->status === 'suspended')
                                    <span class="badge bg-danger fs-6">
                                        <i class="bi bi-x-circle me-1"></i>Suspended
                                    </span>
                                @elseif($user->status === 'pending')
                                    <span class="badge bg-warning fs-6">
                                        <i class="bi bi-clock me-1"></i>Pending
                                    </span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-calendar me-2"></i>Joined At</th>
                            <td>{{ $user->created_at->format('F d, Y - g:i A') }}</td>
                        </tr>
                        <tr>
                            <th><i class="bi bi-calendar-check me-2"></i>Updated At</th>
                            <td>{{ $user->updated_at->format('F d, Y - g:i A') }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-2"></i>Back to List
                    </a>
                    <div>
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-primary">
                            <i class="bi bi-pencil me-2"></i>Edit
                        </a>
                        <form action="{{ route('users.destroy', $user) }}"
                              method="POST"
                              style="display: inline-block;"
                              onsubmit="return confirm('Are you sure you want to delete this user?');">
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
