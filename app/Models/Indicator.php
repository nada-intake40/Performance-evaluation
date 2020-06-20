<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Indicator extends Model
{
    use softDeletes;
    protected $fillable = [
        'name',
        'criteria_id',
        'is_positive',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function criteria()
    {
        return $this->belongsTo('App\Models\Criteria');
    }
}
