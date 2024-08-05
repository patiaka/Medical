<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Journal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'libelle',
    ];

    /**
     * Get the user that owns the Journal
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
