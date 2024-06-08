<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthSurveillance extends Model
{
    use HasFactory;

    protected $fillable = [
        'surveillanceType',
        'hazards',
        'ecg',
        'spirometry',
        'audiometry',
        'general',
        'followUp',
        'employee_id',
    ];

    public function Laboratory()
    {
        return $this->morphOne(Laboratory::class, 'laboratorieable');
    }
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
