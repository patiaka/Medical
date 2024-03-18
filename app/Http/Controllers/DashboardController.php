<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Consultation;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){

        $totalDoctor = User::all()->count();
        $totalConsultation = Consultation::all()->count();
        $totalEmployee = Employee::all()->count();
        $totalDepartment = Department::all()->count();
        return view('dashboard',compact('totalDoctor','totalConsultation','totalEmployee','totalDepartment'));
    
    }
}
