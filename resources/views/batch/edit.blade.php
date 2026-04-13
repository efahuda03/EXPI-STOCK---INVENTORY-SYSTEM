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
                        <li class="breadcrumb-item"><a href="{{ route('batch.index') }}">Batch</a></li>
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
                            <i class="ti ti-package text-dark table-icon me-3 mb-1"></i>
                            <div>
                                <h4 class="card-title mb-0">Edit Batch Information</h4>
                                <small>Update existing stock entry</small>
                            </div>
                        </div>
                        <hr class="mb-3">
                        
                        {{-- Tukar action ke update dan tambah @method('PUT') --}}
                        <form action="{{ route('batch.update', $batch->uuid) }}" method="post">
                        @csrf
                        @method('PUT')
                            <div class="row">
                                <div class="form-group col-12 mb-3">
                                    <label class="form-label">Product <span class="text-danger">*</span></label>
                                    <select name="product_id" class="form-select @error('product_id') is-invalid @enderror" required>
                                        @foreach ($listProduct as $product)
                                            <option value="{{ $product->id }}" {{ old('product_id', $batch->product_id) == $product->id ? 'selected' : '' }}>
                                                {{ $product->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('product_id') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label class="form-label">Quantity <span class="text-danger">*</span></label>
                                    <input type="number" name="quantity" class="form-control" value="{{ old('quantity', $batch->quantity) }}" min="1" required>
                                    @error('quantity') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                {{-- Papar Batch Number sedia ada (Readonly) --}}
                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label class="form-label">Batch Number</label>
                                    <input type="text" class="form-control bg-light" value="{{ $batch->batch_number }}" readonly>
                                </div>

                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label class="form-label">Receive Date <span class="text-danger">*</span></label>
                                    <input type="date" name="receive_date" class="form-control" value="{{ old('receive_date', $batch->receive_date) }}" required>
                                    @error('receive_date') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label class="form-label">Expiry Date <span class="text-danger">*</span></label>
                                    <input type="date" name="expiry_date" class="form-control" value="{{ old('expiry_date', $batch->expiry_date) }}" required>
                                    @error('expiry_date') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-end my-3">
                                <a href="{{ route('batch.index') }}" class="btn btn-danger me-2">
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