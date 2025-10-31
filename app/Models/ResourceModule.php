<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResourceModule extends Model
{
    //
    protected $guarded = ['id'];

     public function modulePosts()
    {
        return $this->hasMany(ModulePosts::class, 'module_id');
    }


}
