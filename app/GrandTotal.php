<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrandTotal extends Model
{
    /**
     * Table used by this model
     * @var string
     */
    protected $table = "grand_total";


    /**
     * Fields that can be mass assigned
     * @var array
     */
    protected $fillable = [

        'grand_total'

    ];

    /**
     * GrandTotal Customer Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer(){

        return $this->belongsTo(Customer::class);
    }
}
