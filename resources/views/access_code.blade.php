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
                                <h4 class="card-title mb-0">Manage Access Codes</h4>
                                <small class="text-muted">All list access codes</small>
                            </div>
                        </div>
                        <hr>

                        <div class="table-responsive-md mt-3">
                            <table class="table table-hover align-middle" id="table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>User</th>
                                        <th>Code</th>
                                        <th>Updated At</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listAccessCode as $index => $accessCode)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $accessCode->name ?? '-' }}</td>
                                        <td>{{ $accessCode->code ?? '-' }}</td>
                                        <td>{{ optional($accessCode->updated_at)->format('d-m-Y') ?? '-' }}</td>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <a href="{{ route('access_code.generate', $accessCode->uuid) }}" 
                                                class="btn btn-sm btn-secondary me-2 text-white">
                                                    <div class="d-flex align-items-center">
                                                        <i class="ti ti-refresh me-1"></i>
                                                        <span>Generate</span>
                                                    </div>
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