<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'quantity',
        'expiration_date',
        'price',
        'stock_id'
    ];

    public function stock(){

        return $this->BelongsTo(Stock::class);
    }


}
