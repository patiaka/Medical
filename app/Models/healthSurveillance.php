<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class healthSurveillance extends Model
{
    use HasFactory;

    protected $fillable = [
        'surveillanceType',
        'occupation',
        'hazards',
        'ecg',
        'spirometry',
        'audiometry',
        'general',
        'followUp',
        'employee_id',
    ];

    public function laboratory()
    {
        return $this->morphMany(Laboratory::class, 'laboratorieable');
    }
}
