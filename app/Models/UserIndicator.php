<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserIndicator extends Model
{
    protected $fillable = [
        'value','cycle_id','user_id' ,'indicator_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User'); 
    }

}
