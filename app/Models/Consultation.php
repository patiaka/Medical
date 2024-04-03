<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'injurie_id',
        'employee_id',
        'staffType',
        'referral',
        'diagnosis',
        'history',
        'bp',
        'pulse',
        'temperature',
        'observation',
        'comments',
        'malaria',
        'daysOff',
        'diagnose_id',
        'diagnosiMali',
    ];

    /**
     * Get the user that owns the Consultation
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the diagnose that owns the Consultation
     */
    public function diagnose(): BelongsTo
    {
        return $this->belongsTo(Diagnosis::class);
    }

    /**
     * Get the injurie that owns the Consultation
     */
    public function injurie(): BelongsTo
    {
        return $this->belongsTo(Injury::class);
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function medications()
    {
        return $this->hasMany(Medication::class);
    }

    public function laboratory()
    {
        return $this->morphMany(Laboratory::class, 'laboratorieable');
    }
}
