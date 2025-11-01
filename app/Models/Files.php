<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    //
     protected $fillable = [
     'file_name',
     'file_path',
     'subscription_id',
     'user_id',
     'is_transferable',
     'transfer_type'
     ];

     public function subscription()
     {
     return $this->belongsTo(Subscription::class);
     }

     public function user()
     {
     return $this->belongsTo(User::class);
     }
}
