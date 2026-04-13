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
                            <i class="ti ti-lock text-dark table-icon me-3 mb-1" style="font-size: 1.5rem;"></i>
                            <div>
                                <h4 class="card-title mb-0">Manage Audit Logs</h4>
                                <small class="text-muted">All list audit logs</small>
                            </div>
                        </div>
                        <hr>

                        <div class="table-responsive-md mt-3">
                            <table class="table table-hover align-middle" id="table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>User</th>
                                        <th>Role</th>
                                        <th>Description</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listAuditLog as $index => $audit)
                                    <tr>
                                        <td>{{ $audit->created_at->format('d-m-Y h:i A')  }}</td>
                                        <td>{{ $audit->user->name ?? 'N/A' }}</td>
                                        <td>{!! $audit->role !!}</td>
                                        <td>{{ $audit->description }}</td>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <a href="{{ route('audit_log.show', $audit->uuid) }}" 
                                                class="btn btn-sm btn-warning me-2" 
                                                title="Edit">
                                                    <i class="ti ti-eye"></i>
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