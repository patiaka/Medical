<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Medication extends Model
{
    use HasFactory;

    protected $fillable = [
        'prescription',
        'stock',
    ];

    public function consulations(): HasMany
    {
        return $this->hasMany(Consultation::class);
    }

    /**
     * Get the drugname that owns the Medication
     */
    public function drugname(): BelongsTo
    {
        return $this->belongsTo(Drugname::class);
    }
}
