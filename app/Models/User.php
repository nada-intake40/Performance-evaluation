<?php

namespace App\Models;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use Notifiable, HasRoles , HasApiTokens, SoftDeletes;
    protected $uploads = '/images/';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar','hiring_at','supervisor'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
    public function getAvatarAttribute($photo)
    {
        return $this->uploads . $photo ;
    }
 
    public function supervisor()
    {
        return $this->belongsTo('App\Models\user');
    }



    public function isAdmin(){
        if ($this->hasRole(['superadmin','Admin'])){
            return true ;
        }
        return false ;
    }



}
