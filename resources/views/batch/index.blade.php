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
                    <a href="{{ route('batch.create') }}" class="btn btn-primary">
                        <div class="d-flex align-items-center">
                            <i class="ti ti-plus me-1"></i>
                            Add New Batch
                        </div>
                    </a>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="ti ti-package text-dark table-icon me-3 mb-1" style="font-size: 1.5rem;"></i>
                            <div>
                                <h4 class="card-title mb-0">Manage Batch</h4>
                                <small class="text-muted">Inventory batch tracking and expiry dates</small>
                            </div>
                        </div>
                        <hr>

                        <div class="table-responsive-md mt-3">
                            <table class="table table-hover align-middle" id="table">
                                <thead>
                                    <tr>
                                        <th>Batch No.</th>
                                        <th>Product</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-center">Receive</th>
                                        <th class="text-center">Expiry Date</th>
                                        <th class="text-center">Days Left</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listBatch as $batch)
                                    <tr>
                                        <td>
                                            <span class="fw-bold text-primary">{{ $batch->batch_number }}</span>
                                        </td>
                                        <td>{{ $batch->product->name ?? 'N/A' }}</td>
                                        <td class="text-center">{{ $batch->quantity }}</td>
                                        <td class="text-center">{{ $batch->receive_date  }}</td>
                                        <td class="text-center">{{ $batch->expiry_date  }}</td>
                                        <td class="text-center">{{ $batch->days_left }}</td>
                                        <td class="text-center">{!! $batch->expiry_status_badge !!}</td>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <a href="{{ route('batch.edit', $batch->uuid) }}" 
                                                class="btn btn-sm btn-info me-2" 
                                                title="Edit">
                                                    <i class="ti ti-edit"></i>
                                                </a>

                                                <button type="button" 
                                                        class="btn btn-sm btn-danger" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#modalDelete{{ $batch->id }}">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </div>

                                            <div class="modal fade" id="modalDelete{{ $batch->id }}" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Delete Batch</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body text-center py-4">
                                                            <i class="ti ti-alert-triangle text-danger mb-2" style="font-size: 3rem;"></i>
                                                            <p class="mb-0">Are you sure you want to delete batch:</p>
                                                            <h4 class="mt-2">{{ $batch->batch_number }}</h4>
                                                            <p class="small text-muted">Product: {{ $batch->product->name ?? 'N/A' }}</p>
                                                            <small class="text-danger">Warning: This will affect your stock count.</small>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <form action="{{ route('batch.destroy', $batch->uuid) }}" method="POST">
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