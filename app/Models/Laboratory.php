<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    use HasFactory;
    protected $fillable = [
        'hemoglobin',
        'malariaThick',
        'malariaThin',
        'malariaQuicktest',
        'bloodGlucose',
        'got',
        'gpt',
        'ggt',
        'creatinine',
        'urea',
        'potasiumK',
        'uricAcid',
        'creatinineKinase',
        'troponinT',
        'urineDipstick',
        'urineMicroscopy',
        'stoolMicroscopy',
        'sputumMicroscopy',
        'gammaGt',
        'cholesterol',
        'total',
        'ldh',
        'ldl',
        'triglyceride',
        'tBilirubine',
        'dBilirubine',
        'iBilirubine',
        'fastingGlucose',
    ];
    public function laboratorieable()
    {
        return $this->morphTo();
    }

}
