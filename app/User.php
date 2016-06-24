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
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

        'password', 'remember_token',
    ];

    /**
     * User Product Relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products(){

        return $this->hasMany(Product::class);
    }

    /**
     * User Category Relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories(){

        return $this->hasMany(Category::class);
    }
}
