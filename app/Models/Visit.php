<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visit extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'contact_id',
        'sales_id',
        'business_unit',
        'product_types',
        'visit_type',
        'visit_date',
        'content',
        'next_action',
        'reminder_at',
        'has_proposal',
        'opportunity_name',
        'is_direct_client',
        'agency',
    ];

    protected $casts = [
        'product_types' => 'array',
        'reminder_at' => 'datetime',
        'has_proposal' => 'boolean',
        'is_direct_client' => 'boolean',
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