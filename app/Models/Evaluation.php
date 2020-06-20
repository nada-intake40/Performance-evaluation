<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = [
        'value','cycle_id','user_id' ,'criteria_id','evaluator_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User'); 
    }

}
