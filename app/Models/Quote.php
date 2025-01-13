<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quote extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'proposal_id',
        'sales_id',
        'title',
        'content',
        'amount',
        'status',
        'valid_until',
        'payment_terms',
        'delivery_terms',
        'notes',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'valid_until' => 'date',
    ];

    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
    }

    public function salesPerson()
    {
        return $this->belongsTo(User::class, 'sales_id');
    }
}