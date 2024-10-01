<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medication extends Model
{
    use HasFactory;

    protected $fillable = [
        'drugname',
        'prescription',
        'stock',
    ];

    public function consulations(): HasMany
    {
        return $this->hasMany(Consultation::class, 'foreign_key', 'local_key');
    }

}
