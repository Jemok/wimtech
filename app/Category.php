<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Category extends Model
{
    /**
     * The table used by this model
     * @var string
     */
    protected $table = "categories";

    /**
     * Mass assigned fields
     * @var array
     */
    protected $fillable = [

        'category_name',
        'category_description',
        'category_class',
        'user_id'

    ];

    /**
     * Category User Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }


}
