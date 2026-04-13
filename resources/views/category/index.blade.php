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

        <!--  widget -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-end mb-3">
                    <a href="{{ route('category.create') }}" class="btn btn-primary">
                        <div class="d-flex align-items-center">
                            <i class="ti ti-plus me-1"></i>
                            Create Category
                        </div>
                    </a>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="ti ti-tag text-dark table-icon me-3 mb-1" style="font-size: 1.5rem;"></i>
                            <div>
                                <h4 class="card-title mb-0">Manage Category</h4>
                                <small class="text-muted">List of all categories in the system</small>
                            </div>
                        </div>
                        <hr>

                        <div class="table-responsive-md mt-3">
                            <table class="table table-hover" id="table">
                                <thead>
                                    <tr>
                                        <th width="80">No.</th>
                                        <th>Category Name</th>
                                        <th class="text-center">Created At</th>
                                        <th class="text-center" width="200">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listCategory as $index => $category)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td class="text-center">{{ $category->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <a href="{{ route('category.edit', $category->uuid) }}" 
                                                class="btn btn-sm btn-info me-2" 
                                                title="Edit">
                                                    <i class="ti ti-edit"></i>
                                                </a>

                                                <button type="button" 
                                                        class="btn btn-sm btn-danger" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#modalDelete{{ $category->id }}">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </div>

                                            <div class="modal fade" id="modalDelete{{ $category->id }}" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Delete Category</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body text-center py-4">
                                                            <i class="ti ti-alert-triangle text-danger mb-2" style="font-size: 3rem;"></i>
                                                            <p class="mb-0">Are you sure you want to delete category:</p>
                                                            <h4 class="mt-2">{{ $category->name }}?</h4>
                                                            <small class="text-muted">This action cannot be undone.</small>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <form action="{{ route('category.destroy', $category->uuid) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger">Yes, Delete</button>
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