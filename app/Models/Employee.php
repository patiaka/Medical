<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['employeeNumber', 'staffId', 'firstName', 'lastName', 'jobTitle', 'birthDate', 'company', 'department_id', 'employeeType'];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function generateId(string $prefix_type)
    {
        $prefix = $prefix_type.'-';

        return DB::transaction(function () use ($prefix) {
            // Verrouille le dernier identifiant de courrier enregistré dans la base de données pour la mise à jour
            $lastEmployee = self::where('employeeNumber', 'like', $prefix.'%')->whereNotNull('employeeNumber')
                ->latest('id')
                ->lockForUpdate()
                ->first(['employeeNumber']);
            // Si aucun identifiant de courrier n'a été enregistré, définit le numéro de séquence à 0
            $sequence = 0;
            if ($lastEmployee) {
                // Récupère le numéro de séquence de l'identifiant de courrier précédent
                $sequence = (int) substr($lastEmployee->employeeNumber, strlen($prefix));
            }
            // Incrémente le numéro de séquence et génère le nouvel identifiant de courrier
            $sequence++;
            $newEmployeeNumber = $prefix.$sequence;
            // Met à jour le numéro de courrier de l'instance courante
            $this->employeeNumber = $newEmployeeNumber;
            $this->save();

            return $this;
        });
    }
}