<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_no',
        'client_id',
        'airline_id',
        'airline_type',
        'airlinepnr',
        'time',
        'date',
        'destination',
        'departure',
        'description',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function airline()
    {
        return $this->belongsTo(Airline::class);
    }
}
