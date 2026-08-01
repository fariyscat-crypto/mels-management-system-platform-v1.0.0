<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements \Illuminate\Contracts\Auth\MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, MustVerifyEmail, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute(string $value): void
    {
        $this->attributes['password'] = Hash::needsRehash($value) ? Hash::make($value) : $value;
    }

    public function ownerProjects()
    {
        return $this->hasMany(Project::class, 'owner_id');
    }
}
