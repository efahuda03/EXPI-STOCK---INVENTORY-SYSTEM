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
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="ti ti-calendar-time text-dark table-icon me-3 mb-1" style="font-size: 1.5rem;"></i>
                            <div>
                                <h4 class="card-title mb-0">Manage Expiry Status</h4>
                                <small class="text-muted">All expiry status in system</small>
                            </div>
                        </div>
                        <hr>

                        <div class="table-responsive-md mt-3">
                            <table class="table table-hover align-middle" id="table">
                                <thead>
                                    <tr>
                                        <th style="width: 50px;" class="text-center">No.</th>
                                        <th>Status Name</th>
                                        <th class="text-center">Priority</th>
                                        <th>Day Range Coverage</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listExpiryStatus as $index => $expiry)
                                    <tr>
                                        <td class="text-center text-muted">{{ $index + 1 }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                {!! $expiry->badge !!}
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge rounded-pill bg-light text-dark border">
                                                <i class="ti ti-hash me-1"></i>{{ $expiry->priority }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="text-primary fw-bold">{{ $expiry->min_day }}</span>
                                                <span class="mx-2 text-muted">to</span>
                                                <span class="text-primary fw-bold">{{ $expiry->max_day }}</span>
                                                <small class="ms-2 text-muted italic">days</small>
                                            </div>
                                            {{-- Optional: Paparan teks cantik yang kita buat di Controller --}}
                                            <div class="small text-muted mt-1" style="font-size: 0.75rem;">
                                                <i class="ti ti-info-circle me-1"></i>{{ $expiry->range_display }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <a href="{{ route('expiry_status.edit', $expiry->uuid) }}" 
                                                class="btn btn-sm btn-outline-info d-flex align-items-center shadow-sm" 
                                                title="Edit Configuration">
                                                    <i class="ti ti-edit me-1"></i> Edit
                                                </a>
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