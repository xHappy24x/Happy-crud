<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [

        'p_name',
        'p_number',
        'description',
        'qty',
        'price'
    ];

    public function quotations()
    {
        return $this->hasMany(Quotation::class, 'product_id', 'id');
    }
}
