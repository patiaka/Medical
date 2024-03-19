@extends('layouts.app')

@section('content')
    <h1 class="app-page-title">Dashboard</h1>
    <div class="row g-4 mb-4">
        <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="stats-type mb-1">Total Doctors</h4>
                    <div class="stats-figure">{{ $totalDoctor }}</div>
                    <div class="stats-meta text-success">

                    </div>
                </div><!--//app-card-body-->
                <a class="app-card-link-mask" href="#"></a>
            </div><!--//app-card-->
        </div><!--//col-->

        <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="stats-type mb-1">Total Consultation</h4>
                    <div class="stats-figure">{{ $totalConsultation }}</div>
                    <div class="stats-meta text-success">
                    </div>
                </div><!--//app-card-body-->
                <a class="app-card-link-mask" href="{{ route('consultation.index') }}"></a>
            </div><!--//app-card-->
        </div><!--//col-->
        <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="stats-type mb-1">Total Patient</h4>
                    <div class="stats-figure">{{ $totalEmployee }}</div>
                    <div class="stats-meta">
                    </div>
                </div><!--//app-card-body-->
                <a class="app-card-link-mask" href="{{ route('employee.index') }}"></a>
            </div><!--//app-card-->
        </div><!--//col-->
        <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="stats-type mb-1">Total Department</h4>
                    <div class="stats-figure">{{ $totalDepartment }}</div>
                    <div class="stats-meta"></div>
                </div><!--//app-card-body-->
                <a class="app-card-link-mask" href="{{ route('department.index') }}"></a>
            </div><!--//app-card-->
        </div><!--//col-->
        {{-- <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="stats-type mb-1">Total Analyse</h4>
                    <div class="stats-figure">0</div>
                    <div class="stats-meta"></div>
                </div><!--//app-card-body-->
                <a class="app-card-link-mask" href="{{ route('department.index') }}"></a>
            </div><!--//app-card-->
        </div><!--//col--> --}}
    </div><!--//row-->
@endsection
