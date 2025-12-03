<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'item_nr',
        'item_name',
        'supplier_id',
    ];

        public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
