<?php

use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::prefix('department')->group(function () {
    Route::get('/', [DepartmentController::class, 'index'])->name('department.index');
    Route::get('/create', [DepartmentController::class, 'create'])->name('department.create');
    Route::post('/store', [DepartmentController::class, 'store'])->name('department.store');
    Route::get('/edit/{department}', [DepartmentController::class, 'edit'])->name('department.edit');
    Route::put('/update/{department}', [DepartmentController::class, 'update'])->name('department.update');
    Route::delete('/{department}', [DepartmentController::class, 'delete'])->name('department.delete');
    Route::get('/search', [DepartmentController::class, 'search'])->name('department.search');
});

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
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
