<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'total_cost',
        'payment_method',
        'user_id',
        'report_id'
    ];

    protected $casts = [
        'date_time' => 'datetime',
    ];

    public function user(){

        return $this->BelongsTo(User::class);
    }

    public function report(){

        return $this->BelongsTo(Report::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query
                ->where('date_time', 'like', '%' . $search . '%')
                ->orWhere('payment_method', 'like', '%' . $search . '%')
                ->orWhere('total_cost', 'like', '%' . $search . '%')
                ->orWhere('products', 'like', '%' . $search . '%')
        );
    }

}
