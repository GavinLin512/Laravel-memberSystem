<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImg extends Model
{
    //
    protected $fillable = [
        'photo', 'product_id'
    ];

    public function product()
    {
        return $this->hasOne('App\Product', 'product_id', 'id');
        // return $this->belongsTo(Product::class);
    }
}
