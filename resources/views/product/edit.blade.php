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
            <div class="container col-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-end">
                            <i class="ti ti-edit text-dark table-icon me-3 mb-1"></i>
                            <div>
                                <h4 class="card-title mb-0">Update Information</h4>
                                <small>Modify the product details below</small>
                            </div>
                        </div>
                        <hr class="mb-3">
                        
                        {{-- 1. Action ke route update dengan UUID --}}
                        <form action="{{ route('product.update', $product->uuid) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') {{-- 2. Method PUT untuk Update --}}

                            <div class="row">
                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label class="form-label">Category <span class="text-danger">*</span></label>
                                    <select name="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                                        {{-- 3. Logic selected untuk Edit --}}
                                        @foreach ($listCategory as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label class="form-label">Product Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
                                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label class="form-label">Brand <span class="text-danger">*</span></label>
                                    <input type="text" name="brand" class="form-control" value="{{ old('brand', $product->brand) }}" required>
                                    @error('brand') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label class="form-label">Retail Price (RM) <span class="text-danger">*</span></label>
                                    <input type="number" name="retail_price" step="0.01" class="form-control" value="{{ old('retail_price', $product->retail_price) }}" required>
                                    @error('retail_price') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label class="form-label">Supplier Name <span class="text-danger">*</span></label>
                                    <input type="text" name="supplier_name" class="form-control" value="{{ old('supplier_name', $product->supplier_name) }}" required>
                                    @error('supplier_name') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label class="form-label">Supplier Contact <span class="text-danger">*</span></label>
                                    <input type="text" name="supplier_contact" class="form-control" value="{{ old('supplier_contact', $product->supplier_contact) }}" required>
                                    @error('supplier_contact') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label class="form-label">Product Image</label>
                                    <input type="file" name="image" class="form-control" accept=".jpg, .jpeg, .png">
                                    <small class="text-muted">Format: jpg, jpeg, png</small><br>
                                    <small class="text-muted d-block">Leave empty if you don't want to change the image</small>
                                    @error('image') <small class="text-danger d-block">{{ $message }}</small> @enderror
                                    
                                    {{-- Paparkan imej sedia ada --}}
                                    @if($product->image)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $product->image) }}" class="rounded shadow-sm" width="120">
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label class="form-label">Created By</label>
                                    <input type="text" class="form-control" value="{{ $product->createdBy->name }}" disabled>
                                </div>

                                <div class="form-group col-12 mb-3">
                                    <label class="form-label">Description <span class="text-danger">*</span></label>
                                    <textarea name="description" class="form-control" rows="4">{{ old('description', $product->description) }}</textarea>
                                    @error('description') <small class="text-danger d-block">{{ $message }}</small> @enderror
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-end my-3">
                                <a href="{{ route('product.index') }}" class="btn btn-danger me-2">
                                    <div class="d-flex align-items-center">
                                        <i class="ti ti-arrow-left me-1"></i> Back
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