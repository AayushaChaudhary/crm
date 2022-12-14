<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Client;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const CRUD_ROLES = [
        'Admin', 'User', 'Desk',
    ];

    const CRUD_BLOODGROUP = [
        'O+', 'O-', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-'
    ];

    const CRUD_STATUS = [
        'active', 'inactive',
    ];

    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'role',
        'address',
        'dob',
        'phoneno',
        'post',
        'bloodgroup',
        'entry_time',
        'exit_time',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function client()
    {
        return $this->hasMany(Client::class);
    }

    public function attendence()
    {
        return $this->hasMany(Attendence::class);
    }
    public function task()
    {
        return $this->hasMany(Task::class);
    }

    public function leave()
    {
        return $this->hasMany(Leave::class);
    }
}
