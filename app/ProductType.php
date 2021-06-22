<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    //
    protected $fillable = [
        'type_name', 'created_at', 'updated_at'
    ];

    // public function product()
    // {
    //     // 正向關聯，所以不用寫 $item

    //     return $this->hasMany(Product::class);
    // }

    //
    public function products()
    {

        // 對方model 對方欄位 我的欄位
        return $this->hasMany('App\Product', 'product_type_id', 'id');
    }
}
