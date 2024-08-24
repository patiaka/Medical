<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $totalDoctor = User::count();
        $totalConsultation = Consultation::count();
        $totalEmployee = Employee::count();
        $totalDepartment = Department::count();
        $filter = $request->input('filter', 'all'); 
        $filterDiagnosis = $request->input('filterSelectDiagnosis');

        
        $consultationsByDayQuery = DB::table('consultations');

        
        switch ($filter) {
            case 'last_24h':
                $consultationsByDayQuery->whereRaw('DATEDIFF(HOUR, created_at, GETDATE()) <= 24');
                break;
            case 'week':
                $consultationsByDayQuery->whereRaw('DATEDIFF(DAY, created_at, GETDATE()) <= 7');
                break;
            case 'month':
                $consultationsByDayQuery->whereRaw('DATEDIFF(MONTH, created_at, GETDATE()) <= 1');
                break;
            case 'year':
                $consultationsByDayQuery->whereRaw('DATEDIFF(YEAR, created_at, GETDATE()) <= 1');
                break;
            case 'all':
                
                break;
            default:
                break;
        }

        if ($filter === 'month' || $filter === 'year' || $filter === 'all') {
            $consultationsByDayQuery->selectRaw('FORMAT(created_at, \'yyyy-MM\') as period, COUNT(*) as count')
                ->groupBy(DB::raw('FORMAT(created_at, \'yyyy-MM\')'));
        } else {
            $consultationsByDayQuery->selectRaw('FORMAT(created_at, \'yyyy-MM-dd\') as period, COUNT(*) as count')
                ->groupBy(DB::raw('FORMAT(created_at, \'yyyy-MM-dd\')'));
        }

        $consultationsByDayQuery->orderBy('period');

        $consultationsByDay = $consultationsByDayQuery->get();

        $diagnosesStatsQuery = DB::table('consultations')
    ->join('diagnoses', 'consultations.diagnose_id', '=', 'diagnoses.id')
    ->join('employees', 'consultations.employee_id', '=', 'employees.id')
    ->select(
        DB::raw("CONCAT(diagnoses.name, ' - ', employees.employeeType) as label"),
        DB::raw('count(*) as count')
    )
    ->groupBy('diagnoses.name', 'employees.employeeType');

    switch ($filterDiagnosis) {
        case 'last_24h':
            $diagnosesStatsQuery->where('consultations.created_at', '>=', DB::raw('DATEADD(HOUR, -24, GETDATE())'));
            break;
        case 'week':
            $diagnosesStatsQuery->where('consultations.created_at', '>=', DB::raw('DATEADD(DAY, -7, GETDATE())'));
            break;
        case 'month':
            $diagnosesStatsQuery->where('consultations.created_at', '>=', DB::raw('DATEADD(MONTH, -1, GETDATE())'));
            break;
        case 'year':
            $diagnosesStatsQuery->where('consultations.created_at', '>=', DB::raw('DATEADD(YEAR, -1, GETDATE())'));
            break;
        default:
        break;
}

    $diagnosesStats = $diagnosesStatsQuery->get();

        $consultationsByCompany = DB::table('consultations')
            ->join('employees', 'consultations.employee_id', '=', 'employees.id')
            ->join('companies', 'employees.company_id', '=', 'companies.id')
            ->select('companies.name as company', DB::raw('count(*) as count'))
            ->groupBy('companies.name')
            ->get();

        
        $consultationsByDepartment = DB::table('consultations')
            ->join('employees', 'consultations.employee_id', '=', 'employees.id')
            ->join('departments', 'employees.department_id', '=', 'departments.id')
            ->select('departments.name as department', DB::raw('count(*) as count'))
            ->groupBy('departments.name')
            ->get();

        return view('dashboard', compact(
            'totalDoctor',
            'totalConsultation',
            'totalEmployee',
            'totalDepartment',
            'consultationsByDay',
            'diagnosesStats',
            'consultationsByCompany',
            'consultationsByDepartment',
            'filter',
            'filterDiagnosis'
        ));
    }
}
