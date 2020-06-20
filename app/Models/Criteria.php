<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use  Spatie\Permission\Models\Role;


class Criteria extends Model
{

    use SoftDeletes,HasRoles ;

    protected $fillable = [
        'name','type_id',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function role()
    {
        return $this->belongsTo('Spatie\Permission\Models\Role');
    
    }
}
