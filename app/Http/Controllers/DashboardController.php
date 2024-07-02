<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Consultation;
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

        // Filtrer les consultations en fonction de la période sélectionnée
        $filter = $request->input('filter');
        $consultationsByDayQuery = DB::table('consultations')
            ->selectRaw('CONVERT(VARCHAR, created_at, 23) as date, COUNT(*) as count');

        // Filtrer les statistiques de la malaria en fonction de la période sélectionnée
        $filter_malaria = $request->input('filter_malaria');
        $malariaStatsQuery = Consultation::select('malaria', DB::raw('count(*) as count'))
            ->whereIn('malaria', ['Doxycycline', 'Lariam', 'Chloroquine', 'Coartem', 'Fansider']);

        // Application des filtres pour les consultations
        switch ($filter) {
            case 'last_24h':
                $consultationsByDayQuery->whereRaw('DATEDIFF(hour, created_at, GETDATE()) <= 24');
                break;
            case 'week':
                $consultationsByDayQuery->whereRaw('DATEDIFF(day, created_at, GETDATE()) <= 7');
                break;
            case 'month':
                $consultationsByDayQuery->whereRaw('DATEDIFF(month, created_at, GETDATE()) <= 1');
                break;
            case 'year':
                $consultationsByDayQuery->whereRaw('DATEDIFF(year, created_at, GETDATE()) <= 1');
                break;
            default:
                // Pas de filtre, obtenir toutes les consultations
                break;
        }

        // Application des filtres pour les statistiques de la malaria
        switch ($filter_malaria) {
            case 'last_24h':
                $malariaStatsQuery->whereRaw('DATEDIFF(hour, created_at, GETDATE()) <= 24');
                break;
            case 'week':
                $malariaStatsQuery->whereRaw('DATEDIFF(day, created_at, GETDATE()) <= 7');
                break;
            case 'month':
                $malariaStatsQuery->whereRaw('DATEDIFF(month, created_at, GETDATE()) <= 1');
                break;
            case 'year':
                $malariaStatsQuery->whereRaw('DATEDIFF(year, created_at, GETDATE()) <= 1');
                break;
            default:
                // Pas de filtre, obtenir toutes les statistiques de malaria
                break;
        }

        $consultationsByDayQuery->groupBy(DB::raw('CONVERT(VARCHAR, created_at, 23)'))
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
            'filter_malaria' // Ajout de la variable de filtre pour la malaria
        ));
    }
}
