<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'product_name', 'price', 'discript', 'product_type_id', 'created_at', 'updated_at', 'photo'
    ];

    // 關聯式資料庫
    public function type()
    {
        // 一對一關聯取出來的資料，就是單筆資料
        return $this->hasOne('App\ProductType', 'id', 'product_type_id');
        // 'App\ProductType' = ProductType::class

        // 反向關聯，必須指定對應關聯的 $item
        // return $this->belongsTo(ProductType::class, 'product_type_id');
        // 同樣寫法，上面寫法自動抓
        // return $this->hasOne('App\ProductType');
    }
    public function photos() {
        return $this->hasMany('App\ProductImg', 'id', 'product_id');
    }

}
