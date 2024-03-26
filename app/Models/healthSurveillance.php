<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class healthSurveillance extends Model
{
    use HasFactory;

    protected $fillable = [
        'consultation_id', 
        'surveillanceType', 
        'occupation', 
        'hazards', 
        'ecg', 
        'spirometry', 
        'audiometry', 
        'general', 
        'followUp'
    ];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }
}
