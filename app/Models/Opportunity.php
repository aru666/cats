<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Opportunity extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'agency',
        'contact_id',
        'name',
        'visit_type',
        'visit_date',
        'content',
        'sales_id',
        'business_unit',
        'product_types',
        'amount',
        'estimated_amount',
        'success_rate',
        'cooperation_issues',
        'has_ad_exchange',
        'next_action',
        'reminder_at',
        'stage',
        'status',
        'status_reason',
    ];

    protected $casts = [
        'product_types' => 'array',
        'reminder_at' => 'datetime',
        'has_ad_exchange' => 'boolean',
        'amount' => 'decimal:2',
        'estimated_amount' => 'decimal:2',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function salesPerson()
    {
        return $this->belongsTo(User::class, 'sales_id');
    }
}