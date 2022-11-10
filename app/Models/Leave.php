<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'subject',
        'image',
        'description',
        'status',
        'user_id',
        'remarks',

    ];

    public function media()
    {
        return $this->belongsTo(Media::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
