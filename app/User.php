<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getFullnameAttribute() {
        return $this->name ? $this->name : $this->email;
    }

    public function addresses() {
        return $this->hasMany('App\UserAddress');
    }

    public function orders() {
        return $this->hasMany('App\Order');
    }
}
