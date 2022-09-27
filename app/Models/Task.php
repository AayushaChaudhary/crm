<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'purpose_id',
        'department_id',
        'client_id',
        'remarks',
        'status',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function purpose()
    {
        return $this->belongsTo(Purpose::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
