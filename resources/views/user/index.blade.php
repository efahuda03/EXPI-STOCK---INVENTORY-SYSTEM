@extends('layout.app')
@section('content')
<div class="body-wrapper-inner" style="height: 100%;">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h3 class="mb-1">{{ $page['title'] }}</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $page['title'] }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-end">
                    <a href="{{ route('user.create') }}" class="btn btn-primary btn-table">
                        <div class="d-flex align-items-center">
                            <i class="ti ti-user-plus me-1"></i>
                            Add New User
                        </div>
                    </a>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="ti ti-users text-dark table-icon me-3 mb-1" style="font-size: 1.5rem;"></i>
                            <div>
                                <h4 class="card-title mb-0">Manage Users</h4>
                                <small class="text-muted">System access control and user profiles</small>
                            </div>
                        </div>
                        <hr>

                        <div class="table-responsive-md mt-3">
                            <table class="table table-hover align-middle" id="table">
                                <thead>
                                    <tr>
                                        <th width="60">No.</th>
                                        <th>Name / Username</th>
                                        <th>Email / Phone</th>
                                        <th>Position</th>
                                        <th class="text-center">Role</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center" width="150">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listUser as $index => $user)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span class="fw-bold text-dark">{{ $user->name }}</span>
                                                <small class="text-muted">@ {{ $user->username }}</small>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span>{{ $user->email }}</span>
                                                <small class="text-muted">{{ $user->phone_number ?? '-' }}</small>
                                            </div>
                                        </td>
                                        <td>{{ $user->position ?? '-' }}</td>
                                        <td class="text-center">{!! $user->role !!}</td>
                                        <td class="text-center">{!! $user->status !!}</td>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <a href="{{ route('user.edit', $user->uuid) }}" 
                                                class="btn btn-sm btn-info me-2" 
                                                title="Edit">
                                                    <i class="ti ti-edit"></i>
                                                </a>

                                                <button type="button" 
                                                        class="btn btn-sm btn-danger" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#modalDelete{{ $user->id }}">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </div>

                                            <div class="modal fade" id="modalDelete{{ $user->id }}" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Delete User</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body text-center py-4">
                                                            <i class="ti ti-user-x text-danger mb-2" style="font-size: 3rem;"></i>
                                                            <p class="mb-0">Are you sure you want to delete user:</p>
                                                            <h4 class="mt-2">{{ $user->name }}</h4>
                                                            <p class="small text-muted">Username: {{ $user->username }}</p>
                                                            <small class="text-danger">Warning: This user will lose all access to the system.</small>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <form action="{{ route('user.destroy', $user->uuid) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger">Yes, Delete User</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection