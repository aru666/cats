<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformanceTarget extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_unit',
        'year',
        'department',
        'quarter',
        'month',
        'user_id',
        'target_amount',
    ];

    protected $casts = [
        'target_amount' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}