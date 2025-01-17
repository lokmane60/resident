<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'number',
        'currency_amount',
        'date_of_birth',
        'notes',
    ];
}
