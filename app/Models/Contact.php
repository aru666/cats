<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'name',
        'nickname',
        'department',
        'title',
        'job_type',
        'job_level',
        'email',
        'mobile',
        'phone',
        'notes',
        'employment_status',
        'sales_id',
        'is_active',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
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