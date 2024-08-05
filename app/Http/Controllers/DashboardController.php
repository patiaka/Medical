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

        $filter = $request->input('filter');
        $consultationsByDayQuery = DB::table('consultations')
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count');

        $filter_malaria = $request->input('filter_malaria');
        $malariaStatsQuery = Consultation::select('malaria', DB::raw('count(*) as count'))
            ->whereIn('malaria', ['Doxycycline', 'Lariam', 'Chloroquine', 'Coartem', 'Fansider']);

        switch ($filter) {
            case 'last_24h':
                $consultationsByDayQuery->whereRaw('TIMESTAMPDIFF(HOUR, created_at, NOW()) <= 24');
                break;
            case 'week':
                $consultationsByDayQuery->whereRaw('TIMESTAMPDIFF(DAY, created_at, NOW()) <= 7');
                break;
            case 'month':
                $consultationsByDayQuery->whereRaw('TIMESTAMPDIFF(MONTH, created_at, NOW()) <= 1');
                break;
            case 'year':
                $consultationsByDayQuery->whereRaw('TIMESTAMPDIFF(YEAR, created_at, NOW()) <= 1');
                break;
            default:
                break;
        }

        switch ($filter_malaria) {
            case 'last_24h':
                $malariaStatsQuery->whereRaw('TIMESTAMPDIFF(HOUR, created_at, NOW()) <= 24');
                break;
            case 'week':
                $malariaStatsQuery->whereRaw('TIMESTAMPDIFF(DAY, created_at, NOW()) <= 7');
                break;
            case 'month':
                $malariaStatsQuery->whereRaw('TIMESTAMPDIFF(MONTH, created_at, NOW()) <= 1');
                break;
            case 'year':
                $malariaStatsQuery->whereRaw('TIMESTAMPDIFF(YEAR, created_at, NOW()) <= 1');
                break;
            default:
                break;
        }

        $consultationsByDayQuery->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('date');

        $consultationsByDay = $consultationsByDayQuery->get();

        $malariaStats = $malariaStatsQuery->groupBy('malaria')->get();

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
            'malariaStats',
            'consultationsByCompany',
            'consultationsByDepartment',
            'filter',
            'filter_malaria'
        ));

    }
}
