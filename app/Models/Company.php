<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'tax_id',
        'name',
        'short_name',
        'phone',
        'address',
        'website',
        'business_unit',
        'industry_type',
        'focus_issues',
        'marketing_schedule',
        'fiscal_year',
        'sales_id',
        'is_active',
    ];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function opportunities()
    {
        return $this->hasMany(Opportunity::class);
    }

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }

    public function salesPerson()
    {
        return $this->belongsTo(User::class, 'sales_id');
    }
}