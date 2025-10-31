<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModulePosts extends Model
{
    //
    protected $guarded = ['id'];

    public function resourceModule()
    {
        return $this->belongsTo(ResourceModule::class, 'module_id');
    }

}
