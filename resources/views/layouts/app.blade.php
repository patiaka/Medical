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

            // Add Laboratory button click event
            $('#add-laboratory').click(function() {
                var laboratoryFields = `
        <div class="row mt-3 laboratory-row">
            <div class="col-md-6">
                <label for="hemoglobin" class="form-label"><em>Hemoglobin</em></label>
                <select class="form-select" name="laboratory[hemoglobin]">
                    <option value=""></option>
                    <option value="Normal">Normal</option>
                    <option value="Abnormal">Abnormal</option>
                    <option value="Undetermined">Undetermined</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="malariaThick" class="form-label"><em>Malaria Thick</em></label>
                <select class="form-select" name="laboratory[malariaThick]">
                    <option value=""></option>
                    <option value="Normal">Normal</option>
                    <option value="Abnormal">Abnormal</option>
                    <option value="Undetermined">Undetermined</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="malariaThin" class="form-label"><em>Malaria Thin</em></label>
                <select class="form-select" name="laboratory[malariaThin]">
                    <option value=""></option>
                    <option value="Normal">Normal</option>
                    <option value="Abnormal">Abnormal</option>
                    <option value="Undetermined">Undetermined</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="malariaQuicktest" class="form-label"><em>Malaria Quicktest</em></label>
                <select class="form-select" name="laboratory[malariaQuicktest]">
                    <option value=""></option>
                    <option value="Normal">Normal</option>
                    <option value="Abnormal">Abnormal</option>
                    <option value="Undetermined">Undetermined</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="bloodGlucose" class="form-label"><em>Blood Glucose</em></label>
                <select class="form-select" name="laboratory[bloodGlucose]">
                    <option value=""></option>
                    <option value="Normal">Normal</option>
                    <option value="Abnormal">Abnormal</option>
                    <option value="Undetermined">Undetermined</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="got" class="form-label"><em>GOT</em></label>
                <select class="form-select" name="laboratory[got]">
                    <option value=""></option>
                    <option value="Normal">Normal</option>
                    <option value="Abnormal">Abnormal</option>
                    <option value="Undetermined">Undetermined</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="gpt" class="form-label"><em>GPT</em></label>
                <select class="form-select" name="laboratory[gpt]">
                    <option value=""></option>
                    <option value="Normal">Normal</option>
                    <option value="Abnormal">Abnormal</option>
                    <option value="Undetermined">Undetermined</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="ggt" class="form-label"><em>GGT</em></label>
                <select class="form-select" name="laboratory[ggt]">
                    <option value=""></option>
                    <option value="Normal">Normal</option>
                    <option value="Abnormal">Abnormal</option>
                    <option value="Undetermined">Undetermined</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="creatinine" class="form-label"><em>Creatinine</em></label>
                <select class="form-select" name="laboratory[creatinine]">
                    <option value=""></option>
                    <option value="Normal">Normal</option>
                    <option value="Abnormal">Abnormal</option>
                    <option value="Undetermined">Undetermined</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="urea" class="form-label"><em>Urea</em></label>
                <select class="form-select" name="laboratory[urea]">
                    <option value=""></option>
                    <option value="Normal">Normal</option>
                    <option value="Abnormal">Abnormal</option>
                    <option value="Undetermined">Undetermined</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="potasiumK" class="form-label"><em>Potasium (K)</em></label>
                <select class="form-select" name="laboratory[potasiumK]">
                    <option value=""></option>
                    <option value="Normal">Normal</option>
                    <option value="Abnormal">Abnormal</option>
                    <option value="Undetermined">Undetermined</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="uricAcid" class="form-label"><em>Uric Acid</em></label>
                <select class="form-select" name="laboratory[uricAcid]">
                    <option value=""></option>
                    <option value="Normal">Normal</option>
                    <option value="Abnormal">Abnormal</option>
                    <option value="Undetermined">Undetermined</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="creatinineKinase" class="form-label"><em>Creatinine Kinase</em></label>
                <select class="form-select" name="laboratory[creatinineKinase]">
                    <option value=""></option>
                    <option value="Normal">Normal</option>
                    <option value="Abnormal">Abnormal</option>
                    <option value="Undetermined">Undetermined</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="troponinT" class="form-label"><em>Troponin T</em></label>
                <select class="form-select" name="laboratory[troponinT]">
                    <option value=""></option>
                    <option value="Normal">Normal</option>
                    <option value="Abnormal">Abnormal</option>
                    <option value="Undetermined">Undetermined</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="urineDipstick" class="form-label"><em>Urine Dipstick</em></label>
                <select class="form-select" name="laboratory[urineDipstick]">
                    <option value=""></option>
                    <option value="Normal">Normal</option>
                    <option value="Abnormal">Abnormal</option>
                    <option value="Undetermined">Undetermined</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="urineMicroscopy" class="form-label"><em>Urine Microscopy</em></label>
                <select class="form-select" name="laboratory[urineMicroscopy]">
                    <option value=""></option>
                    <option value="Normal">Normal</option>
                    <option value="Abnormal">Abnormal</option>
                    <option value="Undetermined">Undetermined</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="stoolMicroscopy" class="form-label"><em>Stool Microscopy</em></label>
                <select class="form-select" name="laboratory[stoolMicroscopy]">
                    <option value=""></option>
                    <option value="Normal">Normal</option>
                    <option value="Abnormal">Abnormal</option>
                    <option value="Undetermined">Undetermined</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="sputumMicroscopy" class="form-label"><em>Sputum Microscopy</em></label>
                <select class="form-select" name="laboratory[sputumMicroscopy]">
                    <option value=""></option>
                    <option value="Normal">Normal</option>
                    <option value="Abnormal">Abnormal</option>
                    <option value="Undetermined">Undetermined</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="gammaGt" class="form-label"><em>Gamma GT</em></label>
                <select class="form-select" name="laboratory[gammaGt]">
                    <option value=""></option>
                    <option value="Normal">Normal</option>
                    <option value="Abnormal">Abnormal</option>
                    <option value="Undetermined">Undetermined</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="cholesterol" class="form-label"><em>Cholesterol</em></label>
                <select class="form-select" name="laboratory[cholesterol]">
                    <option value=""></option>
                    <option value="Normal">Normal</option>
                    <option value="Abnormal">Abnormal</option>
                    <option value="Undetermined">Undetermined</option>
                </select>
            </div>
            <div class="col-md-6">
                <h2>Total</h2>
                <input type="number" class="form-control" name="laboratory[total]" placeholder="total">
            </div>
            <div class="col-md-6">
                <label for="ldh" class="form-label"><em>LDH</em></label>
                <select class="form-select" name="laboratory[ldh]">
                    <option value=""></option>
                    <option value="Normal">Normal</option>
                    <option value="Abnormal">Abnormal</option>
                    <option value="Undetermined">Undetermined</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="ldl" class="form-label"><em>LDL</em></label>
                <select class="form-select" name="laboratory[ldl]">
                    <option value=""></option>
                    <option value="Normal">Normal</option>
                    <option value="Abnormal">Abnormal</option>
                    <option value="Undetermined">Undetermined</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="triglyceride" class="form-label"><em>Triglyceride</em></label>
                <select class="form-select" name="laboratory[triglyceride]">
                    <option value=""></option>
                    <option value="Normal">Normal</option>
                    <option value="Abnormal">Abnormal</option>
                    <option value="Undetermined">Undetermined</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="tBilirubine" class="form-label"><em>Total Bilirubine</em></label>
                <select class="form-select" name="laboratory[tBilirubine]">
                    <option value=""></option>
                    <option value="Normal">Normal</option>
                    <option value="Abnormal">Abnormal</option>
                    <option value="Undetermined">Undetermined</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="dBilirubine" class="form-label"><em>Direct Bilirubine</em></label>
                <select class="form-select" name="laboratory[dBilirubine]">
                    <option value=""></option>
                    <option value="Normal">Normal</option>
                    <option value="Abnormal">Abnormal</option>
                    <option value="Undetermined">Undetermined</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="iBilirubine" class="form-label"><em>Indirect Bilirubine</em></label>
                <select class="form-select" name="laboratory[iBilirubine]">
                    <option value=""></option>
                    <option value="Normal">Normal</option>
                    <option value="Abnormal">Abnormal</option>
                    <option value="Undetermined">Undetermined</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="fastingGlucose" class="form-label"><em>Fasting Glucose</em></label>
                <select class="form-select" name="laboratory[fastingGlucose]">
                    <option value=""></option>
                    <option value="Normal">Normal</option>
                    <option value="Abnormal">Abnormal</option>
                    <option value="Undetermined">Undetermined</option>
                </select>
            </div>

        </div>`;
                $('.laboratory-fields').append(laboratoryFields);
                $('.laboratory-fields').show(); // Show laboratory fields when adding laboratory data
            });

            // Remove All Laboratory Data button click event
            $('#remove-all-laboratory').click(function() {
                $('.laboratory-fields').empty();
                $('.laboratory-fields').hide(); // Hide laboratory fields when removing all laboratory data
            });

        });
    </script>
</body>

</html>
