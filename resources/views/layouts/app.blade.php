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
    <link id="theme-style" rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">
    <link id="theme-style" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js">


</head>

<body class="app">
    <header class="app-header fixed-top">
        @include('layouts.topbar')
        @include('layouts.sidebar')
    </header>
    <!--//app-header-->

    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                @yield('content')


            </div>
            <!--//container-fluid-->
        </div>
        <!--//app-content-->

        <footer class="app-footer">
            <div class="container text-center py-3">

                <small class="copyright">Developped by <a class="app-link" href="#" target="_blank">Oumar
                        OUREIBA</a></small>

            </div>
        </footer>
        <!--//app-footer-->

    </div>
    <!--//app-wrapper-->


    <!-- Javascript -->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>


    <!-- Charts JS -->
    <script src="{{ asset('assets/plugins/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/index-charts.js') }}"></script>

    <!--Page Specific JS-->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert2@11.js') }}"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                responsive: true,
                autoWidth: true,
                'order': [
                    [0, 'desc']
                ],
            });

            // Hide all medication fields by default
            $('.medication-fields').hide();
            // Add Medication button click event
            $('#add-medication').click(function() {
                var medicationFields = `
        <div class="row mt-3 medication-row">
            <div class="col-md-4">
                <input type="text" class="form-control" name="medications[0][drugname]" placeholder="Drug Name">
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" name="medications[0][prescription]" placeholder="Prescription">
            </div>
            <div class="col-md-4">
                <input type="number" class="form-control" name="medications[0][stock]" placeholder="Stock">
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-danger remove-medication">-</button>
            </div>
        </div>`;
                $('.medication-fields').append(medicationFields);
                $('.medication-fields').show(); // Show medication fields when adding medication
            });

            // Remove Medication button click event
            $('.medication-fields').on('click', '.remove-medication', function() {
                $(this).closest('.medication-row').remove();
            });

            // Remove All Medications button click event
            $('#remove-all-medication').click(function() {
                $('.medication-fields').empty();
                $('.medication-fields').hide(); // Hide medication fields when removing all medications
            });

        });
    </script>
</body>

</html>
