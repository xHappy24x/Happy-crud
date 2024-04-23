<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\Product;

class Quotation extends Model
{
    use HasFactory;
    protected $table = 'quotations';

    protected $fillable = [
        'client_id',
        'product_id',
        'rfq',
        'q_date',
        's_detail',
        'ss_number',
        'model',
        's_number'
    ];

    public function clients()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
