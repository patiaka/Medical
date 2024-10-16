<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\DrugnameController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\healthSurveillanceController;
use App\Http\Controllers\InjuryController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\MedicationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::resource('medication', MedicationController::class);
// Route::resource('healthSurveillance', healthSurveillanceController::class);
// Route::get('/{healthSurveillance}/pdf', [healthSurveillanceController::class, 'generatePDF'])->name('healthSurveillance.pdf');

// Route::prefix('department')->group(function () {
//     Route::get('/', [DepartmentController::class, 'index'])->name('department.index');
//     Route::get('/create', [DepartmentController::class, 'create'])->name('department.create');
//     Route::post('/store', [DepartmentController::class, 'store'])->name('department.store');
//     Route::get('/edit/{department}', [DepartmentController::class, 'edit'])->name('department.edit');
//     Route::put('/update/{department}', [DepartmentController::class, 'update'])->name('department.update');
//     Route::delete('/{department}', [DepartmentController::class, 'delete'])->name('department.delete');
//     Route::get('/search', [DepartmentController::class, 'search'])->name('department.search');
// });

// Route::prefix('employee')->group(function () {
//     Route::get('/', [EmployeeController::class, 'index'])->name('employee.index');
//     Route::post('/store', [EmployeeController::class, 'store'])->name('employee.store');
//     Route::get('/edit/{employee}', [EmployeeController::class, 'edit'])->name('employee.edit');
//     Route::put('/update/{employee}', [EmployeeController::class, 'update'])->name('employee.update');
//     Route::delete('/{employee}', [EmployeeController::class, 'delete'])->name('employee.delete');
// });

// Route::prefix('consultation')->group(function () {
//     Route::get('/', [ConsultationController::class, 'index'])->name('consultation.index');
//     Route::post('/store', [ConsultationController::class, 'store'])->name('consultation.store');
//     Route::get('/create', [ConsultationController::class, 'create'])->name('consultation.create');
//     Route::get('/edit/{consultation}', [ConsultationController::class, 'edit'])->name('consultation.edit');
//     Route::put('/update/{consultation}', [ConsultationController::class, 'update'])->name('consultation.update');
//     Route::get('/show/{consultation}', [ConsultationController::class, 'show'])->name('consultation.show');
//     Route::delete('/{consultation}', [ConsultationController::class, 'delete'])->name('consultation.delete');
//     Route::get('/{consultation}/pdf', [ConsultationController::class, 'generatePDF'])->name('consultation.pdf');

// });

Route::middleware('auth')->group(function () {
    Route::middleware('role:Admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::prefix('department')->group(function () {
            Route::get('/', [DepartmentController::class, 'index'])->name('department.index');
            Route::get('/create', [DepartmentController::class, 'create'])->name('department.create');
            Route::post('/store', [DepartmentController::class, 'store'])->name('department.store');
            Route::get('/edit/{department}', [DepartmentController::class, 'edit'])->name('department.edit');
            Route::put('/update/{department}', [DepartmentController::class, 'update'])->name('department.update');
            Route::delete('/{department}', [DepartmentController::class, 'delete'])->name('department.delete');
            Route::get('/search', [DepartmentController::class, 'search'])->name('department.search');
        });
        Route::resource('user', UserController::class)->except('create');
        Route::resource('diagnosis', DiagnosisController::class)->except('create');
        Route::resource('company', CompanyController::class)->except('create');
        Route::resource('injury', InjuryController::class)->except('create');
        Route::resource('medication', MedicationController::class)->except('create');
        Route::resource('journal', JournalController::class)->only('index', 'destroy');
        Route::resource('drugname', DrugnameController::class)->except('show');
    });
    Route::middleware('role:User')->group(function () {
        Route::prefix('employee')->group(function () {
            Route::get('/', [EmployeeController::class, 'index'])->name('employee.index');
            Route::post('/store', [EmployeeController::class, 'store'])->name('employee.store');
            Route::get('/edit/{employee}', [EmployeeController::class, 'edit'])->name('employee.edit');
            Route::put('/update/{employee}', [EmployeeController::class, 'update'])->name('employee.update');
            Route::delete('/{employee}', [EmployeeController::class, 'delete'])->name('employee.delete');
        });
        Route::prefix('consultation')->group(function () {
            Route::get('/', [ConsultationController::class, 'index'])->name('consultation.index');
            Route::post('/store', [ConsultationController::class, 'store'])->name('consultation.store');
            Route::get('/create', [ConsultationController::class, 'create'])->name('consultation.create');
            Route::get('/edit/{consultation}', [ConsultationController::class, 'edit'])->name('consultation.edit');
            Route::put('/update/{consultation}', [ConsultationController::class, 'update'])->name('consultation.update');
            Route::get('/show/{consultation}', [ConsultationController::class, 'show'])->name('consultation.show');
            Route::delete('/{consultation}', [ConsultationController::class, 'delete'])->name('consultation.delete');
            Route::get('/{consultation}/pdf', [ConsultationController::class, 'generatePDF'])->name('consultation.pdf');
        });

        Route::resource('healthSurveillance', healthSurveillanceController::class);

        // Route::get('/healthSurveillance/follow-up', [HealthSurveillanceController::class, 'followUpList'])->name('healthSurveillance.followUpList');
        Route::get('/{healthSurveillance}/pdf', [healthSurveillanceController::class, 'generatePDF'])->name('healthSurveillance.pdf');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
