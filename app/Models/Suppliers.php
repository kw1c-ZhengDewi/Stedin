<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Suppliers extends Model
{
     use HasFactory;

     protected $fillable = [
        'name',
        'email',
        'phone_country_code',
        'phone_number',
    ];
}
