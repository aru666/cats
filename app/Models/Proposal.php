<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proposal extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'opportunity_id',
        'sales_id',
        'title',
        'content',
        'amount',
        'status',
        'valid_until',
        'notes',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'valid_until' => 'date',
    ];

    public function opportunity()
    {
        return $this->belongsTo(Opportunity::class);
    }

    public function salesPerson()
    {
        return $this->belongsTo(User::class, 'sales_id');
    }
}