<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    use HasFactory;
    const CRUD_TYPE = [
        'Domestic', 'International',
    ];

    protected $fillable = [
        'title',
        'type',
    ];
}
