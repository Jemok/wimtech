<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Product extends Model
{
    /**
     * Table used by this model
     * @var string
     */
    protected $table = "products";

    /**
     * Mass assigned fields
     * @var array
     */
    protected $fillable = [

        'product_name',
        'product_description',
        'product_image',
        'product_price',
        'category_id'
    ];

    /**
     * Product User Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){

        return $this->belongsTo(User::class);
    }



}
