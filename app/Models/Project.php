<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

     protected $fillable = [
        'project_nr',
        'project_name',
        'cost_center',
        'order_note',
        'delivery_street',
        'city',
        'state_province',
        'country',
        'delivery_date',
    ];
}
