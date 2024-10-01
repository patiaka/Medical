<!DOCTYPE html>
<html lang="en">

<head>
    <title>Syama Medical</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- FontAwesome JS-->
    <script defer src="{{ asset('assets/plugins/fontawesome/js/all.min.js') }}"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('assets/css/portal.css') }}">
    <link id="theme-style" rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link id="theme-style" rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

    <style>
        .app-wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .app-content {
            flex: 1;
            padding: 20px;
        }

        .app-footer {
            background-color: #f8f9fa;
            padding: 10px 0;
        }
    </style>
</head>

<body class="app">
    <div id="loading"
        style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255, 255, 255, 0.8); z-index: 9999; display: flex; align-items: center; justify-content: center;">
        <i class="fas fa-spinner fa-spin fa-6x"></i>
    </div>
    <header class="app-header fixed-top">
        @include('layouts.topbar')
        @include('layouts.sidebar')
    </header>
    <!--//app-header-->

    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!--//container-fluid-->
        </div>
        <!--//app-content-->

        <footer class="app-footer">
            <div class="container text-center py-3">
                <small class="copyright">Developped by <a class="app-link" href="#" target="_blank">SYAMA
                        IT</a></small>
            </div>
        </footer>
        <!--//app-footer-->
    </div>
    <!--//app-wrapper-->

    <!-- Javascript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('assets/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <!-- Charts JS -->
    <script src="{{ asset('assets/plugins/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/index-charts.js') }}"></script>

    <!-- Page Specific JS -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert2@11.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Initialiser DataTables
            $('.myTable,#myTable').DataTable({
                responsive: true,
                autoWidth: true,
                'order': [
                    [0, 'desc']
                ],
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            // Hide the loading animation when the page is fully loaded
            window.addEventListener('load', function() {
                document.getElementById('loading').style.display = 'none';
            });

            // Show the loading animation when a link is clicked, except for elements with the 'no-loading' class
            document.querySelectorAll('a, button').forEach(function(element) {
                element.addEventListener('click', function(event) {
                    // Check if the clicked element has the 'no-loading' class
                    if (!element.classList.contains('no-loading')) {
                        document.getElementById('loading').style.display = 'flex';
                    }
                });
            });
        });
    </script>
</body>

</html>
