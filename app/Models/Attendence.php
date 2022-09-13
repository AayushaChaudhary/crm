<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'clock-in',
        'clock-out',
        'late-entry',
        'early-exit',
        'date',
    ];
}
