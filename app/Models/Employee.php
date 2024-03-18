<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['staffId','firstName','lastName','jobTitle','birthDate','company','department_id','employeeType'];
    
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}