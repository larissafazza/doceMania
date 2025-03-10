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

    public function supplier(){

        return $this->BelongsTo(Supplier::class);
    }

    public function sales()
    {
        return $this->belongsToMany(sales::class)->withPivot('quantity');
    }

    public function scopeFilter($query, array $filters)
    {
        
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query
                ->where('name', 'like', '%' . $search . '%')
                ->orWhere('supplier', 'like', '%' . $search . '%')
                ->orWhere('expiration_date', 'like', '%' . $search . '%')
        );
    }

}
