<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
         'name' ,
    ];

    public function user()
    {
        return $this->belongsToMany('App\Models\User');
    }
    public function criteria()
    {
        return $this->belongsToMany('App\Models\Criteria');
    
    }
}
