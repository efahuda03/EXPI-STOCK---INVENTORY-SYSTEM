<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EXPI-STOCK | {{ $page['title'] }}</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/logo.jpeg') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .card-rounded{
            border-radius: 10px;
        }
        .card-icon{
            font-size: 30px;
        }
        .table-icon{
            font-size: 35px;
        }
        .btn-table{
            margin-bottom: -15px;
            z-index: 1;
        }
        .table{
            font-size: 13px;
        }
    </style>
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        <!-- Sidebar -->
        @include('layout.components.sidebar')
        
        <!--  Main wrapper -->
        <div class="body-wrapper">

            <!-- message -->
            @include('layout.components.message')
            
            <!--  Header -->
            @include('layout.components.header')

            <!-- content -->
            @yield('content')

            <!-- modal logout -->
            <div class="modal fade" id="modalLogout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Logout</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure to logout?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="{{ route('logout') }}" class="btn btn-danger">Yes, Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="py-6 px-6 text-center">
                <p class="mb-0 fs-4">&copy; <?= date('Y') ?> EXPI-STOCK, All Right Reserve.</p>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.4/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.4/js/dataTables.bootstrap5.js"></script>

    <!-- realtime jam -->
    <script>
        function kemaskiniJam() {
            const sekarang = new Date();
            
            let jam = sekarang.getHours();
            let minit = sekarang.getMinutes();
            let saat = sekarang.getSeconds();

            jam = jam < 10 ? '0' + jam : jam;
            minit = minit < 10 ? '0' + minit : minit;
            saat = saat < 10 ? '0' + saat : saat;

            const formatMasa = jam + ":" + minit + ":" + saat;
            document.getElementById('jam-digital').innerHTML = formatMasa;
        }

        setInterval(kemaskiniJam, 1000);
        kemaskiniJam();
    </script>

    <!-- datatable -->
    <script>
        const table = document.getElementById('table');
        if(table){
            $(table).DataTable({
                "language": {
                    "lengthMenu": "_MENU_" 
                }
            });
        }

        const tables = $('.datatable');
        
        if (tables.length > 0) {
            tables.DataTable({
                "language": {
                    "lengthMenu": "_MENU_" 
                }
            });
        }
    </script>
</body>
</html>

