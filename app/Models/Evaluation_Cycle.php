<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evaluation_cycle extends Model
{

    use SoftDeletes;
    protected $fillable = [

        'cycle',
        'end',
        'start',
        'is_current'


    ];

    public function setUpdatedAt($value)
    {
        return NULL;
    }


    public function setCreatedAt($value)
    {
        return NULL;
    }

    public function getUpdatedAt()
    {
        return NULL;
    }


    public function getCreatedAt()
    {
        return NULL;
    }
    public $timestamps = false;

}
