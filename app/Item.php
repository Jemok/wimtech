<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The table used by this model
     * @var string
     *
     */
    protected $table = "items";


    /**
     * Fields that can be mass assigned
     * @var array
     */
    protected $fillable = [

        'item_name',
        'item_quantity',
        'item_price',
        'total'

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer(){

        return $this->belongsTo(Customer::class);
    }
}
