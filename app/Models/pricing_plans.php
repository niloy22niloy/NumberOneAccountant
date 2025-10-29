<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pricing_plans extends Model
{
    //
     protected $fillable = [
        'plan_type',
        'billing_cycle',
        'title',
        'price',
        'features',
        'status',
        'homepage_show',
    ];

    protected $casts = [
        'features' => 'array',
    ];
}
