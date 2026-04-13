@extends('layout.app')
@section('content')
<div class="body-wrapper-inner" style="height: 100%;">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h3 class="mb-1">{{ $page['title'] }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $page['title'] }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="container col-12 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-end">
                            <i class="ti ti-tag text-dark table-icon me-3 mb-1"></i>
                            <div>
                                <h4 class="card-title mb-0">Fill all Information</h4>
                                <small>Please fill all information below</small>
                            </div>
                        </div>
                        <hr class="mb-3">
                        <form action="{{ route('category.store') }}" method="post">
                        @csrf
                            <div class="row">
                                <div class="form-group col-12 mb-3">
                                    <label class="form-label">Category Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter category name.." value="{{ old('name') }}" required>
                                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-end my-3">
                                <a
                                href="{{ route('category.index') }}"
                                class="btn btn-danger me-2">
                                <div class="d-flex align-items-center">
                                        <i class="ti ti-arrow-left me-1"></i>
                                        Back
                                    </div>
                                </a>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection