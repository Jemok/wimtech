<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * Table used by this model
     * @var string
     */
    protected $table = 'customers';

    /**
     * Fields that can be mass assigned
     * @var array
     */
    protected $fillable = [

        'name',
        'phone_number',
        'email',
        'town'
    ];

    /**
     * Customer has many Items
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items(){

        return $this->hasMany(Item::class);
    }

    /**
     * GrandTotal Customer Relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function grand_total(){

        return $this->hasOne(GrandTotal::class);
    }
}
