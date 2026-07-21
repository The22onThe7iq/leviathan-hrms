<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Permission\Traits\HasRoles;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Relationship: A user account belongs to one Employee record.
     */
    public function employee(): HasOne
    {
        return $this->hasOne(Employee::class);
    }

    /**
     * JWT Core Requirement
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * JWT Core Requirement
     */
    public function getJWTCustomClaims()
    {
        // We can pass user roles directly inside the token payload for instant UI rendering!
        return [
            'roles' => $this->getRoleNames(),
        ];
    }
}
