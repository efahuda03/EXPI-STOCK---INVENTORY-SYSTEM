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
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="container col-12 col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-end">
                            <i class="ti ti-user text-dark table-icon me-3 mb-1"></i>
                            <div>
                                <h4 class="card-title mb-0">Update User Information</h4>
                                <small>Modify existing system account</small>
                            </div>
                        </div>
                        <hr class="mb-3">
                        
                        <form action="{{ route('user.update', $user->uuid) }}" method="post">
                        @csrf
                        @method('PUT')
                            <div class="row">
                                <div class="form-group col-12 mb-3">
                                    <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter full name.." value="{{ old('name', $user->name) }}" required>
                                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control" placeholder="example@mail.com" value="{{ old('email', $user->email) }}" required>
                                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                                    <input type="text" name="phone_number" class="form-control" placeholder="e.g. 0123456789" value="{{ old('phone_number', $user->phone_number) }}">
                                    @error('phone_number') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label class="form-label">Status <span class="text-danger">*</span></label>
                                    <select name="is_active" class="form-select" required>
                                        <option value="" disabled>Select Status</option>
                                        @foreach ($listStatus as $status)
                                            <option value="{{ $status['value'] }}" {{ old('is_active', $user->is_active) == $status['value'] ? 'selected' : '' }}>
                                                {{ $status['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('is_active') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label class="form-label">Role <span class="text-danger">*</span></label>
                                    <select name="role" class="form-select" required>
                                        <option value="" disabled>Select Role</option>
                                        @foreach ($listRole as $role)
                                        <option value="{{ $role['value'] }}" {{ old('role', $user->getRoleNames()->first()) == $role['value'] ? 'selected' : '' }}>
                                            {{ $role['name'] }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('role') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label class="form-label">Position <span class="text-danger">*</span></label>
                                    <input type="text" name="position" class="form-control" placeholder="e.g. Warehouse Manager" value="{{ old('position', $user->position) }}" required>
                                    @error('position') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-end my-3">
                                <a href="{{ route('user.index') }}" class="btn btn-danger me-2">
                                    <div class="d-flex align-items-center">
                                        <i class="ti ti-arrow-left me-1"></i>
                                        Back
                                    </div>
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="ti ti-device-floppy me-1"></i> Update User
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection