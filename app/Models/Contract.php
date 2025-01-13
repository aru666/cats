<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'quote_id',
        'sales_id',
        'title',
        'content',
        'amount',
        'status',
        'start_date',
        'end_date',
        'payment_terms',
        'delivery_terms',
        'special_terms',
        'notes',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }

    public function salesPerson()
    {
        return $this->belongsTo(User::class, 'sales_id');
    }
}