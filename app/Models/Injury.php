<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Injury extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Get all of the consulations for the Injury
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function consulations(): HasMany
    {
        return $this->hasMany(Consultation::class, 'foreign_key', 'local_key');
    }
}
