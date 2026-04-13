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
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="container col-12 col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-end">
                            <i class="ti ti-user-plus text-dark table-icon me-3 mb-1"></i>
                            <div>
                                <h4 class="card-title mb-0">Fill User Information</h4>
                                <small>Create a new system account</small>
                            </div>
                        </div>
                        <hr class="mb-3">
                        
                        <form action="{{ route('user.store') }}" method="post">
                        @csrf
                            <div class="row">
                                <div class="form-group col-12 mb-3">
                                    <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter full name.." value="{{ old('name') }}" required>
                                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="example@mail.com" value="{{ old('email') }}" required>
                                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" placeholder="e.g. 0123456789" value="{{ old('phone_number') }}">
                                    @error('phone_number') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label class="form-label">Role <span class="text-danger">*</span></label>
                                    <select name="role" class="form-select" required>
                                        <option value="" selected disabled>Select Role</option>

                                        @foreach ($listRole as $role)
                                        <option value="{{ $role['value'] }}">{{ $role['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('role') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label class="form-label">Position <span class="text-danger">*</span></label>
                                    <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" placeholder="e.g. Warehouse Manager" value="{{ old('position') }}">
                                    @error('position') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>

                            <small class="text-danger">** Default username and password will be <b>Phone Number</b></small>

                            <div class="d-flex align-items-center justify-content-end my-3">
                                <a href="{{ route('user.index') }}" class="btn btn-danger me-2">
                                    <div class="d-flex align-items-center">
                                        <i class="ti ti-arrow-left me-1"></i>
                                        Back
                                    </div>
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="ti ti-user-check me-1"></i> Create User
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