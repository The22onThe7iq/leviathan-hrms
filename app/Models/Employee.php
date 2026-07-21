<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;

    // Allow these fields to be saved to the database
    protected $fillable = [
        'user_id',
        'employee_id_number',
        'department',
        'job_title',
        'first_name',
        'last_name',
        'phone_number',
        'hire_date',
        'status',
    ];

    /**
     * Relationship: An Employee profile belongs to one User account.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
