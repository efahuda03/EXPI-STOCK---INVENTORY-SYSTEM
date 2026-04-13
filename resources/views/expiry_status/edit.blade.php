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
                        <li class="breadcrumb-item"><a href="{{ route('expiry_status.index') }}">Expiry Status</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Status</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="container col-12 col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <i class="ti ti-calendar-time text-dark table-icon me-3 mb-1"></i>
                            <div>
                                <h4 class="card-title mb-0">Update Expiry Rule</h4>
                                <small>Define the range of days for <strong>{{ $expiry_status->name }}</strong> status</small>
                            </div>
                        </div>
                        <hr class="mb-4">
                        
                        <form action="{{ route('expiry_status.update', $expiry_status->uuid) }}" method="post">
                        @csrf
                        @method('PUT')
                            <div class="row">
                                {{-- Status Name (Read Only) --}}
                                <div class="form-group col-12 mb-3">
                                    <label class="form-label font-weight-bold">Status Name</label>
                                    <input type="text" class="form-control bg-light" value="{{ $expiry_status->name }}" readonly disabled>
                                </div>

                                {{-- Priority --}}
                                <div class="form-group col-12 mb-3">
                                    <label class="form-label">Priority Level <span class="text-danger">*</span></label>
                                    <input type="number" name="priority" class="form-control" value="{{ $expiry_status->priority }}" required>
                                    <small class="text-muted">1 is highest priority (e.g. Expired)</small>
                                    @error('priority') <small class="text-danger d-block">{{ $message }}</small> @enderror
                                </div>

                                {{-- Min Day --}}
                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label class="form-label">Minimum Day <span class="text-danger">*</span></label>
                                    <input type="number" name="min_day" class="form-control" value="{{ $expiry_status->min_day }}" required>
                                    @error('min_day') <small class="text-danger d-block">{{ $message }}</small> @enderror
                                </div>

                                {{-- Max Day --}}
                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label class="form-label">Maximum Day <span class="text-danger">*</span></label>
                                    <input type="number" name="max_day" class="form-control" value="{{ $expiry_status->max_day }}" required>
                                    @error('max_day') <small class="text-danger d-block">{{ $message }}</small> @enderror
                                </div>
                            </div>

                            <div class="alert alert-info py-2 mt-2">
                                <small><i class="ti ti-info-circle"></i> Tip: Use <strong>-9999</strong> for infinite past and <strong>9999</strong> for infinite future.</small>
                            </div>

                            <div class="d-flex align-items-center justify-content-end mt-4">
                                <a href="{{ route('expiry_status.index') }}" class="btn btn-light border me-2">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="ti ti-device-floppy me-1"></i> Update Status
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