<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    //
    use HasFactory;

    protected $fillable = [
    'user_id',
    'plan_id',
    'stripe_subscription_id',
    'stripe_customer_id',
    'plan_name',
    'billing_type',
    'price',
    'is_active',
    'validity_till',
    'next_payment_date',
    'stripe_payment_id',
     'payment_status',
    ];

    protected $casts = [
    'validity_till' => 'date',
    'next_payment_date' => 'date',
    ];

    public function user()
    {
    return $this->belongsTo(User::class);
    }
    public function files()
    {
    return $this->hasMany(Files::class);
    }

    public function isExpired()
    {
    return $this->validity_till < now()->format('Y-m-d') || $this->is_active == 'no';
        }
}
