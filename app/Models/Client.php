<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'clients';

    protected $fillable = [
        'b_name',
        'address',
        'contact_p',
        'email_p',
        'p_number'
    ];

    public function quotations()
    {
        return $this->hasMany(Quotation::class, 'client_id', 'id');
    }
}
