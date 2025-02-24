<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'total_credit',
        'total_debit',
        'total_card',
        'total_money',
        'total_pix'
    ];

    protected $casts = [
        'generated_at' => 'datetime',
    ];
}
