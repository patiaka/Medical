<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'diagnosispec',
        'diagnosiMali',
    ];

    /**
     * Get the user that owns the Consultation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the injurie that owns the Consultation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function injurie(): BelongsTo
    {
        return $this->belongsTo(Injury::class);
    }
}
