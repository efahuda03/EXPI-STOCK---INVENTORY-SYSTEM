@extends('layout.app')
@section('content')
<div class="body-wrapper-inner" style="height: 100%;">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h3 class="mb-1">Welcome, {{ implode(' ', array_slice(explode(' ', $user->name), 0, 2)) }}</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $page['title'] }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!--  widget -->
        <div class="row mb-4">
            <div class="col-xl-3">
                <div class="card-rounded bg-white py-3 px-4 mb-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6>Total Batch</h6>
                            <h2>{{ $widgetSummary['total_batch'] ?? '0' }}</h2>
                        </div>
                        <button
                        type="button"
                        class="btn bg-success-subtle text-success">
                            <i class="ti ti-user card-icon"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="card-rounded bg-white py-3 px-4 mb-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6>Expired Batch</h6>
                            <h2>{{ $widgetSummary['expired'] ?? '0' }}</h2>
                        </div>
                        <button
                        type="button"
                        class="btn bg-secondary-subtle text-secondary">
                            <i class="ti ti-package card-icon"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="card-rounded bg-white py-3 px-4 mb-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6>Critical Batch</h6>
                            <h2>{{ $widgetSummary['critical'] ?? '0' }}</h2>
                        </div>
                        <button
                        type="button"
                        class="btn bg-danger-subtle text-danger">
                            <i class="ti ti-alert-octagon card-icon"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="card-rounded bg-white py-3 px-4 mb-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6>Warning Batch</h6>
                            <h2>{{ $widgetSummary['warning'] ?? '0' }}</h2>
                        </div>
                        <button
                        type="button"
                        class="btn bg-warning-subtle text-warning">
                            <i class="ti ti-alert-triangle card-icon"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card h-100">
            <div class="card-body h-100">
                <div>
                    <h4 class="card-title mb-0">Upcoming Expiry - Priority Batch</h4>
                    <small class="text-muted">Recent Upcoming expiry information</small>
                </div>
                <hr>
                <div class="mt-3">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Batch No.</th>
                                    <th>Product</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-center">Receive</th>
                                    <th class="text-center">Expiry Date</th>
                                    <th class="text-center">Days Left</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($listPriorityBatch) > 0)
                                    @foreach ($listPriorityBatch as $batch)
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
                                    </tr>
                                    @endforeach
                                @else
                                
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xxl-5 h-100">
                <div class="card h-100">
                    <div class="card-body h-100">
                        <div>
                            <h4 class="card-title mb-0">Batch Status Distribution</h4>
                            <small class="text-muted">Overview of batch expiry status</small>
                        </div>
                        <hr>
                        <div class="mt-3">
                            <div id="expiryPieChart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-7">
                <div class="card" style="min-height: 400px;">
                    <div class="card-body">
                        <div>
                            <h4 class="card-title mb-0">Summary By Product</h4>
                            <small class="text-muted">Top 5 Inventory Summary By Product</small>
                        </div>
                        <hr>
                        <div class="mt-3">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>Product</td>
                                            <td>Batch</td>
                                            <td>Total Quantity</td>
                                            <td>Good</td>
                                            <td>Warning</td>
                                            <td>Critical</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($listProductBatch) > 0)
                                            @foreach ($listProductBatch as $product)
                                            <tr>
                                                <td>{{ $product->product_name }}</td>
                                                <td>{{ $product->total_batches }}</td>
                                                <td>{{ $product->total_quantity }}</td>
                                                <td>{{ $product->good }}</td>
                                                <td>{{ $product->warning }}</td>
                                                <td>{{ $product->critical }}</td>
                                            </tr>
                                            @endforeach
                                        @else
                                        
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script>
const labels = {!! $totalExpiryStatus['key'] !!};
const series = {!! $totalExpiryStatus['value'] !!};

if (series.length > 0) {
    const colorMap = {
        'Expired':  '#1e1b4b', 
        'Critical': '#ef4444',
        'Warning':  '#f59e0b',
        'Good':     '#10b981',
    };

    var dynamicColors = labels.map(label => colorMap[label] || '#6b7280');

    var options = {
        chart: {
            type: 'pie',
            width: '100%',
            height: 350
        },
        series: series,
        labels: labels,
        colors: dynamicColors,
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: '100%',
                    height: 300
                },
                legend: {
                    position: 'bottom'
                },
                dataLabels: {
                    enabled: false // Matikan label jika skrin terlalu sempit
                }
            }
        }]
    };

    var chart = new ApexCharts(document.querySelector("#expiryPieChart"), options);
    chart.render();
} else {
    document.querySelector("#expiryPieChart").innerHTML = "<p style='text-align:center;'>No Batch Product</p>";
}
</script>
@endsection